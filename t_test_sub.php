
<script>
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
function update()
{
  	$.ajax({
		method: "POST",
		url: "t_test_sub3.php",
		data: { mode: "list",
				id : $('#id_test').val()

				}
		})
		.done(function(data) {
		$('#table_couse').html(data);
    $('#form_test_sub').slideUp();
		$('#show_test_sub').show();
		});
}

$(document).ready(function(){
  update();
	$('#form_test_sub').hide();
	$('#form_rubric_quality').hide();

	$('#show_test_sub').click(function(){
    $('input[name="answer"]').prop('checked', false);
    $('#mode').val('add');
    $('#test_id').val('');
    $('#q1').val('');
    $('#q2').val('');
    $('#q3').val('');
    $('#q4').val('');
    $('#answer').val('');
    $('#test_sub_name').val('');
    $('#score').val(1);
		$('#form_test_sub').slideDown();
		$('#show_test_sub').hide();

	});

	$('#btn_close_form_add_couse').click(function(){
		$('#form_test_sub').slideUp();
		$('#show_test_sub').show();

    topFunction();

	});

	$('#save_add_test').click(function(){
    //alert($('input[name=choice_radio]:checked').val());
    var answer = $('input[name=answer]:checked').val()
		$.ajax({
		method: "POST",
		url: "t_test_sub2.php",
		data:
		{
      mode : $('#mode').val(),
			id_test : $('#id_test').val(),
      test_id : $('#test_id').val(),
			test_sub_name : $('#test_sub_name').val(),
      test_score : $('#score').val(),
      q1 : $('#q1').val(),
      q2 : $('#q2').val(),
      q3 : $('#q3').val(),
      q4 : $('#q4').val(),
      answer : answer

		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#rubric_sub_name').val("");

      update();
      topFunction();
		});


	});




});

		function del_rubric(ID){
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "t_test_sub2.php",
			data: {
				mode: "del",
				id : ID
				}
			})
			.done(function(data) {

			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "t_test_sub3.php",
			data: { mode: "list",
					id : $('#id_test').val()
					}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});

			});
			}

		}
		function add_rubric_quality(name){
			$('#form_rubric_quality').slideDown();


		}
		function edit_test(ID,test_sub_name,score,q1,q2,q3,q4,answer){
      //  console.log(ID + "," + test_sub_name + "," + score + "," +answer);
        topFunction();
        console.log(answer);
        var $radios = $('input:radio[name=answer]');
        if(answer==0)
        {
          $('input[name="answer"]').prop('checked', false);
        }else{
          $radios.filter('[value='+ answer +']').prop('checked', true);
        }
        


        
        
        $('input[name=answer]:checked').val()
        $('#show_test_sub').hide();
        $('#form_test_sub').slideDown();
        $('#mode').val('edit');
        $('#test_id').val(ID);
        $('#test_sub_name').val(test_sub_name);
        $('#score').val(score);
        $('#q1').val(q1);
        $('#q2').val(q2);
        $('#q3').val(q3);
        $('#q4').val(q4);


		}
    function save_test_sub()
    {
      var id_test = $('#id_test').val();
      $.ajax({
      method: "POST",
      url: "t_test_sub2.php",
      data: {
        mode: "edit_test_sub",
          id : $('#test_id').val(),
          test_sub_name :$('#test_sub_name2').val(),
          score : $('#score2').val()
        },
      success:function(result){
        //alert(result);
        window.location.href = 'index.php?m=teacher_test_sub&id=' + id_test;
      }
    });
  }
</script>
<center><br />
  <a href="index.php?m=teacher_test" class="w3-btn w3-orange">กลับไปยังแบบทดสอบ</a>
  <button id="show_test_sub" class="w3-btn w3-green">เพิ่มคำถาม</button>
</center>
<hr />
<div class="w3-center w3-xlarge">ชื่อแบบทดสอบ <b>
<?php
	$rubric = "select * from test where id = '".$_GET['id']."' ";
	$q_rubric = mysqli_query($link, $rubric);
	$r_rubric = mysqli_fetch_array($q_rubric);
	echo $r_rubric['test_name'];
?></div>
	<div id="form_test_sub" class=" w3-container w3-small">

	<div class="w3-card w3-pale-yellow">
	<header class="w3-row w3-indigo w3-animate-top" style="max-width:100%;" >
	<center><h4>แบบฟอร์มคำถาม</h4>
	</header>
  <br />
  <div class="w3-container ">
    <input class="w3-input w3-border " id="id_test" type="hidden" value="<?php echo $_GET['id']; ?>">
    <input class="w3-input w3-border " id="test_id" type="hidden" >
    <input class="w3-input w3-border " id="edit" type="hidden" value="<?php echo $_GET['edit']; ?>">
    <input class="w3-input w3-border " id="mode" type="hidden" value="add">

    <table class="w3-table-all w3-centered">
    <tr>
      <td>
        คำถาม
      </td>
      <td>
        <textarea class="w3-input w3-border" id="test_sub_name" placeholder="พิมพ์คำถาม"></textarea>
      </td>
    </tr>
    <tr>
      <td>
        คะแนน
      </td>
      <td>
        <input class="w3-input w3-border " id="score" type="number" value="1">
      </td>
    </tr>
    </table>






  </div>
  <hr />
  <div class="w3-container">
    <table class="w3-table-all w3-centered">
      <tr>
        <td style="vertical-align: middle;width:5%">
          ก
        </td>
        <td style="vertical-align: middle;">
          <input type="radio" name="answer" value='1'/>
        </td>
        <td>
            <input class="w3-input w3-border " id="q1" type="text" >
        </td>
      </tr>

      <tr>
        <td style="vertical-align: middle;width:5%">
          ข
        </td>
        <td style="vertical-align: middle;">
          <input type="radio" name="answer" value='2'/>
        </td>
        <td>
            <input class="w3-input w3-border " id="q2" type="text">
        </td>
      </tr>

      <tr>
        <td style="vertical-align: middle;width:5%">
          ค
        </td>
        <td style="vertical-align: middle;">
          <input type="radio" name="answer" value='3'/>
        </td>
        <td>
            <input class="w3-input w3-border " id="q3" type="text" >
        </td>
      </tr>

      <tr>
        <td style="vertical-align: middle;width:5%">
          ง
        </td>
        <td style="vertical-align: middle;">
          <input type="radio" name="answer" value='4'/>
        </td>
        <td>
            <input class="w3-input w3-border " id="q4" type="text" >
        </td>
      </tr>
    </table>



  </div>

	<p>
    <center>
    <button id="save_add_test" class="w3-btn w3-blue" >บันทึก</button>
    <button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
  </center>
</p>
	</div>






	</div>


<br>
<div id="table_couse" class="w3-container"></div>


</div>
