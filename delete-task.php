<?php
session_start();
if (isset($_SESSION['role'])&& isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Mode1/Task.php";

    if(!isset($_GET['id'])){
        header("Location: tasks.php");
        exit();
    }
    $id = $_GET['id'];
    $user = get_task_by_id($conn, $id);
    

    if($user==0){
        header("Location: tasks.php");
        exit();
    }

    $data = array($id, "Employee");
    delete_user($conn, $data);
    $sm = "Deleted successfully";
    header("Location: tasks.php?success=$sm");
    exit();
}else{
        $em = "First login";
        header("Location: login.php?error=$em");
        exit();
}
?>

