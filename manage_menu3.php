<?php
include('db.php');
  if($_POST['mode']=='add_menu')
  {
    if($_POST['type']=='3'){ $_POST['sid'] = '1' ; }else{ $_POST['sid'] =0; }
    $s = "INSERT INTO tb_menu (menu_name,type,link_id,sid,order_id) VALUES
    ('".$_POST['menu_name']."','".$_POST['type']."','".$_POST['link_id']."','".$_POST['sid']."','".$_POST['order_id']."')";
    $q_add = mysqli_query($link,$s);
    if($q_add){
      echo "1,".$s;
    }else{
      echo "0,".$s;
    }
  }
  if($_POST['mode']=='edit_menu')
  {
    if($_POST['type']=='3'){ $_POST['sid'] = '1' ; }else{ $_POST['sid'] =0; }
    $u = "UPDATE tb_menu SET menu_name = '".$_POST['menu_name']."',
    type = '".$_POST['type']."',link_id = '".$_POST['link_id']."',sid = '".$_POST['sid']."',order_id = '".$_POST['order_id']."'
    where  id = {$_POST['id']} ";
    $q_up = mysqli_query($link,$u);
    if($q_up){
      echo "1,".$u;
    }else{
      echo "0,".$u;
    }
  }
  if($_POST['mode']=='del_menu')
  {
    //if($_POST['sid']==''){ $_POST['sid'] = '1' ; }
    $s = "DELETE FROM tb_menu where id = {$_POST['id']}";
    $q_del = mysqli_query($link,$s);
    if($q_del){
      echo "1,".$s;
    }else{
      echo "0,".$s;
    }
  }

?>
