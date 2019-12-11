<?php include('db.php'); ?>
<?php
$test_arr = array();
$t = "select * from test order by order_id asc";
$q = mysqli_query($link,$t);
if($q)
{
  while($rs = mysqli_fetch_array($q))
  {
    array_push($test_arr,$rs);
  }
  echo '<pre>';
//  var_dump($test_arr);
  echo '</pre><hr />';
}

 ?>

<div>
  <div>
    <center>
      <h3>ยินดีต้อนรับ
        <?php echo $_SESSION['name']." ห้อง.".$_SESSION['room']." เลขที่ ".$_SESSION['ordinal']; ?></h3>
    </center>
  </div>
<br />
<div class="w3-container">
  <div class="w3- ">
    <center>
    <table class="w3-table-all w3-centered" style="width:60%">
      <tr class="w3-light-blue">
        <th>
          #
        </th>
        <th>
          หัวข้อ
        </th>
        <th>
          จำนวนข้อสอบ
        </th>
        <th>
          คะแนน
        </th>
        <th>
          หมายเหตุ
        </th>
      </tr>
      <?php
      $i=1;
      foreach($test_arr as $rs)
      {

       ?>
      <tr>
        <td>
          <?php echo $i; ?>
        </td>
        <td style="text-align:left">
          <?php echo $rs['test_name']; ?>
        </td>
        <td>
          <?php echo $rs['max_test']; ?>
        </td>
        <td><span class="w3-badge w3-teal">
          <?php
          $a1 = "select sum(if(a.answer=b.answer,1,0)) as sum_score from test_answer as a
            inner join test_sub as b on a.test_sub_id = b.id where a.student_id ='".$_SESSION['student_id']."' and b.id_test = '".$rs['id']."' ";
            //echo $a1;
            $qa1 = mysqli_query($link,$a1);
            $rsa1 = mysqli_fetch_array($qa1);
            echo $rsa1['sum_score'];

           ?></span>
        </td>
        <td>

        </td>
      </tr>
        <?php
        $i++;   }
        ?>
    </table>
    </center>

  </div>



<br />
</div>



</div>
