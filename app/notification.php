<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    // include "DB_connection.php";
    // include "app/Mode1/Notification.php";
    // include "app/Mode1/User.php";
    // $notifications = get_all_my_notifications($conn, $_SESSION['id']);
?>
    <li>
        <a href="">
            <mark>New Task Assigned</mark>
            Notification 1 example
            &nbsp;&nbsp;<small>Feb 7, 2025</small>
        </a>
    </li>
<?php 
}else{
    echo "0";
}
?>