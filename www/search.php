<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAPPS</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<nav class="navbar navbar-expand-sm" style="box-shadow: 0px 1px 2px #ccc">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="images/logo2.png" alt="Logo" style="width:100px;">
    </a>
    <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link header-title" href="index.php"><h3>Box App</h3></a>
        </li>
        </ul>

        <div class="searchBox">
            <span id="searchIcon"><i class="fa fa-search"></i></span>
            <input type="search" id="search" placeholder="Search..." />
        </div>

        <span class="logInOut <?php
              if(isset($_SESSION['userName'])) 
                echo "isLoggedIn";
            ?>">
          <a 
            class="nav-link userNameSelection" 
            href="<?php
              if(!isset($_SESSION['userName'])){ //kiểm tra đăng nhập
                  $_SESSION['currPage'] = 'search.php'; //lưu trang hiện tại để quay lại khi đăng nhập thành công
                  echo 'loginForm.php'; 
              }
            ?>"
          >
            <?php
              if(!isset($_SESSION['userName']))
              echo 'Đăng nhập'; //hiển thị 'đăng nhâp'/user name 
              else 
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>'.$_SESSION['userName'];
            ?>


      </a>
      <a href='admin/logout.php?currPage=search.php' class="logout">
        <svg svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
        Đăng xuất
      </a>
        </span>
        

        <a 
          class="navbar-brand" href="<?php
            if(isset($_SESSION['userName']))//kiểm tra đăng nhập
              if ($_SESSION['userName'] == 'admin')
                echo 'admin.php';
              else
                echo './user.php';
            else{ 
              $_SESSION['currPage'] = 'search.php';
              echo 'loginForm.php'; 
            }
          ?>" 
          style = "margin-left:1%">
            <img src="images/defaultAvatar.png" id = "userImg" alt="User" style="width:40px;" class="rounded-pill"> 
        </a>
    </div>
    </div>
  </nav>
      
  <div class="container justify-content-center d-flex mt-3">
      <div class="body col-11">
        <div class="found-apps">
            
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>Laptrinhwebungdung@tdtu</span>
  </div>

  <script>
      const data = <?php
        echo $_SESSION['searchData']?? '' //lấy data từ session được lưu bởi searchApps.php
      ?>
  </script>
  <script defer src="/handleLogic/search.js"></script>
      
</body>
</html>