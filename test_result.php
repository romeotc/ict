<script>
function check()
{
  var test = $('#test').val();
  var level = $('#level').val();
  if(test==0){
    $('#form_room').hide();
    $('#form_level').hide();
    $('#level').val(0);
    $('#room').val(0);
  }else{
    $('#form_level').show();

  }
  if(level==0){
    $('#form_room').hide();
    $('#room').val(0);
  }else{
    $('#form_room').show();

  }

}
function update(){
  check();
  $.ajax({
    url: 'test_result2.php',
    type: 'POST',
  //  dataType: '',
    data: {
      test: $('#test').val(),
      level: $('#level').val(),
      room: $('#room').val()
     }
  })
  .done(function(result) {
    console.log("success");
    $('#tb_student').html(result);
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
    $('#test').change(function(){
      $('#level').val(0);
      check();
    });
    $('#level').change(function(){
      $('#room').val(0);
      check();
    });
    $('#room').change(function(){
      update();
    });
  });
</script>
<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>ผลการสอบ

</h3>
</div>

</header>
<center>
  <div class="w3-row">


<div class="w3-col s4 w3-padding-left " id="form_test">
  <h5>แบบทดสอบ</h5>
  <select class="w3-select w3-border" id="test">
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

<div class="w3-col s4 w3-padding-left w3-padding-right" id="form_level">
<h5>ระดับชั้น</h5>
<select class="w3-select w3-border" id="level">
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

<div class="w3-col s4 w3-padding-left w3-padding-right" id="form_room">
  <h5>เลือกห้องเรียน</h5>
  <select class="w3-select w3-border" id="room">
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

</div> <!-- w3-row -->


  <hr />
  <div class="w3-container">
    <div id="tb_student">



    </div>
  </div>
