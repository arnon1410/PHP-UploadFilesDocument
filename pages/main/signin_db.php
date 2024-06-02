<?php

session_start();
require_once '../../config/db.php';
if (isset($_POST['username']) && isset($_POST['password'])) {    
    $username = $_POST['username'];
    $password = $_POST['password'];
    fnCheckValueBeforeLogin($username, $password, $conn); // เพิ่ม $conn เข้าไปในการเรียกฟังก์ชัน
} else {
    echo json_encode(['status' => 'error', 'message' => 'เกิดข้อผิดพลาดลองใหม่อีกครั้ง']);
}

function fnCheckValueBeforeLogin($username, $password, $conn) { // เพิ่ม $conn เป็นพารามิเตอร์
    $error = '';

    try {
        $check_data = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $check_data->bindParam(":username", $username);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);
        $test=  $check_data;
        if ($check_data->rowCount() > 0) {
            if ($username == $row['username']) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_login'] = $row['id'];
                    $_SESSION['user_role'] = $row['urole'];
                    echo json_encode(['status' => 'success', 'message' => 'เข้าสู่ระบบสำเร็จ', 'urole' => $row['urole']]);
                    exit;
                } else {
                    $error = 'wrongPassword';
                }
            } else {
                $error = 'wrongUsername';
            }
        } else {
            $error = 'undefined';
        }
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: ' . $e->getMessage()]);
        exit;
    }

    // แก้ไขการคืนค่า JSON ในกรณีที่เกิดข้อผิดพลาด
    if ($error == 'undefined') {
        echo json_encode(['status' => 'error', 'message' => $test]);
    } elseif ($error == 'wrongUsername') {
        echo json_encode(['status' => 'error', 'message' => 'username ไม่ถูกต้อง']);
    } elseif ($error == 'wrongPassword') {
        echo json_encode(['status' => 'error', 'message' => 'password ไม่ถูกต้อง']);
    }
}
?>
