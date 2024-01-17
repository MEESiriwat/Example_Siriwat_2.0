<!-- update.php -->
<?php
// เชื่อมต่อฐานข้อมูล (ให้ตรงกับที่คุณใช้)
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "example_siriwat";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าที่ถูกส่งมาจากฟอร์ม
$your_id = $_POST['your_id'];
$password = $_POST['password'];

// สร้าง SQL query เพื่ออัปเดตข้อมูล
$sql = "UPDATE register SET password='$password' WHERE your_id='$your_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();

// ส่วนนี้ทำให้หน้าจอรีเฟรชและนำไปที่หน้า contact_information.php หลังจากลบข้อมูลเสร็จสมบูรณ์
echo "<script>window.location.href = 'contact_information.php';</script>";
?>
?>

