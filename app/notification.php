<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "../DB_connection.php";
    include "Mode1/Notification.php";
    $notifications = get_all_my_notifications($conn, $_SESSION['id']);

    if ($notifications == 0) { ?>
        <li>
            <a href="#">
                You have zero notification.
            </a>
        </li>
    <?php } else {
        foreach ($notifications as $notification) {
            ?>
                <li>
                    <a href="app/notifications-read.php?notification_id=<?= $notification['id'] ?>">

                        <?php if ($notification['is_read'] == 0) {
                            // Correct usage of echo with concatenation
                            echo "<mark>" . $notification['type'] . "</mark>: ";
                            echo $notification['message'];
                            echo "&nbsp;&nbsp;<small>" . $notification['date'] . "</small>";
                        }
                        ?>
                    </a>
                </li>
            <?php 
        }
    }
} else {
    echo "0";
}
?>
