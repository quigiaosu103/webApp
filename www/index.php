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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                <a class="nav-link" href="./admin.php">Admin</a>
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
                  <div class="app-type__games-containt apps-box"></div>
              </div>

              <div class="app-type__serviceapps">
                    <h4 class="app-type--title">
                        Ứng dụng dịch vụ
                    </h4>
                    <div class="app-type__serviceapps-containt apps-box"></div>
                </div>


                <div class="app-type__shoppingapps">
                    <h4 class="app-type--title">
                        Ứng dụng mua sắm
                    </h4>
                    <div class="app-type__shoppingapps-containt apps-box"></div>
                </div>

                <div class="app-type__socialnwapps">
                    <h4 class="app-type--title">
                        Mạng xã hội
                    </h4>
                    <div class="app-type__socialnwapps-containt apps-box"></div>
                </div>
              
            </div>
              

          </div>
        </div>
      </div>
      
      <script defer src="/handleLogic/index.js"></script>
      <script defer src="/handleLogic/search.js"></script>
      
</body>
</html>