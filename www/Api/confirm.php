<?php
 	require_once ('../admin/connection.php');
    $id = $_POST['appId'] ?? '';
    $action = $_POST['action']??'confirm';
    $sql='';
    if($action == 'confirm') {
        $sql = "update apps set isConfirmed = 1 where id = ?";
    }else{
        $sql = "update apps set isConfirmed = 0 where id = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    echo json_encode(array('status' => true, 'data'=>'add successfully'));
    $stmt->close();
?>