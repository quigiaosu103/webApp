<?php
    require_once('../admin/connection.php');
    $limitItems = $_POST['limitItems']?? 9;
    $sql = 'select *from apps  order by download desc limit ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $limitItems);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $data= array();
    while($r = $stmt->fetch_assoc()){
        $data[] = $r;
    }
    echo json_encode(array('status'=>true, 'data'=> $data));
    $stmt->close();
?>