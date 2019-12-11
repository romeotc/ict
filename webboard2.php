<?php
//echo "5555";
include('db.php');
$std = $_POST['std'];
$question = $_POST['question'];
$s = "INSERT INTO tb_question (student_id,question) VALUES( '".$std."','".$question."') ";
$q = mysqli_query($link,$s);
if($q==true){ echo "success ";}else{ echo "error "; }


?>