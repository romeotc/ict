<?php include('db.php'); ?>
<script>

function update_score()
{
  $('.input_score').each(function(index){
      val = $(this).val();
      add = $(this).attr('data-add');
      edit = $(this).attr('data-edit');
      if(val>=1 && val<=4)
      {
        
        input = add.split("','");
        //add_test(student_id,sub_id,id_test)
        student_id2 = input[0].substr(1,5);
        in2 = input[2].length;
        id_test2 = input[2].substr(0,  in2-1 );
        var answer = $('#'+ input[1]).val();
        //alert(student_id2 + "-" + input[1] + "-" + id_test2 + "=" + answer );
      }
      
  });
  
}
function edit_test(student_id,sub_id,id_test,answer_id)
{
  console.log(student_id + "|" + sub_id + "|" + id_test);
  var answer = $('#'+sub_id).val();
  console.log("ans=" + answer);
  $.ajax({
    url: 'edit_test3.php',
    type: 'POST',
    dataType: 'html',
    data: {
      mode: 'edit',
      student_id:student_id,
      sub_id,sub_id,
      id_test:id_test,
      answer:answer,
      answer_id:answer_id,
      present:'60'
    }

  })
  .done(function(result) {
    console.log("success" + result);
    update();
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
function add_test(student_id,sub_id,id_test)
{
  console.log(student_id + "|" + sub_id + "|" + id_test);
  var answer = $('#'+sub_id).val();
  console.log("ans=" + answer);
  $.ajax({
    url: 'edit_test3.php',
    type: 'POST',
    dataType: 'html',
    data: {
      mode: 'add',
      student_id:student_id,
      sub_id,sub_id,
      id_test:id_test,
      answer:answer,
      present:'60'
    }

  })
  .done(function(result) {
    console.log("success" + result);
    update_score();
    update();
    
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
function getStd(room,level)
{
  $.ajax({
    url: 'src_std.php',
    type: 'POST',
    dataType: 'html',
    data: {
      level: level,
      room: room,
      student_id: $('#student_id').val(),
    }
  })
  .done(function(result) {
    console.log("success");
    $('#student_id').html(result);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
function update()
{
  $.ajax({
    url: 'edit_test2.php',
    type: 'POST',
    dataType: 'html',
    data: {
      student_id: $('#student_id').val(),
      test:$('#test').val(),
      level:$('#level').val(),
      room:$('#room').val(),

    }
  })
  .done(function(result) {
    console.log("success");
    $('#tb').html(result);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
  $(document).ready(function() {
    update();
    $('.filter').change(function(event) {
      /* Act on the event */
      var room = $('#room').val();
      var level = $('#level').val();
      if(room!='0' && level != '0')
      {
        getStd(room,level);
      }
      update();


    });



  
    
  });
</script>
<h3><center>
  แก้ไขข้อสอบ
</center></h3>
<hr />
<div class="w3-row">


<div class="w3-col s4 w3-padding-left " id="form_test">
<h5>แบบทดสอบ</h5>
<select class="w3-select w3-border filter" id="test">
  <option value="0">
    เลือกแบบทดสอบ
  </option>
  <?php
  $t = "select * from test order by order_id asc";
  $q = mysqli_query($link,$t);
  while($rs = mysqli_fetch_array($q))
  {
    echo "<option value='{$rs['id']}'>ห้อง {$rs['test_name']}</option>";

  }
  ?>
</select>
</div>

<div class="w3-col s2 w3-padding-left w3-padding-right" id="form_level">
<h5>ระดับชั้น</h5>
<select class="w3-select w3-border filter" id="level">
<option value="0">
  เลือกระดับชั้น
</option>
<?php
for($i=1;$i<=6;$i++)
{
  echo "<option value='{$i}'>ชั้น ม. {$i}</option>";

}
?>
</select>
</div>

<div class="w3-col s2 w3-padding-left w3-padding-right" id="form_room">
<h5>เลือกห้องเรียน</h5>
<select class="w3-select w3-border filter" id="room">
  <option value="0">
    เลือกห้อง
  </option>
  <?php for($i=1;$i<=11;$i++)
  {
    echo "<option value='{$i}'>ห้อง {$i}</option>";

  }
  ?>
</select>
</div>
<div class="w3-col s3 w3-padding-left w3-padding-right" id="std_id">
<h5>เลือกห้องนักเรียน</h5>
<select class="w3-select w3-border filter" id="student_id">


</select>
</div>


</div> <!-- w3-row -->



<hr />
<div class="w3-container" id="tb">

  <br />
  </div>
