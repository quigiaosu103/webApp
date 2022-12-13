<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/user.css">
    <link rel="stylesheet" href="/font/fontawesome/css/all.min.css">
    <title>User</title>
</head>
<body>
    <div class="container grid__row">

        <!-- Category -->
        <div id="nav" class="nav col-2">
            <div class="container__image-user">
            </div>

            <!-- Mục login đang là display none -->
            <div class="login-link">
                <a href="#">Login</a>
            </div>

            <ul class="category--list">
                <li class="category--item category-active">
                    <span class="category--text">Apps</span>
                </li>
                <li class="category--item">
                    <span class="category--text">Favorites</span>
                </li>
                <li class="category--item">
                    <span class="category--text">Wish list</span>
                </li>
                <li class="category--item">
                    <span class="category--text">Add apps</span>
                </li>
                <li class="category--item">
                    <span class="category--text">Setting</span>
                </li>
                <div class="category--item category--item--logout">
                    <a href="#" class="category--text">Log Out</a> 
                </div>
            </ul>
    
            
    
        </div>
        <!--  -->
        <div class="content col-10">
            <!-- Logo -->
            <div class="container-logo">
                <div class="btn-category" id="btn-category">
                    <img class="btn-category-img" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/2048px-Hamburger_icon.svg.png" alt="">
                </div>
                <div class="btn-close-category" id="btn-close-category">
                    <img class="btn-category-img" src="https://www.freeiconspng.com/thumbs/close-icon/close-icon-39.png" alt="">
                </div>
                <img class="image-logo" src="/images/logo.png" alt="">
            </div>
            <!-- List App -->
            <div class="container__list-apps grid__row">
                <!-- Item -->
                <!-- Back end render data vào đây -->
                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <!-- Rate -->
                    <span class="rate-app">4.7</span>
                </a>
                <!-- item -->
                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <span class="rate-app">4.7</span>
                </a>
                <!--  -->
                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <span class="rate-app">4.7</span>
                </a>

                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <span class="rate-app">4.7</span>
                </a>

                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <span class="rate-app">4.7</span>
                </a>

                <a href="" class="col-2 container__app">
                    <div class="container__image-app">
                        <img src="/images/empty.png" alt="" class="image-app">
                    </div>
                    <p class="name-app">Name App</p>
                    <span class="rate-app">4.7</span>
                </a>
                <!--  -->
            </div>
        </div>
    </div>

    <script src="/handleLogic/user.js"></script>
</body>
</html>