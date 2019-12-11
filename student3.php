<?php
  include('db.php');
    if($_POST['level']>=4){ $class=4;}else{ $class =1; }
    $year_in = $y - ($_POST['level']-$class);

    if($_POST['mode']=='add_std')
    {
      $add = "INSERT INTO tb_student59 (student_id,s_firstname,s_lastname,year_in,room,ordinal,student_status,class,password)VALUES (
        '".$_POST['student_id']."',
        '".$_POST['name']."',
        '".$_POST['last']."',
        '".$year_in."',
        '".$_POST['room']."',
        '".$_POST['ordinal']."',
        '1',
        '".$class."',
        '".$_POST['password']."'
      )";
      $qadd =  mysqli_query($link,$add);
      if($qadd)
      {
        echo "1,Success";
      }else {
        echo "0,Error";
      }
    }
    if($_POST['mode']=='del_std')
    {
      $d = "DELETE FROM tb_student59 where id = '".$_POST['id']."' ";
      $qd = mysqli_query($link,$d);
      if($qd)
      {
        echo "1,Success";
      }else {
        echo "0,Error";
      }
    }
 ?>
