<?php
session_start();
if (isset($_SESSION['role'])&& isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Mode1/User.php";

    if(!isset($_GET['id'])){
        header("Location: user.php");
        exit();
    }
    $id = $_GET['id'];
    $user = get_user_by_id($conn, $id);
    
    //print_r($username);

    if($user==0){
        header("Location: user.php");
        exit();
    }

    $data = array($id, "Employee");
    delete_user($conn, $data);
    $sm = "Deleted successfully";
    header("Location: user.php?success=$sm");
    exit();
    // echo "delete "
}else{
        $em = "First login";
        header("Location: login.php?error=$em");
        exit();
}
?>

