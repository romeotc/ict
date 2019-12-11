<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
<script>
  function update()
  {
    $.ajax({
      url: 'manage_con2.php',
      type: 'POST',
      dataType: 'html',
      data: {
        id:$('#id').val()
      }
    })
    .done(function(result) {
      console.log("success ");
      $('#tb').html(result);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }
  function edit_data(ID,name){
    var val = $('#data_'+ name + ID).val();
    $('#mode').val(name);
    alert(val);
    document.getElementById('id01').style.display='block';

    CKEDITOR.instances['editor'].setData(val);
  }
  $(document).ready(function() {
    update();

    $('#save_data').click(function(event) {
        var content = CKEDITOR.instances['editor'].getData()
      /* Act on the event */
      alert(content);
      $(this).prop('disabled',true);
      $.ajax({
        url: 'manage_con3.php',
        type: 'POST',
        dataType: 'html',
        data: {
          content:content,
          id : $('#id').val(),
          mode : $('#mode').val()
        }
      })
      .done(function(result) {
        console.log(result);
        console.log("success");
        update();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      $(this).prop('disabled',false);
      document.getElementById('id01').style.display='none';
    });



  });
</script>
<input id="id" type="hidden" value="<?php echo $_GET['id']; ?>">
<div id="tb">

</div>


<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <header class="w3-container w3-teal">
           <span onclick="document.getElementById('id01').style.display='none'"
           class="w3-button w3-display-topright">&times;</span>
           <h4>คำอธิบาย</h4>
         </header>


      <div class="w3-section w3-container">


          <input class="" type="hidden"  id="id" >
          <input class="" type="hidden"  id="mode" >
        <p>
          <label><b>คำอธิบาย</b></label>
          <textarea cols="80" id="editor" name="editor" rows="10" ></textarea>
        </p>

        <hr />
        <button class="w3-button w3-block w3-green w3-section w3-padding" id="save_data">บันทึก</button>

      </div>


    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>

    </div>

  </div>
</div>


 <script>
   CKEDITOR.replace('editor', {
     extraPlugins: 'autogrow',
     autoGrow_minHeight: 200,
     autoGrow_maxHeight: 600,
     autoGrow_bottomSpace: 50,
     removePlugins: 'resize'
   });

 </script>
