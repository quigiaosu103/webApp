<?php

	#  https://www.w3schools.com/php/php_mysql_select.asp
 	require_once ('../admin/connection.php');
     $appId = $_POST['appId'];
	$sql = "SELECT * from images where appId = '$appId' ";
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
