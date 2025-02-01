<?php
session_start();
if (isset($_SESSION['role'])&& isset($_SESSION['id'])) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php" ?>
    <div class="body">
        <?php include "inc/nav.php" ?>
        <section class="section-1">
            <h4 class="title">Manage Users <a href="add-user.php">Add User</a></h4>
            <table class="main-table">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dilshana</td>
                    <td>dil</td>
                    <td>Employee</td>
                    <td>
                        <a href="" class="edit-btn">Edit</a>
                        <a href="" class="delete-btn">Delete</a>
                    </td>
                </tr>
            </table>
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

