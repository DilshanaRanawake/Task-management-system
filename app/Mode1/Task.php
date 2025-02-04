<?php
function insert_task($conn, $data){
    $sql = "INSERT INTO tasks (title, description, assigned_to) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

}

function get_all_tasks($conn){
    $sql = "SELECT * FROM tasks";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if($stmt->rowCount()>0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;
    return $tasks;
}