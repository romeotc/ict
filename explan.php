
<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>คำชี้แจง
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


  <img src="img/explan_std.png"  width="458" height="82"><br>
                       <table width="820" border="4" cellpadding="0" cellspacing="0" bordercolor="#999999">
                         <tr>
                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <table width="790" border="0" align="center" cellpadding="0" cellspacing="0">
                                 <tr>
                                   <td style="font-size:20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <span class="style2" style="font-size:20">
                                       &nbsp; บทเรียนบนเว็บ&nbsp; รายวิชา&nbsp; เทคโนโลยีสารสนเทศ&nbsp;
                                      เรื่องเทคโนโลยีสารสนเทศ และคอมพิวเตอร์ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4&nbsp; โดยให้นักเรียนปฏิบัติตามขั้นตอน  ดังนี้ <br>
                                     </span>
                                       <ol class="style2">
                                         <li>นักเรียนเข้าสู่บทเรียนบนเว็บ รายวิชา เทคโนโลยีสารสนเทศ เรื่องเทคโนโลยีสารสนเทศ และคอมพิวเตอร์ ด้วยที่อยู่เว็บไซต์ คือ
                                          <a href="http://ict.kruimron.com">http://ict.kruimron.com</a> </li>
                                         <li> นักเรียนอ่านคำแนะนำการใช้บทเรียนและศึกษาคู่มือการใช้บทเรียนบนเว็บให้เข้าใจ  แล้วจึงเริ่มเรียนรู้
                                           บทเรียนบนเว็บด้วยตนเอง <br>
                                         </li>
                                         <li> นักเรียนสมัครสมาชิกบทเรียนบนเว็บ </li>
                                         <li> นักเรียนทำแบบทดสอบก่อนเรียนด้วยบทเรียนบนเว็บ  ซึ่งเป็นแบบทดสอบแบบหลายตัวเลือก จำนวน 30 ข้อ</li>
                                         <li> บทเรียนบนเว็บ รายวิชา  เทคโนโลยีสารสนเทศ   สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4 ได้แบ่งเนื้อหาออกเป็น 2 หน่วยการเรียนรู้ ดังนี้</li>
                                         <ol>
                                           <li>หน่วยการเรียนรู้ที่ 1 เทคโนโลยีสารสนเทศ  </li>
                                           <li>หน่วยการเรียนรู้ที่ 2 คอมพิวเตอร์  </li>

                                         </ol>

                                         <li>เมื่อนักเรียนศึกษาบทเรียนบนเว็บครบ 2 หน่วยการเรียนรู้ ให้นักเรียนทำแบบทดสอบหลังเรียน  ด้วยบทเรียนบนเว็บ
                                           ซึ่งเป็นแบบทดสอบแบบหลายตัวเลือก
                                           จำนวน 30 ข้อ</li>
                                       </ol></td>
                                 </tr>
                               </table>
                             <br>
                           </table>

<img src="img/explan_tea.png" width="458" height="82"><br>
<table width="820" border="4" cellpadding="0" cellspacing="0" bordercolor="#999999">
                 <tr>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <table width="790" border="0" align="center" cellpadding="0" cellspacing="0">
                       <tr>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style2">
                           &nbsp; บทเรียนบนเว็บ&nbsp; รายวิชา&nbsp; เทคโนโลยีสารสนเทศ&nbsp;
                          เรื่องเทคโนโลยีสารสนเทศ และคอมพิวเตอร์ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4&nbsp; โดยให้นักเรียนปฏิบัติตามขั้นตอน  ดังนี้ <br>
                         </span>
                           <ol class="style2">
                             <li>ครูผู้สอนควรใช้แผนการจัดการเรียนรู้เล่มนี้ประกอบการใช้บทเรียนบนเว็บ รายวิชา เทคโนโลยีสารสนเทศ&nbsp;
                            เรื่องเทคโนโลยีสารสนเทศ และคอมพิวเตอร์ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4 </li>
                             <li> ให้นักเรียนเข้าสู่บทเรียนบนเว็บ  รายวิชา&nbsp; เทคโนโลยีสารสนเทศ&nbsp;
                            เรื่องเทคโนโลยีสารสนเทศ และคอมพิวเตอร์ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4 ด้วยที่อยู่เว็บไซต์ คือ
                               <a href="http://ict.kruimron.com">http://ict.kruimron.com</a></li>
                             <li> ครูเข้าสู่ระบบในฐานะครูผู้สอน </li>
                             <li> ให้นักเรียนสมัครสมาชิกบทเรียนบนเว็บ </li>
                             <li> ให้นักเรียนทำแบบทดสอบก่อนเรียนด้วยบทเรียนบนเว็บ  ซึ่งเป็นแบบทดสอบแบบหลายตัวเลือก จำนวน 30 ข้อ</li>
                             <li> บทเรียนบนเว็บ รายวิชา  เทคโนโลยีสารสนเทศ   สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 4 ได้แบ่งเนื้อหาออกเป็น 2 หน่วยการเรียนรู้ ดังนี้</li>
                             <ol>
                               <li>หน่วยการเรียนรู้ที่ 1 เทคโนโลยีสารสนเทศ  </li>
                               <li>หน่วยการเรียนรู้ที่ 2 คอมพิวเตอร์  </li>
                             </ol>

                             <li>เมื่อนักเรียนศึกษาบทเรียนบนเว็บครบ 2 หน่วยการเรียนรู้ ให้นักเรียนทำแบบทดสอบหลังเรียน  ด้วยบทเรียนบนเว็บ</li>
                             <li>
                               ครูตรวจสอบคะแนนนักเรียนที่ใช้งานบนเรียน
                             </li>


                             </ol></td>
                       </tr>
                     </table>
  </table>
</center>
