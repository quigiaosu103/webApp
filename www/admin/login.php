<?php
    session_start();
    require_once('connection.php');
    $username = $_POST['username']??'';
    $pasword = $_POST['password']?? '';
    if($username!='' && $pasword !='') {
        $sql = 'select count(*) from users where userName = ? and userPass = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $pasword);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $count = $stmt->fetch_assoc();
        if($count["count(*)"]==1) {
            $_SESSION['userName'] = $username;
            header("Location: ../".$_SESSION['currPage']);
        }else{
            header("Location: ../loginForm.php?message=".$username);
        }
    }
    // echo json_encode(array('username'=>$username, 'pw'=>$pasword));
    
?>