<?php
 	require_once ('../admin/connection.php');
	$role = $_POST['role'] ?? 'admin';
	$type = $_POST['type'] ?? 'gms';
	$userName = $_POST['userName'] ?? '';
	$sql = "SELECT * from apps";
	if ($type != '')
		$sql = "select * from apps where TYPE = '" . $type . "'"; ;
	if($role == 'user')
		$sql = "SELECT * from apps where isConfirmed = 1";
	if ($userName != '')
		$sql = "select * from apps where userName = '" . $userName . "'";
	$result = $conn->query($sql);
	$data = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$data[] = $row;
		}
		echo json_encode(array('status'=> true, 'data'=>$data));
	}
	else {
		echo "Khong có dữ liệu".$userName;
	}
	

?>
