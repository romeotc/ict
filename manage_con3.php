<?php
  include('db.php');

  if($_POST['mode']=='explan')
  {
    $ex = "UPDATE tb_unit SET explan = '".$_POST['content']."' where id = '".$_POST['id']."' ";
    $qex = mysqli_query($link,$ex);
    if($qex)
    {
      echo "1,".$ex;
    }else{
      echo "0,".$ex;
    }
  }

    if($_POST['mode']=='indic')
    {
      $ex = "UPDATE tb_unit SET indic = '".$_POST['content']."' where id = '".$_POST['id']."' ";
      $qex = mysqli_query($link,$ex);
      if($qex)
      {
        echo "1,".$ex;
      }else{
        echo "0,".$ex;
      }
    }
    if($_POST['mode']=='goal')
    {
      $ex = "UPDATE tb_unit SET goal = '".$_POST['content']."' where id = '".$_POST['id']."' ";
      $qex = mysqli_query($link,$ex);
      if($qex)
      {
        echo "1,".$ex;
      }else{
        echo "0,".$ex;
      }
    }


?>
