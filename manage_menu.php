
<script>
function btn_add()
{
  console.log("add");
  document.getElementById('id01').style.display='block';
  $('#mode').val('add_menu');
  $('#menu_name').val('');
  $('#id').val('');
  $('#se_type').val('');
  getType('');

}
function getType(link)
{

        var val = $('#se_type').val();
        //alert(val);
        if(val=='0')
        {
            $('#getType').hide();
        }else{

          $.ajax({
            url: 'get_datatype.php',
            type: 'POST',
            dataType: 'html',
            data: {
              tid: val,
              link_id:link
            }
          })
          .done(function(result) {
            console.log("success");
            $('#getType').show();
            $('#getType').html(result);

          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

        }
}
  function update(){
    $.ajax({
      url: 'manage_menu2.php',
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
  function edit_menu(ID,menu_name,type,link,order)
  {
    document.getElementById('id01').style.display='block';
    $('#mode').val('edit_menu');
    $('#menu_name').val(menu_name);
    $('#id').val(ID);
    $('#se_type').val(type);
    $('#order_id').val(order);
    getType(link);
    console.log(link);
    $('#link_id').val(link);

  }
  function del_menu(ID){
    var txt = "ยืนยันต้องการลบข้อมูลนี้?";
    var r = confirm(txt);
    if(r==true){
    $.ajax({
      url: 'manage_menu3.php',
      type: 'POST',
      dataType: 'html',
      data: {
        mode: 'del_menu',
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
    $('#se_type').change(function(event) {
      /* Act on the event */
        getType();
    });


    $('#save_menu').click(function(event) {
      /* Act on the event */
    //  var content = CKEDITOR.instances['editor'].getData();
      alert("link=" + $('#link_id2').val());
      $(this).prop('disabled',true);
      $.ajax({
        url: 'manage_menu3.php',
        type: 'POST',
      //  dataType: 'html',
        data: {
          mode: $('#mode').val(),
          menu_name : $('#menu_name').val(),
          type:$('#se_type').val(),
          link_id:$('#link_id2').val(),
          id:$('#id').val(),
          sid:$('#sid').val(),
          order_id:$('#order_id').val()

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
    $('#btn_add').click(function() {
      /* Act on the event */
      console.log("add");
      document.getElementById('id01').style.display='block';
      $('#mode').val('add_menu');
      $('#menu_name').val();
      $('#id').val();
      $('#se_type').val();
      getType('');
      console.log(link);
      //$('#link_id').val(link);
    });
  });
</script>

<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3><i class='fas fa-project-diagram'></i>&nbsp;<b>จัดการเมนู
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
             <h4>แบบฟอร์มเมนู</h4>
           </header>


        <div class="w3-section w3-container">


            <input class="" type="hidden"  id="id" >
            <input class="" type="hidden"  id="mode" value="add_menu">
            <input class="" type="hidden"  id="sid" value="<?php echo $_GET['sid']; ?>">
          <p>
            <label><b>ชื่อเมนู</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="ชื่อเมนู" id="menu_name" required>
          </p>
          <p>
            <label><b>ลำดับ</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="ลำดับ" id="order_id" required>
          </p>
          <p>
            <label><b>ประเภทเมนู</b></label>

          <select class="w3-select w3-border" id="se_type">
            <option value="0">เลือกประเภทเมนู</option>
            <?php $s = "select * from tb_type";
              $q = mysqli_query($link,$s);
              while($rs = mysqli_fetch_array($q)){ ?>
            <option value="<?php echo $rs['id'];?>"><?php echo $rs['type_name']; ?></option>
          <?php } ?>
          </select>


          </p>
          <p >
            <div id="getType">

            </div>

          </p>




          <hr />
          <button class="w3-button w3-block w3-green w3-section w3-padding" id="save_menu">บันทึก</button>

        </div>


      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>

      </div>

    </div>
  </div>
  </div>
