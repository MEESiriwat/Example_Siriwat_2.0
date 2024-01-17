<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Table</title>
</head>
<link rel="stylesheet" href="contact_information.css">

<script>
        function deleteRecord(id) {
            if (confirm("คุณต้องการลบรายการนี้ใช่หรือไม่?")) {
                // ให้ลิงก์ไปที่ delete.php และส่งค่า id ไปด้วย
                window.location.href = 'delete.php?id=' + id;

                // หรือถ้าคุณใช้ AJAX
                // fetch('delete.php?id=' + id, { method: 'POST' })
                //     .then(response => response.json())
                //     .then(data => {
                //         alert(data.message);
                //         location.reload();
                //     })
                //     .catch(error => console.error('Error:', error));
            }
        }
    </script>
<body>
    <div class="container">
        <h1>ข้อมูลรายชื่อที่ลงทะเบียน</h1>
        <table>
            <thead>
                <tr>
                    <th width="25%">Your ID</th>
                    <th width="25%">Password</th>
                    <th width="5%">แก้ไข</th>
                    <th width="5%">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ทำการเชื่อมต่อกับฐานข้อมูล
                $servername = "127.0.0.1:3306";
                $username = "root";
                $password = "";
                $dbname = "example_siriwat";

                $conn = new mysqli("127.0.0.1:3306", "root", "", "example_siriwat");

                // ตรวจสอบการเชื่อมต่อ
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // ทำการสร้าง SQL query เพื่อดึงข้อมูล
                $sql = "SELECT your_id, password FROM register";
                $result = $conn->query($sql);

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if ($result->num_rows > 0) {
                    // วนลูปแสดงข้อมูลในตาราง
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['your_id']) . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row['your_id'] . "' class='edit'>แก้ไข</a></td>";
                        echo "<td><a href='javascript:void(0);' onclick='deleteRecord(\"" . $row['your_id'] . "\")' class='delete'>ลบ</a></td>";
                        echo "</tr>";
                    }                
                } else {
                    echo "<tr><td colspan='4'>ไม่พบข้อมูล</td></tr>";
                }

                // ปิดการเชื่อมต่อฐานข้อมูล
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
