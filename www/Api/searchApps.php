<?php
    session_start();
    require_once('../admin/connection.php');
    $data = $_GET['data'].'%' ?? 'a%';
    $sql = "select * from apps where appName LIKE ? or type LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $data, $data);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $data= array();
    while($r = $stmt->fetch_assoc()){
        $data[] = $r;
    }
    $_SESSION['searchData'] = json_encode(array('status'=>true, 'data'=> $data));
    header('Location: ../search.php');
    $stmt->close();
?>