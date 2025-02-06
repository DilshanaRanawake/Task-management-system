<?php
session_start();
if (isset($_SESSION['role'])&& isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Mode1/Task.php";
    include "app/Mode1/User.php";

    $todaydue_tasks = count_tasks_due_today($conn);
    $overdue_tasks = count_tasks_overdue($conn);
    $nodeadline_tasks = count_tasks_no_deadline($conn);
    $all_tasks = count_tasks($conn);
    $num_users = count_users($conn);
    $pending = count_pending_tasks($conn);
    $in_progress = count_tasks_in_progress($conn);
    $completed = count_tasks_completed($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php" ?>
    <div class="body">
        <?php include "inc/nav.php" ?>
        <section class="section-1">
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <div class="dashboard">
                    <div class="dashboard-item">
                        <i class="fa fa-user"></i>
                        <span><?=$num_users?> Employee(s)</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-tasks"></i>
                        <span><?=$all_tasks?> All Tasks</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-window-close-o"></i>
                        <span><?=$overdue_tasks?> Overdue</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-clock-o"></i>
                        <span><?=$nodeadline_tasks?> No Deadline</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-user"></i>
                        <span><?=$todaydue_tasks?> Due Today</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-bell"></i>
                        <span><?=$overdue_tasks?> Notifications</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-square-o"></i>
                        <span><?=$pending?> Pending</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-spinner"></i>
                        <span><?=$in_progress?> In progress</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fa fa-check-square-o"></i>
                        <span><?=$completed?> Completed</span>
                    </div>
                </div>
            <?php }?>
        </section>
    </div>
    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(1)");
        active.classList.add("active");
    </script>
</body>
</html>

<?php }else{
        $em = "First login";
        header("Location: login.php?error=$em");
        exit();
}
?>