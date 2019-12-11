<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head><meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>แสดง QR Code นักเรียน</title>
<meta name="description" content="demo for jQuery.qrcode (https://larsjung.de/jquery-qrcode/)">

<link rel="shortcut icon" type="image/png" href="dummy.png">
<link rel="apple-touch-icon-precomposed" type="image/png" href="dummy.png">
<link href="//fonts.googleapis.com/css?family=Ubuntu:300,400,700" rel="stylesheet">
<link href="styles.css" rel="stylesheet"><script src="js/qr/jquery.min.js">
</script><script src="js/jquery-qrcode-0.14.0.js"></script>
<script src="js/qr/scripts.js"></script></head><body>
 <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
div #listclub{

display: none;
}
 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }


</style>
<?php include('db.php');
$s = "select * from tb_facebook where student_id = '".$_GET['id']."' ";
$q = mysqli_query($link,$s);
$rs = mysqli_fetch_array($q);
if($rs['EMAIL']==""){ echo "ไม่มีผู้ใช่นี้"; }else{
?>




<div class="w3-contrainer w3-margin w3-card">


<div id="container">


</div>





</div><h3><?php echo $rs["EMAIL"]; ?></h3>
<div style="display:none;">
<?php session_start(); ?>
<?php echo $_SESSION['student_id']; ?>
<label for="render">RENDER MODE</label><select id="render"><option value="canvas" selected="selected">canvas</option>
<option value="image">image</option><option value="div">div</option></select><hr><label for="size">SIZE:</label>
<input id="size" type="range" value="64" min="100" max="1000" step="50"><label for="fill">FILL</label>
<input id="fill" type="color" value="#333333"><label for="background">BACKGROUND</label>
input id="background" type="color" value="#ffffff"><label for="text">CONTENT</label>
<textarea id="text"><?php echo $rs["EMAIL"]; ?></textarea><hr><label for="minversion">MIN VERSION:</label>
<input id="minversion" type="range" value="2" min="1" max="10" step="1"><label for="eclevel">ERROR CORRECTION LEVEL</label>
<select id="eclevel"><option value="M">L - Low (7%)</option><option value="M">M - Medium (15%)</option>
<option value="Q">Q - Quartile (25%)</option><option value="H" selected="selected">H - High (30%)</option>
</select><label for="quiet">QUIET ZONE:</label><input id="quiet" type="range" value="1" min="0" max="4" step="1">
<label for="radius">CORNER RADIUS:</label><input id="radius" type="range" value="50" min="0" max="50" step="10">
<label for="mode">MODE</label><select id="mode"><option value="0" selected="selected">0 - Normal</option>
<option value="1">1 - Label-Strip</option><option value="2" >2 - Label-Box</option>
<option value="3">3 - Image-Strip</option><option value="4">4 - Image-Box</option></select><hr><label for="msize">SIZE:</label>
<input id="msize" type="range" value="11" min="0" max="40" step="1"><label for="mposx">POS X:</label>
<input id="mposx" type="range" value="50" min="0" max="100" step="1"><label for="mposy">POS Y:</label>
<input id="mposy" type="range" value="50" min="0" max="100" step="1"><hr><label for="label">LABEL</label>
<input id="label" type="text" value="jQuery.qrcode"><label for="font">FONT NAME</label><input id="font" type="text" value="Ubuntu">
<label for="fontcolor">FONT COLOR</label><input id="fontcolor" type="color" value="#ff9818"><hr><label for="image">IMAGE</label>
<input id="image" type="file"><img id="img-buffer" src="dummy.png">


</div>
<?php } ?>
</body></html>