<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>ดาวน์โหลด
<?php if(isset($_GET['edit'])=='1'){ ?>
  <a class="w3-btn w3-red" href="index.php?m=<?php echo $name; ?>">     ยกเลิก</a>
  <a id="save_edit" class="w3-btn w3-blue">บันทึก</a>
<?php }else{
		if($_SESSION["group_hw"] == "teacher"){
?>
  <a class="w3-btn w3-teal" href="index.php?m=<?php echo $name; ?>&edit=1">     แก้ไข</a>
		<?php } } ?>
</h3>
</div>

</header>
<center>
  <br /><br />

  <table class="w3-table-all w3-centered" style="width:80%">
    <tr>
      <td class="w3-border w3-border-blue">
        <a href="./pdf/student_manual.pdf" target="_blank">
          <img src="img/download_std.png" width="250px" height="100px"/>
        </a>

      </td>
      <td class="w3-border w3-border-orange">
        <a href="./pdf/teacher_manual.pdf" target="_blank">
        <img src="img/download_tea.png" width="250px" height="100px"/>
        </a>
      </td>
      
    </tr>
  </table>
</center>
<hr />
