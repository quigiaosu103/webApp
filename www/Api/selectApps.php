<?php
    require_once('../admin/connection.php');
    $limitItems = $_POST['limitItems']?? 9;
    $sql = 'select *from apps  order by download desc limit ?'; //select theo lượt tải
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $limitItems);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $data= array();
    while($r = $stmt->fetch_assoc()){
        $data[] = $r;
    }
    $sql = 'select *from apps order by vote desc limit 5'; //seklect theo vote
    $stmt = $conn->query($sql);
    $data2 = array();
    while($r = $stmt->fetch_assoc()){
        $data2[] = $r;
    }
    echo json_encode(array('status'=>true, 'data'=> $data, 'data2'=> $data2)); //data chứa apps theo lượt tải, data2 theo vote
    $stmt->close();
?>