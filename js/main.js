(function(window) {
	'use strict';
	var decoder = $('#qr-canvas'),
		sl = $('.scanner-laser'),
		pl = $('#play'),
		si = $('#scanned-img'),
		sQ = $('#scanned-QR'),
		sv = $('#save'),
		sp = $('#stop'),
		spAll = $('#stopAll'),
		co = $('#contrast'),
		cov = $('#contrast-value'),
		zo = $('#zoom'),
		zov = $('#zoom-value'),
		br = $('#brightness'),
		brv = $('#brightness-value'),
		tr = $('#threshold'),
		trv = $('#threshold-value'),
		sh = $('#sharpness'),
		shv = $('#sharpness-value'),
		gr = $('#grayscale'),
		grv = $('#grayscale-value');
		$('[data-toggle="tooltip"]').tooltip();
	sl.css('opacity', .5);
	pl.click(function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") {
			decoder.WebCodeCam({
				videoSource: {
					id: $('select#cameraId').val(),
					maxWidth: 320,
					maxHeight: 240
				},
				autoBrightnessValue: 120,
				resultFunction: function(text, imgSrc) {
					si.attr('src', imgSrc);
					sQ.text(text);

						$.ajax({
						method: "POST",
						url: "scan_qr_result2.php",
						data: {
						mode: "add",
						id: text
						}
						})
						.done(function(data) {
						$('#table_qr').html(data);
						});


					tempAlert(data,2000);
					sl.fadeOut(150, function() {
						sl.fadeIn(150);
					});
				},
				getUserMediaError: function() {
					alert('Sorry, the browser you are using doesn\'t support getUserMedia');
				},
				cameraError: function(error) {
					var p, message = 'Error detected with the following parameters:\n';
					for (p in error) {
						message += p + ': ' + error[p] + '\n';
					}
					alert(message);
				}
			});
			sQ.text('กำลังอ่าน ...');
			sv.removeClass('disabled');
			sp.click(function(event) {
				sv.addClass('disabled');
				sQ.text('Stopped');
				decoder.data().plugin_WebCodeCam.cameraStop();
			});
			spAll.click(function(event) {
				sv.addClass('disabled');
				sQ.text('Stopped');
				decoder.data().plugin_WebCodeCam.cameraStopAll();
			});
		} else {
			sv.removeClass('disabled');
			sQ.text('Scanning ...');
			decoder.data().plugin_WebCodeCam.cameraPlay();
		}
	});
	sv.click(function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var src = decoder.data().plugin_WebCodeCam.getLastImageSrc();
		si.attr('src', src);
	});
	Page.changeZoom = function(a) {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = typeof a != 'undefined' ? parseFloat(a.toPrecision(2)) : zo.val() / 10;
		zov.text(zov.text().split(':')[0] + ': ' + value.toString());
		decoder.data().plugin_WebCodeCam.options.zoom = parseFloat(value);
		if (typeof a != 'undefined') zo.val(a * 10);
	}
	Page.changeContrast = function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = co.val();
		cov.text(cov.text().split(':')[0] + ': ' + value.toString());
		decoder.data().plugin_WebCodeCam.options.contrast = parseFloat(value);
	}
	Page.changeBrightness = function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = br.val();
		brv.text(brv.text().split(':')[0] + ': ' + value.toString());
		decoder.data().plugin_WebCodeCam.options.brightness = parseFloat(value);
	}
	Page.changeThreshold = function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = tr.val();
		trv.text(trv.text().split(':')[0] + ': ' + value.toString());
		decoder.data().plugin_WebCodeCam.options.threshold = parseFloat(value);
	}
	Page.changeSharpness = function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = sh.prop('checked');
		if (value) {
			shv.text(shv.text().split(':')[0] + ': on');
			decoder.data().plugin_WebCodeCam.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
		} else {
			shv.text(shv.text().split(':')[0] + ': off');
			decoder.data().plugin_WebCodeCam.options.sharpness = [];
		}
	}
	Page.changeGrayscale = function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = gr.prop('checked');
		if (value) {
			grv.text(grv.text().split(':')[0] + ': on');
			decoder.data().plugin_WebCodeCam.options.grayScale = true;
		} else {
			grv.text(grv.text().split(':')[0] + ': off');
			decoder.data().plugin_WebCodeCam.options.grayScale = false;
		}
	}
	var getZomm = setInterval(function() {
		var a;
		try {
			a = decoder.data().plugin_WebCodeCam.optimalZoom();
		} catch (e) {
			a = 0;
		}
		if (a != 0) {
			Page.changeZoom(a);
			clearInterval(getZomm);
		}
	}, 500);

	function gotSources(sourceInfos) {
		for (var i = 0; i !== sourceInfos.length; ++i) {
			var sourceInfo = sourceInfos[i];
			var option = document.createElement('option');
			option.value = sourceInfo.id;
			if (sourceInfo.kind === 'video') {
				var face = sourceInfo.facing == '' ? 'unknown' : sourceInfo.facing;
				option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
				videoSelect.appendChild(option);
			}
		}
	}
	if (typeof MediaStreamTrack.getSources !== 'undefined') {
		var videoSelect = document.querySelector('select#cameraId');
		$(videoSelect).change(function(event) {
			if (typeof decoder.data().plugin_WebCodeCam !== "undefined") {
				decoder.data().plugin_WebCodeCam.options.videoSource.id = $(this).val();
				decoder.data().plugin_WebCodeCam.cameraStop();
				decoder.data().plugin_WebCodeCam.cameraPlay(false);
			}
		});
		MediaStreamTrack.getSources(gotSources);
	} else {
		document.querySelector('select#cameraId').remove();
	}
}).call(window.Page = window.Page || {});

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:45%;left:35%;background-color:white;font-size:250%");
 el.setAttribute("class","w3-teal");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
