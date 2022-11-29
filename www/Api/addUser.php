<?php
    session_start();
    require_once('../admin/connection.php');
    $userName = $_POST['userName']?? '';
    $pw = $_POST['pw']?? '';
    $image = $_POST['image']?? './images/defaultAvatar.png';
    $sql = "insert into users (`userName`, `userPass`, `userImage`) values (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userName, $pw, $image);
    $stmt->execute();
    echo json_encode(array('status'=>true));
    $stmt->close();
     
?>