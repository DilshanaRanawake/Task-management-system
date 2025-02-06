<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role']=="employee") {
    include "DB_connection.php";
    include "app/Mode1/User.php";
    $user = get_user_by_id($conn, $_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title">Edit Profile <a href="profile.php">Profile</a></h4>
            <form class = "form-1"
                method="POST"
                action="app/update-profile.php">
                <?php if(isset($_GET['error'])){?>
            <div class="danger" role="alert">
                <?php echo stripslashes($_GET['error']);?>
            </div>
            <?php } ?>
                <?php if(isset($_GET['success'])){?>
                    <div class="success" role="alert">
                        <?php echo stripslashes($_GET['success']);?>
                    </div>
            <?php } 
            ?>
                <div class = "input-holder">
                    <label for="">Full Name</label>
                    <input type="text" name="full_name" value = "<?=$user['full_name']?>" class="input-1" placeholder="Full Name"><br>
                </div>
                <div class = "input-holder">
                    <label for="">Old Password</label>
                    <input type="text" name="password" value = "********" class="input-1" placeholder="Old Password"><br>
                </div>
                <div class = "input-holder">
                    <label for="">New Password</label>
                    <input type="text" name="new_password" class="input-1" placeholder="New Password"><br>
                </div>
                
                <div class = "input-holder">
                    <label for="">Confirm Password</label>
                    <input type="text" name="confirm_password" class="input-1" placeholder="Confirm Password"><br>
                </div>
                <button class="edit-btn">Change</button>
            </form>
        </section>
    </div>
    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(3)");
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
