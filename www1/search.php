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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php
                    if(!isset($_SESSION['userName'])){
                       $_SESSION['currPage'] = 'index.php';
                        echo 'loginForm.php'; 
                    }else {
                    echo 'admin/logout.php?currPage=index.php';
                  }
                
                ?>"><?php
                  if(!isset($_SESSION['userName']))
                    echo 'Login';
                  else {
                    echo $_SESSION['userName'];
                  }
                ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./appManagerment.php">Admin</a>
              </li>
              <li class="search">
                <input type="text" id="find">
              </li>
            </ul>
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

      <script>
          const data = <?php
            echo $_SESSION['searchData']?? ''
          ?>
      </script>
      <script defer src="/handleLogic/search.js"></script>
      
</body>
</html>