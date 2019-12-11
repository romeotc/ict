<?php include('db.php'); 
	

session_start();

$u = $_GET['u'];
$s = $_GET['s'];
$a = $_GET['a'];
//$name = $u."-".$s."-".$a;
$name = $u."-".$s."-";
//echo $name;
?>

<header class="w3-row w3-orange w3-animate-top" id="indicator" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell">
<h3><?php $p = intval($_GET['u'].$_GET['s']); echo $sub[$p]."  "; ?>




</h3>
</div>

</header>
<div id="status_save"></div>

<?php 
echo $name;
$n1 = $name.'indic';
$s1 = "select * from tb_intro where name = '".$n1."' ";
$q1 = mysqli_query($link,$s1);
$rs1 = mysqli_fetch_array($q1);

$n2 = $name.'goal';
$s2 = "select * from tb_intro where name = '".$n2."' ";
$q2 = mysqli_query($link,$s2);
$rs2 = mysqli_fetch_array($q2);

$n3 = $name.'intro';
$s3 = "select * from tb_intro where name = '".$n3."' ";
$q3 = mysqli_query($link,$s3);
$rs3 = mysqli_fetch_array($q3);

$n4 = $name.'learning';
$s4 = "select * from tb_intro where name = '".$n4."' ";
$q4 = mysqli_query($link,$s4);
$rs4 = mysqli_fetch_array($q4);

$n5 = $name.'conclusion';
$s5 = "select * from tb_intro where name = '".$n5."' ";
$q5 = mysqli_query($link,$s5);
$rs5 = mysqli_fetch_array($q5);
?>

<div class="w3-margin" style="font-family: THSarabunNewRegular, serif;">
<div class="w3-round-large w3-container w3-border w3-border-indigo " id="goal" ><?php echo $rs1['text'];  ?></div><p>
<div class="w3-round-large w3-container w3-border w3-border-red " id="intro" ><?php echo $rs2['text'];  ?></div><p>
<div class="w3-round-large w3-container w3-border w3-border-orange " id="learn" ><?php echo $rs3['text'];  ?></div><p>
<div class="w3-round-large w3-container w3-border w3-border-teal "  ><?php echo $rs4['text'];  ?></div><p>
<div class="w3-round-large w3-container w3-border w3-border-blue " id="conclusion" ><?php echo $rs5['text'];  ?></div><p>
</div>
<style type="text/css">
    #indicator,#goal,#intro,#learn,#conclusion{
        color: #222222;
        
        ;
    }
    .innerElement1{
        border: solid 10px;
        display: inline-block; width:60px; height:100px; margin: 10px;
    }
    .innerElement2{
        background: currentColor;
        display: inline-block; width:60px; height:100px; margin: 10px;
    }
	
</style>
