<script>
function edit_std(ID,student_id,name,last,room,ordinal,password)
{
  $('#mode').val('edit_std');
  $('#id').val(ID);
  $('#student_id').val(student_id);
  $('#name').val(name);
  $('#last').val(last);
  $('#room2').val(room);
  $('#ordinal').val(ordinal);
  $('#password').val(password);
  document.getElementById('id01').style.display='block';
}
function del_std(ID)
{
  var txt = "ยืนยันลบนักเรียนคนนี้";
  var r = confirm(txt);
  if(r==true){
  $.ajax({
    url: 'student3.php',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {
      id: ID,
      mode:'del_std'
    }
  })
  .done(function(result) {
    console.log("success");
    var msg = result.split(',');
    if(msg[0]=='1')
    {
      alert("บันทึกนักเรียนสำเร็จ");
    }


  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}
update();
}
function add_std()
{
    $.ajax({
      url: 'student3.php',
      type: 'POST',
      //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        student_id: $('#student_id').val(),
        name: $('#name').val(),
        last: $('#last').val(),
        level: $('#level2').val(),
        room: $('#room2').val(),
        oradinal: $('#ordinal').val(),
        password: $('#password').val(),
        mode:$('#mode').val()
      }
    })
    .done(function(result) {
      console.log("success");
      var msg = result.split(',');
      if(msg[0]=='1')
      {
        alert("บันทึกนักเรียนสำเร็จ");
      }
      document.getElementById('id01').style.display='none';
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

}
function check()
{
  var test = $('#test').val();
  if(test==0){
    $('#form_room').hide();
    $('#room').val(0);
  }else{
    $('#form_room').show();

  }
}
function update(){
  check();
  $.ajax({
    url: 'student2.php',
    type: 'POST',
  //  dataType: '',
    data: {
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
    $('#level').change(function(){
      $('#room').val(0);
      check();
    });
    $('#room').change(function(){
      update();
    });
    $('#save_std').click(function(event) {
      /* Act on the event */
      $(this).prop('disabled',true);
      add_std();
      $(this).prop('disabled',false);
    });
  });
</script>
<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>ข้อมูลนักเรียน

</h3>
</div>

</header>
<center>
  <br />
  <p>
    <button class="w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">+ เพิ่มนักเรียน</button>
  </p>
  <div class="w3-row">


<div class="w3-col s6 w3-padding-left " id="form_level">
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


<div class="w3-col s6 w3-padding-left w3-padding-right" id="form_room">
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
<div id="tb_student">

</div>

</center>
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <header class="w3-container w3-teal">
           <span onclick="document.getElementById('id01').style.display='none'"
           class="w3-button w3-display-topright">&times;</span>
           <h4>แบบฟอร์มข้อมูลนักเรียน</h4>
         </header>


      <div class="w3-section w3-container">
          <input class="" type="hidden"  id="id" >
          <input class="" type="hidden"  id="mode" value="add_std">
        <p>
          <label><b>รหัสนักเรียน</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="รหัสนักเรียน" id="student_id" required>
        </p>
        <p>
          <label><b>รหัสผ่าน</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="รหัสผ่าน" id="password" required>
        </p>
        <p>
        <label><b>ชื่อ</b></label>
        <input class="w3-input w3-border" type="text" placeholder=""  id="name" required>

        </p>


        <p>
          <label><b>นามสกุล</b></label>
          <input class="w3-input w3-border" type="text" placeholder="" id="last" required>
        </p>

        <p>
          <label><b>ระดับชั้น</b></label>
          <select class="w3-select w3-border" id="level2">
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
        </p>
        <p>
            <label><b>ห้อง</b></label>
          <select class="w3-select w3-border" id="room2">
            <option value="0">
              เลือกห้อง
            </option>
            <?php for($i=1;$i<=11;$i++)
            {
              echo "<option value='{$i}'>ห้อง {$i}</option>";

            }
            ?>
          </select>
        </p>
        <p>
          <label><b>เลขที่</b></label>
          <input class="w3-input w3-border" type="number" placeholder="" id="ordinal" required>
        </p>
        <hr />
        <button class="w3-button w3-block w3-green w3-section w3-padding" id="save_std">บันทึก</button>

      </div>


    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>

    </div>

  </div>
</div>
</div>
