<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<link rel="stylesheet" href="edit.css">
<body>
    <h1>Edit Data</h1>
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

    // รับค่า ID ที่ต้องการแก้ไข
    $id = $_GET['id'];

    // สร้าง SQL query เพื่อดึงข้อมูล
    $sql = "SELECT * FROM register WHERE your_id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
        <form action="update.php" method="post">
            <label for="your_id">Your ID:</label>
            <input type="text" name="your_id" value="<?php echo $row['your_id']; ?>" readonly>

            <label for="password">Password:</label>
            <input type="text" name="password" value="<?php echo $row['password']; ?>">

            <input type="submit" value="Save Changes">
        </form>
    <?php
    } else {
        echo "No data found";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>
</body>
</html>
