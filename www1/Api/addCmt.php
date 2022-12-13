<?php
    session_start();
    require_once('../admin/connection.php');
    
    $mess = $_POST['content']?? '';
    $id = $_POST['id']?? '';
    $userName = $_SESSION['userName']??'';
 
    $sql = "insert into comments (`userName`, `appId`, `content`) values (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userName, $id, $mess);
    $stmt->execute();
    echo json_encode(array('status'=>true));
    $stmt->close();
     
?>