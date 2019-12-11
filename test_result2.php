<?php
include('db.php');
if($_POST['level']>=4){ $class =4; }else{ $class= 1; }
$year_in = $y - ($_POST['level']-$class);
$std_arr =  array();
  $s = "select * from tb_student59 where room = {$_POST['room']} and year_in = {$year_in} and class= {$class}";
  //echo $s;
  $qs = mysqli_query($link,$s);
    while( $rs = mysqli_fetch_array($qs)){
      array_push($std_arr,$rs);
    }
  //  echo '<pre>';
//var_dump($std_arr);
//echo '</pre><hr />';
if($_POST['room']==0){echo "กรุณาเลือกห้องเรียนครับ"; }else{
 ?>
  <table class="w3-table w3-striped w3-bordered">
    <tr class="w3-blue">
      <td>
        #
      </td>
      <td>
        เลขประจำตัว
      </td>
      <td>
        ชื่อ-นามสกุล
      </td>
    <td>
      ห้อง
    </td>
    <td>
      เลขที่
    </td>
    <td>
      คะแนน
    </td>
    </tr>
    <?php
    $i=1;
    foreach ($std_arr as $rs) {
      $a1 = "select sum(if(a.answer=b.answer,1,0)) as sum_score from test_answer as a
        inner join test_sub as b on a.test_sub_id = b.id where a.student_id ='".$rs['student_id']."' and b.id_test = '".$_POST['test']."' ";
        //echo $a1;
        $qa1 = mysqli_query($link,$a1);
        $rsa1 = mysqli_fetch_array($qa1);
        //echo $rsa1['sum_score'];

      ?>
    <tr>
      <td>
        <?php echo $i; ?>
      </td>
      <td>
        <?php echo $rs['student_id']; ?>
      </td>
      <td>
        <?php echo $rs['s_firstname']." ".$rs['s_lastname']; ?>
      </td>
      <td>
        <?php echo $rs['room']; ?>
      </td>
      <td>
        <?php echo $rs['ordinal']; ?>
      </td>
      <td>
        <?php if($rsa1['sum_score']>0){ ?>
        <span class="w3-button w3-large w3-padding w3-teal">
          <?php echo $rsa1['sum_score']; ?>
        </span>
      <?php } ?>
      </td>
    </tr>
      <?php
      $i++; }
     ?>
  </table>

<?php } // select room ?>
