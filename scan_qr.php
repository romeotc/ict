<!DOCTYPE html>
<html>
    <head>
        <title>ระบบเช็คชื่อเข้าเรียน</title>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<script src="./js/jquery-3.1.1.min.js"></script>

	  <script src="./js/jquery-ui.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		  <link href="http://202.143.191.92/hw/css/w3.css" rel="stylesheet">
		  
		   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }


</style>
        <style type="text/css">
        .scanner-laser{
            position: absolute;
            margin: 40px;
            height: 30px;
            width: 30px;
        }
        .laser-leftTop{
            top: 0;
            left: 0;
            border-top: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-leftBottom{
            bottom: 0;
            left: 0;
            border-bottom: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-rightTop{
            top: 0;
            right: 0;
            border-top: solid red 5px;
            border-right: solid red 5px;
        }
        .laser-rightBottom{
            bottom: 0;
            right: 0;
            border-bottom: solid red 5px;
            border-right: solid red 5px;
        }
        </style>
    </head>
    <body>
        <div class="page-header"><center>
            <h1 style="margin-left:10px;">ระบบเช็คชื่อนักเรียนผ่านบัตร QRcode<br>
            <!--<small>download from:
            <a href="https://github.com/andrastoth/WebCodeCam" target="_blank"> GitHub </a> OR
            <a href="http://www.jsclasses.org/package/385-JavaScript-barcode-and-qr-code-scanner.html" target="_blank"> JSclasses </a>
            </small>  -->
			<small> ขั้นตอนการเช็คชื่อให้นักเรียนเตรียมบัตร QR-Code หรือ  หากลืมให้ใช้โทรศัพท์ เปิด QR-Code ของตนเองแล้วแสดงที่หน้าจอครับ</small>

            </h1><a href="scan_qr_full.php" target="_blank" class="w3-btn w3-teal">เปิดโหลดเต็มจอ</a></center>
        </div>
        <div id="QR-Code" class="container" style="width:100%">
            <div class="panel panel-success ">
                <div class="panel-heading" style="display: inline-block;width: 100%;">
                    <h4 style="width:50%;float:left;"></h4>
                <!--    <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                    <select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select>
                    <button id="save" data-toggle="tooltip" title="Image shoot" type="button" class="btn btn-info btn-sm disabled"><span class="glyphicon glyphicon-picture"></span></button>
                    <button id="play" data-toggle="tooltip" title="Play" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></button>
                    <button id="stop" data-toggle="tooltip" title="Stop" type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                    <button id="stopAll" data-toggle="tooltip" title="Stop streams" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                </div> -->
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-sd-6" style="text-align:center ;">
                    <div class="well" style="position: relative;display: inline-block;">

                        <canvas id="qr-canvas"  width="320" height="240"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
					<p>
					<button id="play" data-toggle="tooltip" title="Play" type="button" class="btn btn-success "><span class="glyphicon glyphicon-play"></span>PLAY</button>
                    <button id="stop" data-toggle="tooltip" title="Stop" type="button" class="btn btn-warning "><span class="glyphicon glyphicon-stop"></span></button>
                    <button id="stopAll" data-toggle="tooltip" title="Stop streams" type="button" class="btn btn-danger "><span class="glyphicon glyphicon-stop"></span></button>

                    <div class="well option" style="position: relative;" >
                        <label id="zoom-value" width="100">Zoom: 0</label>
                        <input type="range" id="zoom" value="10" min="10" max="30" onchange="Page.changeZoom();"/>
                        <label id="brightness-value" width="100">Brightness: 0</label>
                        <input type="range" id="brightness" value="0" min="0" max="128" onchange="Page.changeBrightness();"/>
                        <label id="contrast-value" width="100">Contrast: 0</label>
                        <input type="range" id="contrast" value="0" min="0" max="64" onchange="Page.changeContrast();"/>
                        <label id="threshold-value" width="100">Threshold: 0</label>
                        <input type="range" id="threshold" value="0" min="0" max="512" onchange="Page.changeThreshold();"/>
                        <label id="sharpness-value" width="100">Sharpness: off</label>
                        <input type="checkbox" id="sharpness" onchange="Page.changeSharpness();"/>
                        <label id="grayscale-value" width="100">grayscale: off</label>
                        <input type="checkbox" id="grayscale" onchange="Page.changeGrayscale();"/>
                    </div>
                </div>
                <div class="col-md-6 col-sd-6" style="text-align: center;">


						<div id="" class="thumbnail">


                        <div class="caption">
                            <h3>ผลการสแกน</h3>
                            <p id="table_qr"></p>
                        </div>
                    </div>



                    <div id="result" class="thumbnail">
                        <div class="well" style="position: relative;display: inline-block;">
                            <img id="scanned-img" src="" width="320" height="240">
                        </div>
                        <div class="caption">
                            <h3>รูปสแกน QR</h3>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/WebCodeCam.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script >
	$('document').ready(function(){
	$('.option').hide();


		$.ajax({
						method: "POST",
						url: "scan_qr2.php",
						data: {
						mode: ""

						}
						})
						.done(function(data) {
						$('#table_qr').html(data);
						});

	});


</script>


</html>
