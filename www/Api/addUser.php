<?php
    session_start();
    require_once('../admin/connection.php');
    $userName = $_POST['userName']?? '';
    $fullName = $_POST['fullName']?? '';
    $image = $_POST['image']?? './images/defaultAvatar.png';
    $email = $_POST['email'] ?? '';
    $pw = $_POST['pw']?? '';
    $sql = "insert into users (`userName`, `userPass`, `userImage`, `fullName`, `email`) values (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $userName, $pw, $image, $fullName, $email);
    $stmt->execute();
    echo json_encode(array('status'=>true));
    $stmt->close();
     
?>