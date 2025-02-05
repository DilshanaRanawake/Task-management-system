<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role']=="employee") {
    include "DB_connection.php";
    include "app/Mode1/Task.php";
    include "app/Mode1/User.php";

    if (!isset($_GET['id'])) {
        header("Location: tasks.php");
        exit();
    }

    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);

    if ($task == 0) {
        header("Location: tasks.php");
        exit();
    }

    $users = get_all_users($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title">Edit Tasks <a href="my_task.php">Tasks</a></h4>
            <form class="form-1" method="POST" action="app/update-task-employee.php">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="danger" role="alert">
                        <?= htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="success" role="alert">
                        <?= htmlspecialchars($_GET['success']); ?>
                    </div>
                <?php } ?>
                <div class="input-holder">
                    <p><b>Title: </b><?= htmlspecialchars($task['title']) ?></p>
                </div>
                <div class="input-holder">
                    <p><b>Description: </b><?= htmlspecialchars($task['description']) ?></p>
                </div><br>
                <div class="input-holder">
                    <label for="status">Status</label>
                    <select name="status" class="input-1">
                        <option value="pending" <?php if($task['status'] == "pending") echo "selected"; ?>>Pending</option>
                        <option value="in_progress" <?php if($task['status'] == "in_progress") echo "selected"; ?>>In Progress</option>
                        <option value="completed" <?php if($task['status'] == "completed") echo "selected"; ?>>Completed</option>
                    </select>
                    </select><br>
                </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
                <button class="edit-btn">Update</button>
            </form>
        </section>
    </div>
    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(2)");
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
