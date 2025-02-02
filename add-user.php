<?php
session_start();
if (isset($_SESSION['role'])&& isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Mode1/User.php";
    $users = get_all_users($conn);
    //print($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php" ?>
    <div class="body">
        <?php include "inc/nav.php" ?>
        <section class="section-1">
            <h4 class="title">Add Users <a href="user.php">Users</a></h4>
            <form class = "form-1">
                <div class = "input-holder">
                    <label for="">Full Name</label>
                    <input type="text" class="input-1" placeholder="Full Name"><br><br>
                </div>
            </form>
        </section>
    </div>
    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(3)");
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

