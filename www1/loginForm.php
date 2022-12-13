<?php
    session_start();
    // s
    $mess = $_GET['message']??'';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/appPage.css">
    <title>APp</title>
    
</head>
<body>
  
    <div style="display:flex; justify-content: center; align-items: center;min-height: 100vh;">
    <form action="admin/login.php" method="post" style="width: 50%;">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name = "password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <span style="color: red;display: block;"><?php
          if($mess!='')
            echo 'Sai tên đăng nhập hoặc mật khẩu';
        ?></span>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
</body>
</html>