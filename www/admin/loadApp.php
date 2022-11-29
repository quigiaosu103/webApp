<?php
    session_start();
    require_once ('connection.php');
    $id = $_GET['id']??'';
    if($id !='') {
        $sql = 'select *from apps where id ='.$id;
        $app = $conn->query($sql);
        $app= $app->fetch_assoc();

        $sql = 'select *from comments where appId = '.$id;
        $comments = $conn->query($sql);
        $arr= array();
        while($mt = $comments->fetch_assoc()) {
            $arr[] = $mt;
        }
        $_SESSION['pageData'] = json_encode(array('comment'=>$arr, 'app'=> $app));
        header('Location: ../App.php');
    }

?>