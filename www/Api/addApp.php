<?php
 	require_once ('../admin/connection.php');
    $name = $_POST['name'] ?? '';
    $linkapp = $_POST['linkapp'] ?? '';
    $linkimg = $_POST['linkimg'] ?? '';
    $des = $_POST['des'] ?? '';
    $user = $_POST['user'] ?? '';
    $type = $_POST['type'] ?? '';

    $sql = "insert into apps (`appName`, `srcDownload`, `srcImage`, `decsription`, `userName`, `type`) values(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $linkapp, $linkimg, $des, $user, $type);
    $stmt->execute();
    echo json_encode(array('status' => true, 'data'=>'add successfully'));
    $stmt->close();
?>