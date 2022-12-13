<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="app.css">
    <title>Apps</title>
    <script src="app.js"></script>

</head>
<body style="overflow-x: hidden;">

    <nav class="navbar navbar-expand-sm" style="box-shadow: 0px 1px 2px #ccc">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="icon/shrug.png" alt="Logo" style="width:40px;">
            </a>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Name</a>
                    </li>
                </ul>
                <form class="d-flex" action = "###" id = "searchForm">
                    <input class="form-control me-2" id = "searchBar" style = "width: 250px;height: fit-content;margin:auto;" type="text" placeholder="Search">
                    <button name="searchButton" type="submit" style="border-radius: 8px;border: None;">Search</button>
                </form>
                <a class="navbar-brand" href="javascript:void(0)" style = "margin-left:1%">
                    <img src="icon/tft.jpg" alt="User" style="width:40px;" class="rounded-pill"> 
                </a>
                <button id = "openMenu" class="openbtn" onclick="openMenu()">☰</button> 
            </div>
        </div>
    </nav>

    <div id = "topBar" class = "holder">
        <img id = "icon" src="icon/tft.jpg" alt="hello">
        <div id = "appName">
            TFT
        </div>
        <div id = "dlsBox">
            <div id = "appDownload">
                Download: 1.000.00+
            </div>
            <div id = "appSize">
                Size: 200MB
            </div>
        </div>
        <div id = "marks">
            <a href = "javascript:void(0)" class = "far" id = "wishlist" onclick="change(1)" >&#xf004;</a>
            <a href = "javascript:void(0)" class = "far" id = "favorite" onclick="change(2)" >&#xf02e;</a>
        </div>
        <button id = "download">
            Download
        </button>
        <div id = "rateBox">
            <i class = "fas rate"> &#xf005; </i>
            <i class = "fas rate"> &#xf005; </i>
            <i class = "fas rate"> &#xf005; </i>
            <i class = "fas rate"> &#xf005; </i>
            <i class = "fas rate"> &#xf005; </i>
            
        </div>
        <div id = "reportBox">
            <a href = "javascript:void(0)" class = "fas" id = "report">&#xf071;</a>
        </div>
    </div>

    <div id = "mainInfo" class = "holder">
        <div id = "slideContainer">
            <img src="icon/tft.jpg" alt="dunno" id = "pic1" style="display: block;">
            <img src="icon/setting.png" alt="dunno" id ="pic2" style="display: none;">
            <img src="icon/user.png" alt="dunno" id = "pic3" style="display: none;">


            <a href = "javascript:void(0)" class = "fas leftarrow" id = "arrows" style="top: 63%;left: 4%" onclick="switchImg(1)">&#xf104;</a>
            <a href = "javascript:void(0)" class = "fas rightarrow" id = "arrows" style="top: 63%;left: 31%;" onclick="switchImg(2)">&#xf105;</a>
        </div>
        
        <div id = "appInfo">
            <div id = "buttonTab">
                <button id = "btn1" class = "subButtonTab" onclick="infoBtnClick(this)">About</button>
                <button id = "btn2" class = "subButtonTab" onclick="infoBtnClick(this)">Updates</button>
                <button id = "btn3" class = "subButtonTab" onclick="infoBtnClick(this)">Extras</button>
            </div>
            <div id = "info">
                <div id = "aboutApp" class = "subInfoTab";>
                    <p id = "text"> Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.Safety starts with understanding how developers collect and share your data. Data privac
                        y and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.</p>
                </div>
                <div id = "updates" class = "subInfoTab";>
                    <p id = "text"> Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                    Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                    Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                 </p>
                </div>
                <div id = "moreInfo" class = "subInfoTab";>
                    <p id = "text"> Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                    Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                    Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
                 </p>
                </div>
            </div>
        </div>

        <div id = "ratingContainer">
            <div id = "userRateBox">
                <p id = "text">Your Rating:</p>
                <a href = "javascript:void(0)" class = "far rate" id = "1" onmouseover="changeStarCl(this,1)" onmouseout="changeStarCl(this,2)" onclick="changeStarCl(this,3)"> &#xf005; </a>
                <a href = "javascript:void(0)" class = "far rate" id = "2" onmouseover="changeStarCl(this,1)" onmouseout="changeStarCl(this,2)" onclick="changeStarCl(this,3)"> &#xf005; </a>
                <a href = "javascript:void(0)" class = "far rate" id = "3" onmouseover="changeStarCl(this,1)" onmouseout="changeStarCl(this,2)" onclick="changeStarCl(this,3)"> &#xf005; </a>
                <a href = "javascript:void(0)" class = "far rate" id = "4" onmouseover="changeStarCl(this,1)" onmouseout="changeStarCl(this,2)" onclick="changeStarCl(this,3)"> &#xf005; </a>
                <a href = "javascript:void(0)" class = "far rate" id = "5" onmouseover="changeStarCl(this,1)" onmouseout="changeStarCl(this,2)" onclick="changeStarCl(this,3)"> &#xf005; </a>
            </div>
        </div>
    </div>
    
    <div id = "moreApps" class = "holder">
        <button id = "moreBtn"> More </button>
        <div id = "appBasket">
            <?php
                for($i = 0;$i <=30;$i++){
                    echo "<div id = 'appBundle'>";
                    echo "<a href='javascript:void(0)' class = 'generalText'>";
                    echo "<img src='icon/shrug.png' alt='dunno'>";
                    echo "<div id = 'difName' >Name</div>";
                    echo "</a>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>

    <div id = "commentSection" class = "holder">
        <div id = "commentCheck">Comment</div>
        <div id = "userComment">
            <a href="javascript:void(0)" id = "userCommentIcon">
                <img src="icon/shrug.png" alt="User" style="width:60px;" class="rounded-pill"> 
            </a>
            
            <input type="text" id = "userCommentBox" placeholder="Your Comment Here">
            <button type="submit" class = "commentButton" >Comment</button>
        </div>
        <div id = "checkComment">
        <div id = "userComment">
            <a href="javascript:void(0)" id = "userCommentIcon">
                <img src="icon/user.png" alt="User" style="width:60px;" class="rounded-pill"> 
            </a>
            <input type="text" id = "userCommentBox" placeholder="Your Comment Here">
        </div>
        </div>
    </div>

    <div id = "menu">
        <button id = "closeMenu" onclick ="closeMenu()">×</button>
        <a href = "javascript:void(0)">
            <div id = "wh" class = "choices">Wishlist</div>
        </a>
        <a href = "javascript:void(0)">
            <div id = "fav" class = "choices">Favorate</div>
        </a>
        <a href = "javascript:void(0)">
            <div id = "setting" class = "choices">Setting</div>
        </a>
    </div>

</body>
</html>