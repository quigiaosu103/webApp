<?php
    session_start();
    require_once('../admin/connection.php');
    
    $mess = $_POST['content']?? '';
    $id = $_POST['id']?? '';
    $userName = $_SESSION['userName']??'';
    $vote = $_SESSION['vote']??'';
 
    $sql = "insert into comments (`userName`, `appId`, `content`, `vote`) values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userName, $id, $mess);
    $stmt->execute();
    echo json_encode(array('status'=>true));
    $stmt->close();
     
?>;

