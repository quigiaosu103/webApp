<?php

 	require_once ('../admin/connection.php');

	$sql = "select count(id) as totalApps, sum(download) as totalDownload from apps";
	$sql2 = "select count(userName) as totalUsers from users";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	$data = array();
    echo json_encode(array('status'=> true, 'apps'=>$result->fetch_assoc(), 'users'=> $result2->fetch_assoc()));

?>
