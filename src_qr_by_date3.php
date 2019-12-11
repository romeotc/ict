<script>
$('document').ready(function(){
	 $('#save_value').click(function(){
		lenn = $(':checkbox:checked').length;
		//alert(lenn);
		
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "src_qr_by_date4.php",
			data: { 
			mode: "add_m",
			date : $('#start_date').val(),
			id : $(this).val()
			}
			})
			.done(function(data) {
			$('#status_add').html(data);
			});
		
		  //alert(i + "-" + val[i]);
        });
      });

});
</script>
<!DOCTYPE html>
<html lang="th" class="no-js">
  <head>
  <title>บทเรียนบทเว็บวิชาเทคโนโลยีสารสนเทศ</title>
    <meta charset="utf-8">

<?php
include('db.php');

$date = $_POST['date'];
echo $date;
$s = "select * from tb_student59as a inner join tb_track as b on a.student_id = b.student_id  
where b.student_id = '".$_POST['id']."' and date(b.datetime) = '".$date."'  ";
$q = mysqli_query($link,$s);
$rs = mysqli_num_rows($q);
$result = mysqli_fetch_array($q);
//echo $s;

if($rs>0){
echo " <h3>".$time. " <h4 class='w3-text-red'> " .$_POST['id'].  " </h4> <h4>เช็คชื่อไปแล้ว   ".$result['datetime']."</h4>";
}else{
	if($_POST['mode']=='add'){
	$s_add = "INSERT INTO tb_track (student_id) VALUES ('".$_POST['id']."') ";
	$q_add = mysqli_query($link,$s_add);
	
if($q_add){ echo "<h3 class='w3-text-teal'>".$time." ".$_POST['id']."  บันทึกสำเร็จ</h3>"; }else{ echo "Add DATA ERROR!!"; }

	}
	}



$s = "select * from tb_student59 where room = '".$_POST['room']."' order by ordinal asc limit 100";
$q = mysqli_query($link,$s);
//echo $s;
$i=1;


//echo $s_d;
?>
<div id="status_add"></div>
<h3>รายชื่อนักเรียน ห้อง <?php echo $_POST['room']; ?></h3>

<table class="w3-table w3-bordered w3-striped">
<tr class="w3-teal"><td>เลขที่</td><td>รหัสนักเรียน</td><td>ชื่อ-นามสกุล</td>
<td>เช็คชื่อ</td>

<?php while($rs = mysqli_fetch_assoc($q)){ ?>
<tr id="row_main">
<td> <?php echo $rs['ordinal']; ?> </td>
<td> <?php echo $rs['student_id']; ?> </td>
<td> <?php echo $rs['s_firstname']." ".$rs['s_lastname']; ?> </td>




<td>
<input class="w3-check" type="checkbox" id="add_check" value="<?php echo $rs['student_id'];?>" >
<label id="label_check"></label>
</td>
</tr>
	

	
	
<?php
$i++;	
}
?>

</table>