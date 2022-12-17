<?php
    session_start();
    require_once ('admin/connection.php');
    $id2 = $_SESSION['id']??'';
    $id = $_GET['id']?? $id2;
    $userName = $_SESSION['userName'] ?? 'zasdnjakens1231ascax';
    if($id !='') {
        $_SESSION['id']=$id;
        $sql = 'select *from apps where id ='.$id;
        $app = $conn->query($sql);
        $app= $app->fetch_assoc();

        $sql = 'select *from comments where appId = '.$id;
        $comments = $conn->query($sql);
        $arr= array();
        while($mt = $comments->fetch_assoc()) {
            $arr[] = $mt;
        }
        $sql = 'select count(*) as count from favorite where appId = ? and userName = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $userName);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $count = $stmt->fetch_assoc();
        $_SESSION['pageData'] = json_encode(array('comment'=>$arr, 'app'=> $app, 'count'=>$count));
      }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./style/app.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Apps</title>

</head>
<body style="overflow-x: hidden;">

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
              if(!isset($_SESSION['userName'])){
                  $_SESSION['currPage'] = 'app.php';
                  echo 'loginForm.php'; 
              }
            ?>"
          >
            <?php
              if(!isset($_SESSION['userName']))
              echo 'Đăng nhập';
              else 
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>'.$_SESSION['userName'];
            ?>


      </a>
      <a href='admin/logout.php?currPage=app.php' class="logout">
        <svg svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
        Đăng xuất
      </a>
        </span>
        

        <a 
          class="navbar-brand" href="<?php
            if(isset($_SESSION['userName']))
              echo './user.php';
            else{ 
              $_SESSION['currPage'] = 'app.php';
              echo 'loginForm.php'; 
            }
          ?>" 
          style = "margin-left:1%">
            <img src="images/defaultAvatar.png" id = "userImg" alt="User" style="width:40px;" class="rounded-pill"> 
        </a>
    </div>
    </div>
  </nav>

    <div id = "topBar" class = "holder">
        <div class="app-image">
            <img id = "icon" src="" alt="app name">
        </div>
        <div id = "appName" class="app-infor__name">
            
        </div>

        <div id = "creatorName">
            <a href = "javascript:void()" class="app-user">
            
            </a>
        </div>

        <div id = "dlsBox">
            <div id = "appDownload">
                1.000.00+
            </div>
            <i class="material-icons" style = "color:black;font-size:20px;">file_download</i>
            <div id = "appSize">
                200MB 
            </div>
            <i class="material-icons" style = "color:black;font-size:20px;">&#xe2c7;</i>
            
        </div>
        <div id = "marks" class="span">
            <span class = "far like" id = "wishlist" onclick="change(1)" >&#xf004;</span>
        </div>
        <a id = "download" class="downloadBtn" download>
            Download
        </a>
        <div id = "rateBox">
            <?php
                $starNum = 2;
                $totalStar = 5;
                for ($i = 1; $i <= $starNum;$i++){
                    echo "<i class = 'fas rate'> &#xf005; </i>";
                    $totalStar = $totalStar- 1;
                }
                for ($i = 1; $i <= $totalStar;$i++){
                    echo "<i class = 'far rate'> &#xf005; </i>";
                }
            ?>
        </div>
    </div>

    <div id = "mainInfo" class = "holder">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div style="background-image: url('./images/tft.jpg');" class="carousel-item active">
                </div>
                <div style="background-image: url('./images/pubg.jpg');" class="carousel-item">
                </div>
                <div style="background-image: url('./images/fo4.jpg');" class="carousel-item">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <div id = "appInfo">
            <div id = "buttonTab">
                <button id = "btn1" class = "subButtonTab" onclick="infoBtnClick(this)">About</button>
                <button id = "btn2" class = "subButtonTab" onclick="infoBtnClick(this)">Updates</button>
                <button id = "btn3" class = "subButtonTab" onclick="infoBtnClick(this)">Extras</button>
            </div>
            <div id = "info">
                <div id = "aboutApp" class = "subInfoTab";>
                    <p class = "text about-text" ></p>
                </div>
                <div id = "updates" class = "subInfoTab";>
                    <p class = "text update-text"></p>
                </div>
                <div id = "moreInfo" class = "subInfoTab";></p>
                </div>
            </div>
        </div>
    </div>
    
    <div id = "moreApps" class = "holder">
        
        <div id = "btnHolder">
            <button id = "moreBtn"> More </button>
            <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
            <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
        </div>
        <div id = "appBasket">
                
        </div>
    </div>

    <div id = "commentSection" class = "holder">
        <div id = "ratingContainer">
            <div id = "userRateBox">
                <p id = "text">Your Rating:</p>
                <?php
                    for($i = 1; $i <= 5;$i ++){
                        echo "<a href = 'javascript:void(0)' class = 'far rate' id = '".$i."' onmouseover='changeStarCl(this,1)' onmouseout='changeStarCl(this,2)' onclick='changeStarCl(this,3)'> &#xf005; </a>";
                    }
                ?>
            </div>
        </div>

        <div style = "margin: 40px 0 20px 20px;font-weight:bold;">Comment:</div>
        
        <div class = "userCommentHolder">
            <a href = "javascript:void(0)" style="text-decoration:none;">
                <img src="appContainer/images/gms/tft.jpg" alt="User" style="width:40px;margin: 0 0 0 20px;" class="rounded-pill"> 
            </a>
            <input type="text" placeholder="Add comment...">
            <button class="btn btn-primary addNewCmt" onclick = "addCmt(this)">Comment</button>
        </div>

        <div class="myCmt"></div>

        <div class="cmts"> </div>

    </div>

    <script>
      const data = (<?php
        echo $_SESSION['pageData'];
        ?>)
      const userName = '<?php
        echo $_SESSION['userName']??'';
      ?>'
      const id = data.app.id;

    </script>
    <script src="/handleLogic/app.js"></script>
    <script src="/handleLogic/appData.js"></script>
    <div class="footer">
        <span>Laptrinhwebungdung@tdtu</span>
    </div>
</body>
</html>