<?php
session_start();
require_once("inc/dbconnect.php");
// ตรวจสอบค่าที่ส่งมาผ่าน ajax แบบ POST ในที่นี้เราจะเช็ค 3 ค่า ว่ามีส่งมาไหม
if(isset($_POST['ggname']) && $_POST['ggname']!="" && isset($_POST['ggid']) && $_POST['ggid']!=""
&& isset($_POST['ggemail']) && $_POST['ggemail']!=""
){
    // กำหนดรูปแบบรหัสสำหรับ gg_authorized สำหรับไว้ใช้ล็อกอิน ในท่ี่นี้ใช้รูปแบบอย่างง่าย 
    // ใช้ ไอดี ต่อกับ รหัสพิเศษกำหนดเอง สามารถไปประยุกต์เข้ารหัสรูปแบบอื่นเพิ่มเติมได้
    //$gg_secret_set = "mysecret";
    //$gg_string_authorized = $gg_secret_set.trim($_POST['ggid']); // ต่อข้อความสำหรับเข้ารหัส
   // $gg_gen_authorized = md5($gg_string_authorized);
     
    $sql_check="
    SELECT * FROM tb_facebook WHERE EMAIL = '".$_POST['ggemail']."'  ";
    $result = $mysqli->query($sql_check);
    if($result && $result->num_rows>0){  // มีสมาชิกที่ล็อกอินด้วย google id นี้ในระบบแล้ว
        // ดึงข้อมูลมาแสดง และสร้าง session
        $row = $result->fetch_array();
        $_SESSION['ses_user_id']=$row['FACEBOOK_ID'];
        $_SESSION['name']=$row["s_firstname"]." ".$row["s_lastname"];       
        $_SESSION['ses_user_last_login']=date("Y-m-d H:i:s");
		$_SESSION['strEmail'] = $row['EMAIL'];
		$_SESSION["group_hw"] = "student";
        // อัพเดทเวลาล็อกอินล่าสุด
        $sql_update="
        UPDATE tb_facebook SET 
        last_login=NOW()
        WHERE EMAIL ='".$row['EMAIL']."'
        ";
        $mysqli->query($sql_update);
    }else{   // ไม่พบสมาชิกที่ใช้ google id นี้ล็อกอิน
        // สร้างผู้ใช้ใหม่
        //  สมมติให้ชื่อผู้ใช้ใหม่เป็น gg_ไอดี รหัสผ่านเป็น แรนดอม 
       /* $sql_insert="
        INSERT INTO tb_facebook SET
        FACEBOOK_ID='".$_POST['ggid']."',
        EMAIL='".$_POST['ggemail']."',
        LINK='".$gg_gen_authorized."',
        last_login=NOW()
        ";  
        $result = $mysqli->query($sql_insert);
        if($result && $mysqli->affected_rows>0){
            $insert_userID = $mysqli->insert_id;
            $sql="
            SELECT * FROM tb_facebook WHERE EMAIL='".$_POST['ggemail']."'
            
            ";
            $result = $mysqli->query($sql);
            if($result && $result->num_rows>0){  // มีสมาชิกที่ล็อกอินด้วย google id นี้ในระบบแล้ว
                // ดึงข้อมูลมาแสดง และสร้าง session
                $row = $result->fetch_array();
                $_SESSION['ses_user_id']=$row['FACEBOOK_ID'];
				$_SESSION['name']=$row["s_firstname"]." ".$row["s_lastname"];       
				$_SESSION['ses_user_last_login']=date("Y-m-d H:i:s");
				$_SESSION['strEmail'] = $row['EMAIL'];
                $_SESSION["group_hw"] = "student";      
                // อัพเดทเวลาล็อกอินล่าสุด
                $sql_update="
                UPDATE tb_facebook SET 
                last_login=NOW()
                WHERE EMAIL='".$row['EMAIL']."'
                ";
                $mysqli->query($sql_update);                         
            }
        }*/
		header('index.php?m=register');
		exit();
         
    }
echo "<pre>";
echo $gg_gen_authorized;
print_r($_POST);
echo "</pre>";
}