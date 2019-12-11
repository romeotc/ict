
<script>
  function update(){
    $.ajax({
      url: 'unit2.php',
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
  function edit_unit(ID,unit_name,order_id)
  {
    document.getElementById('id01').style.display='block';
    $('#mode').val('edit_unit');
    $('#unit_name').val(unit_name);
    $('#order_id').val(order_id);
    $('#id').val(ID);
  }
  function del_unit(ID){
    $.ajax({
      url: 'unit3.php',
      type: 'POST',
      dataType: 'html',
      data: {
        mode: 'del_unit',
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
  $(document).ready(function() {
    update();
    $('#save_unit').click(function(event) {
      /* Act on the event */
      $(this).prop('disabled',true);
      $.ajax({
        url: 'unit3.php',
        type: 'POST',
      //  dataType: 'html',
        data: {
          mode: $('#mode').val(),
          unit_name : $('#unit_name').val(),
          order_id:$('#order_id').val(),
          id:$('#id').val()

        }
      })
      .done(function(result) {

        console.log("success=");
        console.log(result);
        update();
        document.getElementById('id01').style.display='none';
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
<div class="w3-container  w3-orange w3-cell"><h3>หน่วยการเรียน
<?php if(isset($_GET['edit'])=='1'){ ?>
  <a class="w3-btn w3-red" href="index.php?m=<?php echo $name; ?>">     ยกเลิก</a>
  <a id="save_edit" class="w3-btn w3-blue">บันทึก</a>
<?php }else{
		if($_SESSION["group_hw"] == "manager"){
?>
  <a class="w3-btn w3-teal" href="index.php?m=<?php echo $name; ?>&edit=1">     แก้ไข</a>
		<?php } } ?>
</h3>
</div>

</header>
<center>
  <div class="w3-container">
    <div id="tb_unit">

    </div>
  </div>


  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container w3-teal">
             <span onclick="document.getElementById('id01').style.display='none'"
             class="w3-button w3-display-topright">&times;</span>
             <h4>แบบฟอร์มข้อมูลหน่วยการเรียน</h4>
           </header>


        <div class="w3-section w3-container">


            <input class="" type="hidden"  id="id" >
            <input class="" type="hidden"  id="mode" value="add_unit">
          <p>
            <label><b>ชื่อหน่วย</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="ชื่อหน่วย" id="unit_name" required>
          </p>
          <p>
            <label><b>ลำดับ</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="ลำดับ" id="order_id" required>
          </p>



          <hr />
          <button class="w3-button w3-block w3-green w3-section w3-padding" id="save_unit">บันทึก</button>

        </div>


      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>

      </div>

    </div>
  </div>
  </div>
  <script>
    /*  ClassicEditor
          .create( document.querySelector( '#goal_editor' ) )
          .catch( error => {
              console.error( error );
          } );
          ClassicEditor
              .create( document.querySelector( '#indic_editor' ) )
              .catch( error => {
                  console.error( error );
              } );
          ClassicEditor
              .create( document.querySelector( '#explan_editor' ) )
              .catch( error => {
                  console.error( error );
                } ); */
  </script>
