<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role']=="admin") {
    include "DB_connection.php";
    include "app/Mode1/Task.php";
    include "app/Mode1/User.php";

    $text = "All Task";
    if (isset($_GET['due_date']) &&  $_GET['due_date'] == "Due Today") {
        $text = "Due Today";
        $tasks = get_all_tasks_due_today($conn);
        $num_tasks = count_tasks_due_today($conn);
    }else{
        $tasks = get_all_tasks($conn);
        $num_tasks = count_tasks($conn);
    }
    $users = get_all_users($conn);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title-2">
                <a href="create_Task.php" class="btn">Create Task</a>
                <a href="tasks.php?due_date=Due Today">Due Today</a>
                <a href="tasks.php?due_date=Due This Week">Due This Week</a>
                <a href="tasks.php?due_date=Overdue">Overdue</a>
                <a href="tasks.php?due_date=No Deadline">No Deadline</a>
                <a href="tasks.php">All Task</a>
            </h4>
            <h4 class="title-2"><?=$text?> (<?=$num_tasks?>) 
            <?php if (isset($_GET['success'])) { ?>
                <div class="success" role="alert">
                    <?php echo stripslashes($_GET['success']); ?>
                </div>
            <?php } ?>

            <?php if (is_array($tasks) && count($tasks) > 0) { ?>
                <table class="main-table">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Assigned to</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 0; foreach ($tasks as $task) { ?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= htmlspecialchars($task['title']) ?></td>
                            <td><?= htmlspecialchars($task['description']) ?></td>
                            <td>
                                <?php 
                                foreach ($users as $user){
                                    if($user['id'] == $task['assigned_to']){
                                        echo $user['full_name'];
                                }}?>
                            </td>
                            <td><?= htmlspecialchars($task['due_date']) ?></td>
                            <td><?= htmlspecialchars($task['status']) ?></td>
                            <td>
                                <a href="edit-task.php?id=<?= $task['id'] ?>" class="edit-btn">Edit</a>
                                <a href="delete-task.php?id=<?= $task['id'] ?>" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <h3>No tasks found</h3>
            <?php } ?>
        </section>
    </div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(4)");
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
