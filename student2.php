<?php
include('db.php');
$std_arr =  array();
if($_POST['level']>=4){$class=4;}else{$class=1;}
$year_in = $y-($_POST['level']-$class);
  $s = "select * from tb_student59 where room = {$_POST['room']} and year_in = {$year_in} and class = {$class}";
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

  <table class="w3-table w3-striped w3-bordered" style="width:80%;">
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
      แก้ไข
    </td>
    <td>
      ลบ
    </td>
    </tr>
    <?php
    $i=1;
    foreach ($std_arr as $rs) { ?>
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
        <?php
        $level = ($y - $rs['year_in']) + $rs['class'];
        echo $level."/".$rs['room']; ?>
      </td>
      <td>
        <?php echo $rs['ordinal']; ?>
      </td>
      <td>
        <?php
        $data = "'".$rs['id']."',"."'".$rs['student_id']."',"."'".$rs['s_firstname']."',"."'".$rs['s_lastname']."',";
        $data .= "'".$rs['room']."',"."'".$rs['ordinal']."',"."'".$rs['password']."'";
      //  echo $data;
         ?>
        <button class="w3-button w3-orange w3-round"
        onclick="edit_std(<?php echo $data; ?>)"

        ><i class="fa fa-edit"></i></button>
      </td>
      <td>
        <button class="w3-button w3-red w3-round" onclick="del_std('<?php echo $rs['id']; ?>')"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
      <?php
      $i++; }
     ?>
  </table>

<?php } // select room ?>
