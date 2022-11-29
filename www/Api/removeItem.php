<?php
    session_start();
    require_once('../admin/connection.php');
    $type = $_POST['type'];
    if($type == 'cmt') {
        $userName = $_POST['userName'];
        $id = $_POST['id'];
        $sql = "delete from comments where userName = ? and appId= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $userName, $id);
        $stmt->execute();
        echo json_encode(array('status'=>true));
        
    }
    
    $stmt->close();
     
?>