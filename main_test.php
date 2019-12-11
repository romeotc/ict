<input type="hidden" id="sid" value="<?php echo $_POST['sid']; ?>">
<input type="hidden" id="type" value="<?php echo $_POST['type']; ?>">
<input type="hidden" id="link_id" value="<?php echo $_POST['link_id']; ?>">
<?php include('db.php'); ?>
<script>
$('document').ready(function(){
  var ans;
  $('.show_ans').hide();
  $('input:radio').change(function(){
    ans = $('.choice:checked').length;
    //alert(ans);
    var name = "choice1" ;
    var val = $("[name='" + name + "']:checked").val();
    var test_id = $("[name='" + name + "']:checked").attr('id');
  //  alert(test_id + "-" + val);
    if(ans==0)
    {
        $('.show_ans').hide();
    }else{
      $('.show_ans').show();
      $('#count_ans').text(ans);
    }

  });
  $('#clear_ans').click(function(event) {
    /* Act on the event */
    var txt = "ยืนยันยกเลิกคำตอบทั้งหมด";
    var r = confirm(txt);
    if(r==true)
    {
      $('input:radio').prop('checked',false);
      ans = 0;
      $('.show_ans').hide();
    }
  });

  $('#submit_ans').click(function(event) {
    /* Act on the event */

    var title_test = $('.title_test').length;
    if(ans<=title_test)
    {
      $(this).prop('disabled',true);
      //alert("ok");
      var txt = "ยืนยันต้องการส่งคำตอบ";
      var r = confirm(txt);
      if(r==true){
      for(i=1;i<=title_test;i++){
        var name = "choice" + i ;
        var val = $("[name='" + name + "']:checked").val();
        var test_id = $("[name='" + name + "']:checked").attr('id');
        var student_id = $('#student_id').val();
        var id_test = $('#id_test').val();

        var status = $("[name='" + name + "']").is(':checked');

          console.log("val=" + student_id + "," + test_id + "," + id_test +","+ val);
          $.ajax({
            url:'pretest2.php',
            method: 'POST',
            data : {
              student_id : student_id,
              test_id : test_id,
              id_test : id_test,
              val : val,

              mode: 'submit_ans'
            },
            success : function(result){
              console.log(result + "r=" +i);


            }

          });




      }

    }
      $(this).prop('disabled',false);
        window.location.reload();
    }else{

      alert("นักเรียน ยังตอบคำถามไม่ครบ กรุณาตอบคำถามให้ครบก่อนส่งคำตอบครับ");
    }

  });

});



</script>

<?php
  $testid= $_POST['link_id'];
  $check = "select sum(if(a.answer=b.answer,1,0)) as sum_score, count(b.id) as count_ans,
  (select count(id) from test_sub where id_test = '".$testid."' ) as max
  from test_answer as a
    inner join test_sub as b on a.test_sub_id = b.id where a.student_id ='".$_SESSION['student_id']."' and b.id_test = '".$testid."' ";
    //echo $check;
    $qcheck = mysqli_query($link,$check);
    if($qcheck)
    {
      $num = mysqli_num_rows($qcheck);
      $score = mysqli_fetch_array($qcheck);
    }



  $t = "select * from test where id = {$testid} ";
  $q = mysqli_query($link,$t);
  $rs = mysqli_fetch_array($q);
 ?>
 <input id="max_test" type="hidden" value="<?php echo $score['max']; ?>">
<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell">
  <h3><?php echo $rs['test_name']; ?>

</h3>
</div>

</header>
<?php
if($num>0 && $score['count_ans']>=$score['max'])
{ ?>
  <center>
    <div>
      <h3><?php echo "นักเรียนทำแบบทดสอบนี้ไปแล้ว<br /> ได้คะแนน "; ?></h3>
        <div class="w3-teal w3-container w3-round w3-card" style="width:150px">
          <h1><?php echo $score['sum_score'];?></h1>
        </div>

    </div>
  </center>
  <br />
<?php
}else{


?>
<div class="w3-border">
  <div class="w3-container w3-margin">
    <center>
      <input type="hidden" id="id_test" value="<?php echo $testid; ?>">
      <input type="hidden" id="student_id" value="<?php echo $_SESSION['student_id']; ?>">
      <h4>ชื่อผู้ทำแบบทดสอบ <u><b><?php echo $_SESSION['name']." ห้อง ".$_SESSION['room']." เลขที่ ".$_SESSION['ordinal']; ?></b></u></h4>
    </center>
    <?php
    $ts = "select *,a.id as a_id ,b.student_id as student_id
    from test_sub as a
      left join (select * from test_answer where student_id = {$_SESSION['student_id']} ) as b on a.id = b.test_sub_id
    where a.id_test = {$testid} group by a.id";
    //echo $ts;
    $qts = mysqli_query($link,$ts);
    $num_q = mysqli_num_rows($qts);
    //echo "test:".$num_q;
     ?>
    <h4>เป็นข้อสอบแบบปรนัยจำนวน <b><?php echo $num_q; ?></b> ข้อ <br />
คำสั่ง : ให้เลือกคลิก  <input type="radio" checked/> หน้าคำตอบที่ถูกต้องเพียงข้อเดียว</h4>
<hr class="w3-border w3-border-orange"/>
    <?php

    $i =1 ;
    $j = 1;
    while($rs = mysqli_fetch_array($qts)){
      ?>
      <h4 class="w3-text-dark-grey title_test"><b>ข้อที่ <?php echo $i; ?>) <?php echo $rs['test_sub_name']; ?></b></h4>
      <div class="w3-container w3-margin-left">
        <?php
          $tsub = "select * from test_sub where id = '".$rs['a_id']."' ";
          $qtsub = mysqli_query($link,$tsub);

          while($rs1 = mysqli_fetch_array($qtsub)){ ?>
        <?php //echo $j;
        //echo $rs['a_id'];?>  </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='1' id="<?php echo $rs['a_id']; ?>"
        <?php if($rs['answer']==1){echo "checked"; } ?> />
          <span class="sub_test">&nbsp;ก. <?php echo $rs1['q1']; ?></span><br />

      <?php //echo $j;?>  </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='2' id="<?php echo $rs['a_id']; ?>"
      <?php if($rs['answer']==2){echo "checked"; } ?>
      />
            <span class="sub_test">&nbsp;ข. <?php echo $rs1['q2']; ?></span><br />

      <?php //echo $j;?>    </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='3' id="<?php echo $rs['a_id']; ?>"
      <?php if($rs['answer']==3){echo "checked"; } ?>
      />
            <span class="sub_test">&nbsp;ค. <?php echo $rs1['q3']; ?></span><br />

      <?php //echo $j;?>    </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='4' id="<?php echo $rs['a_id']; ?>"
      <?php if($rs['answer']==4){echo "checked"; } ?>
      />
            <span class="sub_test">&nbsp;ง. <?php echo $rs1['q4']; ?></span><br />
            <hr class="w3-border w3-border-blue"/>
        <?php
          $j++;   }
          ?>
      </div>

    <?php
    $i++;
    }

    ?>
  </div>
</div>
<!-- answer -->
<div class="w3-margin"><center>
  <button id="submit_ans" class="w3-button w3-blue">ส่งข้อสอบ</button>
  <button id="clear_ans" class="w3-button w3-red">ล้างคำตอบทั้งหมด</button>
</center>

</div>
<div class="show_ans" style="display:none"><center>
<h3>จำนวนข้อที่ตอบ <br /><span id="count_ans"></span></h3>
</center></div>
<?php } ?>
