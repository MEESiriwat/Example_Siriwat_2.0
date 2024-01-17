<!-- delete.php -->
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

// รับค่า ID ที่ถูกส่งมาจากลิงก์
$id = $_GET['id'];

// ตรวจสอบว่ามีค่า ID ที่ถูกส่งมาหรือไม่
if (isset($id) && !empty($id)) {
    // สร้าง SQL query เพื่อลบข้อมูล
    $sql = "DELETE FROM register WHERE your_id='$id'";

    if ($conn->query($sql) === TRUE) {
        // ลบข้อมูลเรียบร้อย
        echo "Record deleted successfully";
    } else {
        // เกิดข้อผิดพลาดในการลบ
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // ถ้าไม่มี ID ถูกส่งมา
    echo "Invalid ID";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();

// ส่วนนี้ทำให้หน้าจอรีเฟรชและนำไปที่หน้า contact_information.php หลังจากลบข้อมูลเสร็จสมบูรณ์
echo "<script>window.location.href = 'contact_information.php';</script>";
?>