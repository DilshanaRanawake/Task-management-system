<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Mode1/Notification.php";
    // include "app/Mode1/User.php";
    $notifications = get_all_my_notifications($conn, $_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title">All Notifications</h4>

            <?php if (isset($_GET['success'])) { ?>
                <div class="success" role="alert">
                    <?php echo stripslashes($_GET['success']); ?>
                </div>
            <?php } ?>

            <?php if (is_array($notifications) && count($notifications) > 0) { ?>
                <table class="main-table  table-style-notification">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Type</th>
                        <th>Date</th>
                    </tr>
                    <?php $i = 0; foreach ($notifications as $notification) { ?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= htmlspecialchars($notification['message']) ?></td>
                            <td><?= htmlspecialchars($notification['type']) ?></td>
                            <td><?= htmlspecialchars($notification['date']) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <h3>You have zero notifications.</h3>
            <?php } ?>
        </section>
    </div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(5)");
        if (active) {
            active.classList.add("active");
        }
    </script>
    

</body>
</html>

<?php 
} else {
    $em = "First login";
    header("Location: login.php?error=" . urlencode($em));
    exit();
}
?>
