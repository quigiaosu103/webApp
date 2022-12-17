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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">
  <script src="./handleLogic/index.js"></script>
  <script src="./handleLogic/scrollAction.js"></script>

</head>
<body style = "overflow-x:hidden;">
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
                  $_SESSION['currPage'] = 'index.php';
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
      <a href='admin/logout.php?currPage=index.php' class="logout">
        <svg svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
        Đăng xuất
      </a>
        </span>
        

        <a 
          class="navbar-brand" href="<?php
            if(isset($_SESSION['userName']))
              echo './user.php';
            else{ 
              $_SESSION['currPage'] = 'index.php';
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
      <div class="most-favodite-apps col-12 d-flex">
        <!-- ================================================================ -->
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

      

        <div class="favorite-apps__list-apps">
          <p style = "font-weight: bold;">Ứng dụng được đánh giá tốt:</p>

          <div class="list-vote-apps__containt">
          <a href="#" class="favorite-apps__list-app">
            <div class="favorite-apps__list-app__image" style="background-image: url('./appContainer/images/gms/tft.jpg');"></div>
            <div class="favorite-apps__list-app__info">
              <span class="favorite-apps__list-apps__info__name">League of legends</span> <br>
              <span class="favorite-apps__list-apps__info__user-name">Riot</span>
            </div>
          </a>
          <a href="#" class="favorite-apps__list-app">
            <div class="favorite-apps__list-app__image" style="background-image: url('./appContainer/images/gms/tft.jpg');"></div>
            <div class="favorite-apps__list-app__info">
              <span class="favorite-apps__list-apps__info__name">League of legends</span> <br>
              <span class="favorite-apps__list-apps__info__user-name">Riot</span>
            </div>
          </a>
          <a href="#" class="favorite-apps__list-app">
            <div class="favorite-apps__list-app__image" style="background-image: url('./appContainer/images/gms/tft.jpg');"></div>
            <div class="favorite-apps__list-app__info">
              <span class="favorite-apps__list-apps__info__name">League of legends</span> <br>
              <span class="favorite-apps__list-apps__info__user-name">Riot</span>
            </div>
          </a>
          <a href="#" class="favorite-apps__list-app">
            <div class="favorite-apps__list-app__image" style="background-image: url('./appContainer/images/gms/tft.jpg');"></div>
            <div class="favorite-apps__list-app__info">
              <span class="favorite-apps__list-apps__info__name">League of legends</span> <br>
              <span class="favorite-apps__list-apps__info__user-name">Riot</span>
            </div>
          </a>
          
          </div>
        </div>
        
        
        
        
        
        
        <!-- ================================================================ -->
      </div>
      




      <div class="common-apps">
          <h4 class="common-apps__title">Ứng dụng tải nhiều</h4>
          <div class="row common-apps__apps-bar"> </div>
      </div>

      <div class="app-type p-2">
        <div class="app-type__games">
            <h4 class="app-type--title">
                Trò chơi
            </h4>
            <div id = "moreApps" class = "holder">
              <div id = "btnHolder">
                <button id = "moreBtn"> More </button>
                <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
                <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
              </div>
              <div id = "app-type__games-containt" class="appB appBasket">
                
              </div>
            </div>
        </div>

        <div class="app-type__serviceapps">
              <h4 class="app-type--title">
                  Ứng dụng dịch vụ
              </h4>
              <div id = "moreApps" class = "holder">
                <div id = "btnHolder">
                  <button id = "moreBtn"> More </button>
                  <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
                  <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
                </div>
                <div id = "app-type__serviceapps-containt" class="appB appBasket">
                 
                </div>
              </div>

        </div>
        

        <div class="app-type__shoppingapps">
              <h4 class="app-type--title">
                  Ứng dụng mua sắm
              </h4>
              <div id = "moreApps" class = "holder">
                <div id = "btnHolder">
                  <button id = "moreBtn"> More </button>
                  <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
                  <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
                </div>
              <div id = "app-type__shoppingapps-containt" class = "appB appBasket">
                
              </div>
            </div>
          </div>

          <div class="app-type__socialnwapps">
              <h4 class="app-type--title">
                  Mạng xã hội
              </h4>
              <div id = "moreApps" class = "holder">
                <div id = "btnHolder">
                    <button id = "moreBtn"> More </button>
                    <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
                    <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
                </div>
                <div id = "app-type__socialnwapps-containt" class = "appB appBasket">
                  
                </div>
            </div>
          </div>


          <div class="app-type__bookApps">
              <h4 class="app-type--title">
                  Sách
              </h4>
              <div id = "moreApps" class = "holder">
                <div id = "btnHolder">
                  <button id = "moreBtn"> More </button>
                  <button onclick ="scrollDiv(this,'right')" class = "fas rightarrow arrow" style = "margin-right: 20px;">&#xf105;</button>
                  <button onclick ="scrollDiv(this,'left')" class = "fas leftarrow arrow" >&#xf104;</button>
                </div>
              <div id = "app-type__bookapps-containt" class = "appB appBasket">
                
              </div>
            </div>
          </div>
        
      </div>
        
      </div>
    </div>
  </div>
  <div class="footer">
        <span>Laptrinhwebungdung@tdtu</span>
    </div>

  
  <script defer src="/handleLogic/index.js"></script>
  <script defer src="/handleLogic/search.js"></script>
      
</body>
</html>