<?php
    session_start();
    $link = '../'.($_GET['currPage']?? 'index.php');
    unset($_SESSION['userName']);
    header('Location: '.$link);
?>