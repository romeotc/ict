<?php include('db.php'); ?>
<?php
  $_POST['answer'] = trim($_POST['answer']," ");
if($_POST['mode']=='add')
{
    $c = "select * from test_answer where id_test = {$_POST['id_test']} and student_id={$_POST['student_id']} and test_sub_id ={$_POST['sub_id']}";
    $qc = mysqli_query($link,$c);
    $num = mysqli_num_rows($qc);
    //echo $c;
    if($num==0)
    {
      $a = "INSERT INTO test_answer (student_id, test_sub_id, answer, id_test, present) VALUES (
        '".$_POST['student_id']."','".$_POST['sub_id']."','".$_POST['answer']."','".$_POST['id_test']."','60'
      )";
      //echo $a;
      $q = mysqli_query($link,$a);
      if($q)
      {
        $status = array('status'=> "Success..",'sql'=> "'".$a."'");
      }else{
        $status = array('status'=> "Error..",'sql'=>  "'".$a."'");
      }

    }else{
      $status = array('status'=> "Data Added..",'sql'=>  "'".$a."'");
    }
    echo json_encode($status);
}

if($_POST['mode']=='edit')
{
    $c = "select * from test_answer where id_test = {$_POST['id_test']} and student_id={$_POST['student_id']} and test_sub_id ={$_POST['sub_id']}";
    $qc = mysqli_query($link,$c);
    $num = mysqli_num_rows($qc);
    //echo $c;
    if($num==1)
    {
      $a = "UPDATE test_answer SET answer ='".$_POST['answer']."' where id = {$_POST['answer_id']}";
      //echo $a;
      $q = mysqli_query($link,$a);
      if($q)
      {
        $status = array('status'=> "Success..",'sql'=>  "'".$a."'");
      }else{
        $status = array('status'=> "Error..",'sql'=>  "'".$a."'");
      }

    }else{
      $status = array('status'=> "Data Added..",'sql'=>  "'".$a."'");
    }
    echo json_encode($status);
}
 ?>
