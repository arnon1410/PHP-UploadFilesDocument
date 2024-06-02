<?php 

    session_start();
    unset($_SESSION['user_login']);
    unset($_SESSION['admin_login']);

    // ทำลายเซสชัน
    session_destroy();

    // เปลี่ยนเส้นทางไปยังหน้าล็อกอินหรือหน้าหลัก
    header('Location: ../../pages/main/signin.php');
    exit;

?>