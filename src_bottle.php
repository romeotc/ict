
<?php  
//echo $_GET['mode'];
include('db.php');
if($_GET['mode']=='id'){
$sql = "select * from tb_student59 where student_id = '".$_GET['id']."' ";
$q = mysqli_query($link,$sql);
mysqli_query("SET NAMES UTF8");
$rs = mysqli_fetch_array($q); 
$title = "select * from tb_title where title_id = '".$rs['title_id']."' ";
$q_title = mysqli_query($link,$title);
$rs_title = mysqli_fetch_array($q_title);
if($_GET['id']>50000){ echo "ชื่อ ".$rs_title['title_name'].$rs['s_firstname']." ".$rs['s_lastname']." บุคคลทั่วไป"; 
}else if($_GET['id']>=2000){ 
$level = (60-$rs['year_in'])+$rs['class']; 
echo "ชื่อ ".$rs['s_firstname']." ".$rs['s_lastname']." ชั้น ม.".$level."/".$rs['room']; 

  }else{  echo "บุคคลทั่วไป";
}


}
if($_GET['mode']=='bottle'){
$pet = "select count(bottle) from tb_bottle where student_id = '".$_GET['id']."' and status = 1 and bottle = 1";
$q = mysqli_query($link,$pet);
mysqli_query("SET NAMES UTF8");
$rs_pet = mysqli_fetch_array($q);
$can= "select count(bottle) from tb_bottle where student_id = '".$_GET['id']."' and status = 1 and bottle = 2";
$q2 = mysqli_query($link,$can);
mysqli_query("SET NAMES UTF8");
$rs_can = mysqli_fetch_array($q2);
//echo $can;
/*
if($rs_pet['sum(bottle)']=="" && $rs_can['sum(bottle)']==""){ echo "ไม่มีประวัติการแลกขวด";}else{ */
	echo "จำนวนขวด : ".$rs_pet['count(bottle)']."  จำนวนกระป๋อง : ".$rs_can['count(bottle)'];
//	}

}
if($_GET['mode']=='sum_bottle'){
$pet = "select count(bottle) from tb_bottle where student_id = '".$_GET['id']."' and status = 1 and bottle = 1";
$q = mysqli_query($link,$pet);
//mysqli_query("SET NAMES UTF8");
$rs_pet = mysqli_fetch_array($q);
$can= "select count(bottle) from tb_bottle where student_id = '".$_GET['id']."' and status = 1 and bottle = 2";
$q2 = mysqli_query($link,$can);
//mysqli_query("SET NAMES UTF8");
$rs_can = mysqli_fetch_array($q2);
//echo $can;
/*
if($rs_pet['sum(bottle)']=="" && $rs_can['sum(bottle)']==""){ echo "ไม่มีประวัติการแลกขวด";}else{ */
$sum = $rs_pet['count(bottle)']+$rs_can['count(bottle)'];
	echo $sum;  
//	

}
if($_GET['mode']=='bottle2'){
$sql = "select sum(bottle) from tb_bottle where student_id = '".$_GET['id']."' and status = 1 ";
$q = mysqli_query($link,$sql);
mysqli_query("SET NAMES UTF8");
$rs = mysqli_fetch_array($q);
//echo $sql;
if($rs['sum(bottle)']==""){ echo "-";}else{ echo " ".$rs['sum(bottle)']." ขวด"; }

}
if($_GET['mode']=='add'){
	if($_GET['bottle']=='P'){ $bottle = 1; }
	if($_GET['bottle']=='A'){ $bottle = 2; }
$sql = "INSERT INTO tb_bottle (student_id, bottle, status)VALUES('".$_GET['id']."', '".$bottle."' , 1) ";
$q = mysqli_query($link,$sql);
mysqli_query("SET NAMES UTF8");
$rs = mysqli_fetch_array($q);
echo "Add Success";
}

?>