<?php

 	require_once ('../admin/connection.php');
    $userName = $_POST['userName']?? '';
	$sql = "select users.*, count(id) as total from users left join  apps on apps.userName = users.userName group by (userName)";
	if($userName != '')
		$sql = "SELECT * from users where userName =". $userName;
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
		echo "Khong có dữ liệu";
	}

?>
