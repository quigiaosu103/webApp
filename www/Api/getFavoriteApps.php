<?php
    require_once('../admin/connection.php');
    $userName = $_POST['userName']?? '';
    $sql = "select * from apps where id in (select appId from favorite where userName= ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $data= array();
    while($r = $stmt->fetch_assoc()){
        $data[] = $r;
    }
    echo json_encode(array('status'=>true, 'data'=> $data));
    $stmt->close();
?>