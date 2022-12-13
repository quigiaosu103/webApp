<?php
    session_start();
    require_once('../admin/connection.php');
    $id = $_POST['id']?? '';
    $userName = $_SESSION['userName']??'';
    $sql = "insert into favorite (`userName`, `appId`) values (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $userName, $id);
    $stmt->execute();
    echo json_encode(array('status'=>true));
    $stmt->close();
     
?>