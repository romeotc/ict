<?php include('db.php'); ?>
<script>
var nums = [];
var gen_nums = [];
function in_array(array, el) {
   for(var i = 0 ; i < array.length; i++) 
       if(array[i] == el) return true;
   return false;
  }
  function get_rand(array) {
    var rand = array[Math.floor(Math.random()*array.length)];
    if(!in_array(gen_nums, rand)) {
       gen_nums.push(rand); 
       return rand;
    }
    return get_rand(array);
}
function random_ans()
{
  var len = $('.input_score').length;
  var set_input = $('#set_input').val();
  var ran = len - set_input;
  sel = 0;
  //alert(ran);
 
  
  



  for(var a = 0; a < ran; a++) {
   
    var id = get_rand(nums);
    var answer = $('#'+ id).attr('data-ans');
    sum = parseInt(answer)+1;
    if(sum>4){ sum = 1; }
    $('#'+ id).val(sum);
    $('#ans'+  id).text("0");
    $('#ans'+  id).removeClass("w3-teal");
    $('#ans'+  id).addClass("w3-red");

  }

  

}
function set_answer()
{
  count = 0;
  var i = 1;
  $('.input_score').each(function(index){
     // var ans = Math.floor(Math.random() * 4)+1; 
      id = $(this).attr('id');
      nums[i] = id;
      add = $(this).attr('data-add');
      answer = $(this).attr('data-ans');
      input = add.split("','");
        //add_test(student_id,sub_id,id_test)
        student_id2 = input[0].substr(1,5);
        in2 = input[2].length;
        id_test2 = input[2].substr(0,  in2-1 );

      $(this).val(answer);
      var ans2 = $(this).attr('data-ans');
      if(answer==ans2)
      {
        count += 1;
        $('#ans'+  input[1]).text("1");
        $('#ans'+  input[1]).addClass("w3-teal");
      }else{
        $('#ans'+  input[1]).text("0");
        $('#ans'+  input[1]).addClass("w3-red");
      }
      
  i += 1;    
  });
  return count;
}
function random_input()
{
  var set_input = $('#set_input').val();
  var score = 0;
  
  if(set_input>0)
  {
    
    set_answer();
    random_ans();
    
  }else{
    alert(" Please Check input");
  }
}
function save_all()
{
  $('.input_score').each(function(index){
    add = $(this).attr('data-add');
      answer = $(this).attr('data-ans');
      input = add.split("','");
        //add_test(student_id,sub_id,id_test)
        student_id2 = input[0].substr(1,5);
        in2 = input[2].length;
        id_test2 = input[2].substr(0,  in2-1 );
      add_ans(student_id2,input[1],id_test2);

  });
}
function add_ans(student_id,sub_id,id_test)
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
</script>
<?php
$a1 = "select sum(if(a.answer=b.answer,1,0)) as sum_score from test_answer as a
  inner join test_sub as b on a.test_sub_id = b.id where a.student_id ='".$_POST['student_id']."' and b.id_test = '".$_POST['test']."' ";
  //echo $a1;
  $qa1 = mysqli_query($link,$a1);
  $rsa1 = mysqli_fetch_array($qa1);


 ?>
 <input id="set_input" type="number" value="0"><button id="btn_random" onclick="random_input();">Random</button>
 <h3><center>
   <?php echo $rsa1['sum_score']; ?><button id="btn_save_all" onclick="save_all();">Save All</button>
 </center></h3>
<table class="w3-table w3-bordered">
  <tr class="w3-teal">
    <td>
      ลำดับ
    </td>
    <td>
      คำถาม
    </td>
    <td>
      เฉลย
    </td>
    <td>
      ข้อที่เลือก
    </td>
    <td>
      คะแนน
    </td>
    <td>
      บันทึก
    </td>
  </tr>
<?php
$i =1 ;

  $s = "select *, b.answer as answer_test, c.answer as answer_std ,b.id as sub_id,b.id_test as id_test,c.id as answer_id
  from test as a
    inner join test_sub as b on a.id = b.id_test
    left join (select * from test_answer where student_id = {$_POST['student_id']} ) as c on b.id = c.test_sub_id
    left join tb_student59 as d on c.student_id = d.student_id ";
    $s .= " where a.id = {$_POST['test']}  order by b.id asc ";
  //  echo $s;
  $q = mysqli_query($link,$s);
  while($rs = mysqli_fetch_array($q)){
    ?>
    <tr>
      <td>
        <?php echo $i; ?>
      </td>
      <td>
        <?php echo $rs['test_sub_name']; ?>
      </td>
      <td>
        <span class="w3-badge"><?php echo $rs['answer_test']; ?></span>
      </td>
      <td>
        <?php
        $data_add = "'".$_POST['student_id']."','".$rs['sub_id']."','".$rs['id_test']."'";
          $data_edit = "'".$_POST['student_id']."','".$rs['sub_id']."','".$rs['id_test']."','".$rs['answer_id']."'";
        ?>
        <input type="text" min='1' max="4" class="w3-input w3-border input_score" id="<?php echo $rs['sub_id'];?>" value="<?php 
        echo $rs['answer_std']; 
        
         ?> 
        " style="text-align:center;width:80%;" data-add="<?php echo $data_add; ?>" data-edit="<?php echo $data_edit; ?>"
        data-ans="<?php echo $rs['answer_test']; ?>"
        >
        <?php //echo $rs['sub_id']."-".$rs['answer_std'];?>
      </td>
      <td>
        <?php if($rs['answer_test']==$rs['answer_std']){
          echo "<span class='w3-badge w3-teal'    id='ans{$rs['sub_id']}'      >{$rs['score']}</span>";
        }else{
          echo "<span class='w3-badge w3-red'  id='ans{$rs['sub_id']}'      >0</span>";
        } ?>
      </td>
      <td>
        <?php
        if($rs['answer_id']==''){
          $data_add = "'".$_POST['student_id']."','".$rs['sub_id']."','".$rs['id_test']."'";
          ?>
        <button class="w3-button w3-teal" id="btn_add" onclick="add_test(<?php echo $data_add;?>)"><i class="fa fa-plus"></i></button>
      <?php }else{
        $data_edit = "'".$_POST['student_id']."','".$rs['sub_id']."','".$rs['id_test']."','".$rs['answer_id']."'";
        ?>
        
        <button class="w3-button w3-blue" id="btn_save" onclick="edit_test(<?php echo $data_edit;?>)"><i class="fa fa-save"></i></button>
    <?php  } ?>
        <input type="hidden" id="status_add" value="<?php if($rs['answer_id']==''){ echo "0"; }else{ echo "1"; }?>">
      </td>
    </tr>



  <?php $i++; } ?>
  </table>
  <div class="show_ans" style=""><center>
  <h3>คะแนน <br /><span id="count_ans"> <?php echo $rsa1['sum_score']; ?></span></h3>
  </center></div>
