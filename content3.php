<?php include('db.php'); ?>
<?php

    if($_POST['mode']=='add_content')
    {
      $add = "INSERT INTO tb_content (topic,content) VALUES ('".$_POST['topic']."','".$_POST['content']."')";
      $q_add = mysqli_query($link,$add);
      if($q_add){
        echo "1,".$add;
      }else{
        echo "0,".$add;
      }
    }
    if($_POST['mode']=='edit_content')
    {
      $edit = "UPDATE tb_content SET topic='".$_POST['topic']."' ,content='".$_POST['content']."'
      where id = '{$_POST['id']}' ";
      $q_edit = mysqli_query($link,$edit);
      if($q_edit){
        echo "1,".$edit;
      }else{
        echo "0,".$edit;
      }
    }
    if($_POST['mode']=='del_content')
    {
      $del = "DELETE FROM tb_content WHERE id = {$_POST['id']}";
      $q_del= mysqli_query($link,$del);
      if($q_del){
        echo "1,".$del;
      }else{
        echo "0,".$del;
      }
    }



 ?>
