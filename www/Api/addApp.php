<?php
 	require_once ('../admin/connection.php');
    $name = $_POST['name'] ?? '';
    $linkapp = $_POST['linkapp'] ?? '';
    $linkimg = $_POST['linkimg'] ?? '';
    $des = $_POST['des'] ?? '';
    $user = $_POST['user'] ?? '';
    $type = $_POST['type'] ?? '';
    $desImg = $_POST['desImg'] ?? '';

    $sql = "insert into apps (`appName`, `srcDownload`, `srcImage`, `decsription`, `userName`, `type`, `desImg`) values(?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $linkapp, $linkimg, $des, $user, $type,$desImg);
    $stmt->execute();
    echo json_encode(array('status' => true, 'data'=>'add successfully'));
    $stmt->close();
?>