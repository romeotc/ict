  <script>
  $('document').ready(function(){
    var ans;
    $('.show_ans').hide();
    $('input:radio').change(function(){
      ans = $('.choice:checked').length;
      //alert(ans);
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
      if(ans==title_test)
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
        //  window.location.href ="index.php";
      }else{

        alert("นักเรียน ยังตอบคำถามไม่ครบ กรุณาตอบคำถามให้ครบก่อนส่งคำตอบครับ");
      }

    });

	});



  </script>

  <?php
    $testid=1;
    $check = "select sum(if(a.answer=b.answer,1,0)) as sum_score from test_answer as a
      inner join test_sub as b on a.test_sub_id = b.id where a.student_id ='".$_SESSION['student_id']."' and b.id_test = '".$testid."' ";
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
  if($num>0 && $score['sum_score']!='')
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
      <h4>เป็นข้อสอบแบบปรนัยจำนวน 30 ข้อ <br />
คำสั่ง : ให้เลือกคลิก  <input type="radio" checked/> หน้าคำตอบที่ถูกต้องเพียงข้อเดียว</h4>
<hr class="w3-border w3-border-orange"/>
      <?php
      $ts = "select * from test_sub where id_test = {$testid}";
      $qts = mysqli_query($link,$ts);
      $i =1 ;
      $j = 1;
      while($rs = mysqli_fetch_array($qts)){
        ?>
        <h4 class="w3-text-dark-grey title_test"><b>ข้อที่ <?php echo $i; ?>) <?php echo $rs['test_sub_name']; ?></b></h4>
        <div class="w3-container w3-margin-left">
          <?php
            $tsub = "select * from test_sub where id = '".$rs['id']."' ";
            $qtsub = mysqli_query($link,$tsub);

            while($rs1 = mysqli_fetch_array($qtsub)){ ?>
          <?php echo $j;?>  </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='1' id="<?php echo $rs1['id']; ?>" checked/>
            <span class="sub_test">&nbsp;ก. <?php echo $rs1['q1']; ?></span><br />

        <?php echo $j;?>  </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='2' id="<?php echo $rs1['id']; ?>"/>
              <span class="sub_test">&nbsp;ข. <?php echo $rs1['q2']; ?></span><br />

        <?php echo $j;?>    </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='3' id="<?php echo $rs1['id']; ?>"/>
              <span class="sub_test">&nbsp;ค. <?php echo $rs1['q3']; ?></span><br />

        <?php echo $j;?>    </span><input type="radio" class="choice" name="choice<?php echo $j;?>" value='4' id="<?php echo $rs1['id']; ?>"/>
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
