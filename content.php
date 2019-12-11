
<script>
  function update(){
    $.ajax({
      url: 'content2.php',
      type: 'POST',
      dataType: 'html',
      data: {
        param1: 'value1'
      }
    })
    .done(function(result) {
      console.log("success");
      $('#tb_unit').html(result);

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  }
  function add_btn()
  {
    document.getElementById('id001').style.display='block';
      $('#topic').val("");
      CKEDITOR.instances['editor'].setData("");
  }
  function edit_content(ID,topic)
  {
    document.getElementById('id001').style.display='block';
    $('#mode').val('edit_content');
    $('#topic').val(topic);
    var val = $('#data_content' + ID).val();
    $('#id').val(ID);
      CKEDITOR.instances['editor'].setData(val);
  }
  function del_content(ID){
    var txt = "ยืนยันต้องการลบข้อมูลนี้?";
    var r = confirm(txt);
    if(r==true){
    $.ajax({
      url: 'content3.php',
      type: 'POST',
      dataType: 'html',
      data: {
        mode: 'del_content',
        id : ID
        }
    })
    .done(function(result) {
      console.log("success DEL");
      console.log(result);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    update();
  }
}
  $(document).ready(function() {
    update();
    //$('#mode').hide();
    $('#save_content').click(function(event) {
      /* Act on the event */
      var content = CKEDITOR.instances['editor'].getData();
      $(this).prop('disabled',true);
      $.ajax({
        url: 'content3.php',
        type: 'POST',
      //  dataType: 'html',
        data: {
          mode: $('#mode').val(),
          topic : $('#topic').val(),
          content:content,
          id:$('#id').val()

        }
      })
      .done(function(result) {

        console.log("success=");
        console.log(result);
        update();
        document.getElementById('id001').style.display='none';
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      $(this).prop('disabled', false);
    });
  });
</script>

<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>เนื้อหา

</h3>
</div>

</header>
<center>
  <br />
  <p>
  <button class="w3-button w3-blue" id="add_btn" onclick="add_btn();">
    <i class="fa fa-plus"></i> เพิ่มเนื้อหา</button>
</p>
  <div class="w3-container">
    <div id="tb_unit">

    </div>
  </div>


  <div id="id001" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:auto;height:auto">
      <header class="w3-container w3-teal">
             <span onclick="document.getElementById('id001').style.display='none'"
             class="w3-button w3-display-topright">&times;</span>
             <h4>แบบฟอร์มเนื้อหา</h4>
           </header>


        <div class="w3-section w3-container">

            <input class="" type="hidden"  id="mode" value="add_content">
            <input class="" type="hidden"  id="id" >

          <p>
            <label><b>หัวเรื่อง</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="หัวเรื่อง" id="topic" required>
          </p>
          <p>
            <label><b>เนื้อหา</b></label>
          <textarea cols="80" id="editor" name="editor" rows="10" ></textarea>
          </p>



          <hr />
          <button class="w3-button w3-block w3-green w3-section w3-padding" id="save_content">บันทึก</button>

        </div>


      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id001').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>

      </div>

    </div>
  </div>
  </div>
  <script>
    CKEDITOR.replace('editor', {
      extraPlugins: 'autogrow',
      autoGrow_minHeight: 200,
      autoGrow_maxHeight: 600,
      autoGrow_bottomSpace: 50,
      extraPlugins: 'image2,uploadimage',
      removePlugins: 'resize'
    });

  </script>
