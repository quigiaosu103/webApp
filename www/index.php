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
                <a class="nav-link" href="./appManagerment.php">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="container justify-content-center d-flex mt-3">
          <div class="body col-11">
            <div class="common-apps">
                <h4 class="common-apps__title">Ứng dụng tải nhiều</h4>
                <div class="row common-apps__apps-bar">

                    
                    
                    
                </div>
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
      
      <script>
          $.get('http://localhost:8080/API/getApps.php', (data, status)=> {
                let gms = ''
                let mxh = ''
                let dv = ''
                let ms = ''
                data.data.map((app)=> {
                    if(app.TYPE == 'gms'){
                        gms += `<div class="app-type__game--containt app-containt col-4">
                              <div class="game-containt__img img-color"></div>
                              <div class="infor">
                                <div class="main-img" "></div>
                                <div class="infor-text">
                                    <h5 class="game-containt__name">${app.appName}</h5>
                                    <span class="game-containt__username">${app.userName}</span>    
                                </div>    
                            </div>
                          </div>`
                    }
                    if(app.TYPE == 'ms') {
                        ms += `<div class="shoppingapp--containt app-containt col-4">
                                <div class="shoppingapp-containt__img img-color"  ></div>
                                <div class="infor">
                                    <div class="main-img" "></div>
                                    <div class="infor-text">
                                        <h5 class="shoppingapp-containt__name">${app.appName}</h5>
                                        <span class="shoppingapp-containt__username">${app.userName}</span>    
                                    </div>    
                                </div>
                            </div>`
                    }

                    if(app.TYPE == 'dv'){
                        dv+= `<div class="app-type__serviceapp--containt app-containt col-4">
                            <div class="serviceapp-containt__img img-color"></div>
                            <div class="infor">
                                <div class="main-img" "></div>
                                <div class="infor-text">
                                    <h5 class="serviceapp-containt__name">${app.appName}</h5>
                                    <span class="serviceapp-containt__username">${app.userName}</span>    
                                </div>    
                            </div>
                        </div>`
                    }

                    if(app.TYPE == 'mxh') {
                        mxh += `<div class="socialnwapp--containt app-containt col-4">
                                <div class="socialnwapp-containt__img img-color" ></div>
                                <div class="infor">
                                    <div class="main-img" "></div>
                                    <div class="infor-text">
                                        <h5 class="socialnwapp-containt__name">${app.appName}</h5>
                                            <span class="socialnwapp-containt__username">${app.userName}</span>    
                                    </div>    
                                </div>
                            </div>`
                    }


                })

                $('.app-type__games-containt').append(gms)
                $('.app-type__serviceapps-containt').append(dv)
                $('.app-type__shoppingapps-containt').append(ms)
                $('.app-type__socialnwapps-containt').append(mxh)
          }, 'json')

            let limitItems = 9
            selectApps(limitItems)
            function selectApps(num) {
              $.post('http://localhost:8080/API/selectApps.php', {
                limitItems: num
                }, (data, status)=> {
                    let id =0
                    const apps = data.data.map((app)=>{
                        id++;
                        return `${id%3==1? '<div class="common-apps col-4">':''}
                        <a class="common-app" href="App.php?id=${app.id}">
                            <span class="common-app_top">${id}</span>
                            <div class="common-app_image"></div>
                            <div class="common-app_infor">
                                <span class="common-app_infor--name">${app.appName}</span>
                                <span class="common-app_infor--type">${app.TYPE}</span>
                                <span class="common-app_infor--download">${app.download}</span>
                            </div>
                        </a>   
                        ${id%3==0? '</div>':''} 
                    `})
                    console.log(apps.join(''))
                    document.querySelector('.common-apps__apps-bar').innerHTML = apps.join('')
                }, 'json')
            }
      </script>
      
</body>
</html>