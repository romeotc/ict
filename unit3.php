<?php include('db.php'); ?>
<?php

    if($_POST['mode']=='add_unit')
    {
      $add = "INSERT INTO tb_unit (unit_name,order_id) VALUES ('".$_POST['unit_name']."','".$_POST['order_id']."')";
      $q_add = mysqli_query($link,$add);
      if($q_add){
        echo "1,".$add;
      }else{
        echo "0,".$add;
      }
    }
    if($_POST['mode']=='edit_unit')
    {
      $edit = "UPDATE tb_unit SET unit_name='".$_POST['unit_name']."' ,order_id='".$_POST['order_id']."'
      where id = '{$_POST['id']}' ";
      $q_edit = mysqli_query($link,$edit);
      if($q_edit){
        echo "1,".$edit;
      }else{
        echo "0,".$edit;
      }
    }
    if($_POST['mode']=='del_unit')
    {
      $del = "DELETE FROM tb_unit WHERE id = {$_POST['id']}";
      $q_del= mysqli_query($link,$del);
      if($q_del){
        echo "1,".$del;
      }else{
        echo "0,".$del;
      }
    }



 ?>
