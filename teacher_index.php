<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>หน้าหลักคุณครู
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
<div class="w3- w3-margin">
  <h3>เลือกเมนูทางซ้ายมือเพื่อจัดการข้อมูลต่าง</h3>
  <h4>คำอธิบายเมนู</h4>
  <table class="w3-table" style="width:70%">

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
            <i class="fa fa-users"></i><b>&nbsp;ข้อมูลนักเรียน</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อการจัดการข้อมูลนักเรียนในระบบ สามารถเพิ่ม ลบ แก้ไข ข้อมูลนักเรียนในระบบได้
      </td>
    </tr>

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
    				<i class='fa fa-clipboard'></i>&nbsp;<b>ข้อมูลแบบทดสอบ</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อการจัดการข้อมูลแบบทดสอบในบทเรียน สามารถเพิ่ม ลบ แก้ไข ข้อมูลแบบทดสอบ และจัดการเกี่ยวกับตัวเลือกและเฉลย เพื่อใช้ในการเก็บคะแนนผู้เรียนจากการสอบ
      </td>
    </tr>

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
    			<i class='fa fa-bar-chart-o'></i>&nbsp;<b>ผลการสอบ</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อตรวจสอบผลการสอบของนักเรียน ที่เข้าไปทำแบบทดสอบเสร็จสิ้นแล้วคะแนนจะปรากฎที่เมนูนี้
      </td>
    </tr>

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
    			<i class='fa fa-bar-chart-o'></i>&nbsp;<b>หน่วยการเรียน</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อใช้ในการข้อมูลพื้นฐานเกี่ยวกับหน่วยการเรียน ชื่อหน่วย สาระสำคัญ ตัวชี้วัด และสาระการเรียนรู้
      </td>
    </tr>

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
    			<i class='fa fa-bar-chart-o'></i>&nbsp;<b>เนื้อหา</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อสร้างหรือแก้ไข เนื้อหาที่ต้องการเพิ่มเข้าสู่บทเรียน
      </td>
    </tr>

    <tr>
      <td>
        <a  class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="">
          <h5 class="w3-text-blue" >
    			<i class='fa fa-bar-chart-o'></i>&nbsp;<b>จัดการเมนู</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เพื่อเพิ่มหรือแก้ไข และ ลบ เมนูที่จะแสดงให้นักเรียนใช้งาน
      </td>
    </tr>





    <tr>
      <td>
        <a   class="w3-border w3-bar-item w3-red w3-button w3-hover-black w3-block" style="">
  				<h5 class="w3-text-white" style="text-shadow:1px 1px 0 #444">
  				<i class='fa fa-close'></i>&nbsp;<b>ออกจากระบบ</b></h5></a>
      </td>
      <td>
        คือ เมนูใช้เมื่อต้องการจบการทำงาน หลังจากทำงานเสร็จสิ้นแล้ว
      </td>
    </tr>

  </table>
</div>
