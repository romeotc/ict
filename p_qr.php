<script>
function qr_gen(id){
	a = document.getElementById('one_code').value;
	alert(a);
	var url = 'one_qr.php?id=' + a  ;
	//alert(url);
	newwindow=window.open(url,'name','height=600,width=800');
	if (window.focus) {newwindow.focus()}
	return false;
	
	
}


</script>
<header class="w3-row w3-blue w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-blue w3-cell">
<p>
</div>
<div class="w3-container  w3-blue w3-cell"><h3>พิมพ์บัตร QR-CODE นักเรียน 

</h3>
</div>

</header><center><p>
<input id="one_code" ><p>
<button  onclick="qr_gen('55');"> สร้าง 1 ใบ </button>
