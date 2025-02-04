<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
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
            <h4 class="title">Edit Tasks <a href="tasks.php">Tasks</a></h4>
            <form class="form-1" method="POST" action="app/update-task.php">
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
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" class="input-1" placeholder="Title"><br>
                </div>
                <div class="input-holder">
                    <label for="description">Description</label>
                    <textarea name="description" rows="5" class="input-1" placeholder="Description"><?= htmlspecialchars($task['description']) ?></textarea><br>
                </div>
                <div class="input-holder">
                    <label for="assigned_to">Assigned to</label>
                    <select name="assigned_to" class="input-1">
                        <option value="0">Select employee</option>
                        <?php if ($users != 0) {
                            foreach ($users as $user) { ?>
                                <option value="<?= htmlspecialchars($user['id']) ?>" <?= ($task['assigned_to'] == $user['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($user['full_name']) ?>
                                </option>
                        <?php } } ?>
                    </select><br>
                </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
                <button class="edit-btn">Update</button>
            </form>
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
