<?php
session_start();
if (isset($_POST['upload'])) {
    function upload($file) // ham upload dung de upload file, moi file sinh ra ten ngau nhien de tranh bi trung
    {
        $name = $file['name']; // lay ten file upload
        $ex = substr($name, strrpos($name, '.')); // lay phan duoi cua file

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; // danh sach ki tu 
        $uploadPathImg = "appContainer/images/Img/";
        $uploadPathFile = "appContainer/apps/appUpload";

        if ($ex == '.png' || $ex == '.jpg') { // neu la file anh thi vao 
            $srcDownload = $uploadPathImg . generate_string($permitted_chars) . $ex;
            move_uploaded_file($file["tmp_name"], $srcDownload);
        }
        if ($ex == '.zip') { // neu là file zip thi vao file
            $srcDownload = $uploadPathFile . generate_string($permitted_chars) . $ex;
            move_uploaded_file($file["tmp_name"], $srcDownload);
        }
    }

    function generate_string($input, $strength = 16) // ham sinh ten tu dong de tranh trung ten
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    $host = 'mysql-server';
    $user = 'root';
    $pass = 'root';
    $db = 'apps-management';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die('Không thể kết nối database: ' . $conn->connect_error);
    }

    $uploadPathImg = "appContainer/images/"; // dia chi file img
    $uploadPathFile = "appContainer/apps/"; // dia chi file app

    $appname = $_POST['appname'];
    $apptype = $_POST['apptype'];
    $description = $_POST['description'];


    $apk = $_FILES["apk"];
    $icon = $_FILES['icon'];
    $appimage = $_FILES['appimage'];

    upload($apk);
    upload($icon);
    upload($appimage);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="/style/user.css">
    <link rel="stylesheet" href="/font/fontawesome/css/all.min.css">
    <title>User</title>
</head>
<body>
    <div class="container grid__row">

        <!-- Category -->
        <div id="nav" class="nav col-2">
            <div class="backHome">
                <a href="index.php" class="home"><img src="./images/logo2.png" alt="" style="width: 132px;"></a>
            </div>
            <div class="container__image-user">
            </div>
            <ul class="category--list">
                <a href="?page=listapp">
                    <li id="listapp_category" class="category--item">
                        <span class="category--text">Apps</span>
                    </li>
                </a>
                <a href="?page=favorite">
                    <li id="favorite_category" class="category--item">
                        <span class="category--text">Favorites</span>
                    </li>
                </a>
                <a href="?page=addapp">
                    <li id="addapp_category" class="category--item">
                        <span class="category--text">Add App</span>
                    </li>
                </a>
                <div class="category--item category--item--logout">
                    <a href="./admin/logout.php" class="category--text">Log Out</a> 
                </div>
            </ul>
    
            
    
        </div>
        <!--  -->
        <div  class="col-10">
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
            <div id="listapp" class="container__list-apps container-page">
                <div class="grid__row users-app-container"></div>
            </div>

            <!-- Favorites app -->
            <div id="favorite" class="container__list-apps">
                <div class="grid__row favorite-app-container"></div>
            </div>

            <!-- Wish list -->
            <div id="wishlist"></div>

            <!-- Add apps -->
            <!-- Name để backend lấy data từ form (appname, apptype, apk, icon, appimage, upload) -->
            <div id="addapp" class="container__add-app container-page">
                <form action="#" method="POST" class="grid__row" enctype="multipart/form-data">
                    <div class="col-6">
                        <!--  -->
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="appname">App name:</label>
                            <input name="appname" id="appname" type="text" class="add-app__input col-5">
                        </div>
                        <!--  -->
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="apptype">App type:</label>
                            <select class="add-app__input col-5" name="apptype" id="apptype">
                                <option value=""></option>
                                <option value="mxh">Mạng xã hội</option>
                                <option value="gms">Trò chơi</option>
                                <option value="bk">Sách</option>
                                <option value="dv">Ứng dụng dịch vụ</option>
                                <option value="ms">Ứng dụng mua sắm</option>
                            </select>
                        </div>
                        <!--  -->
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="apk">Upload file .apk:</label>
                            <input name="apk" id="apk" type="file" class="add-app__input col-5" accept=".zip"/>
                        </div>
                        <!--  -->
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="imageUpload">App Icon:</label>
                            <label for="imageUpload">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input name="icon" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url();">
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!--  -->
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="">
                                App Images:
                            </label>
                            <div class="col-5 ">
                                <!-- Upload Area -->
                                <div id="uploadArea" class="upload-area">
                                <!-- Header -->
                                <div class="upload-area__header">
                                    <h1 class="upload-area__title"></h1>
                                    <p class="upload-area__paragraph">
                                    File should be an image
                                    <strong class="upload-area__tooltip">
                                        Like
                                        <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                    </strong>
                                    </p>
                                </div>
                                <!-- End Header -->

                                <!-- Drop Zoon -->
                                <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                    <span class="drop-zoon__icon">
                                    <i class='bx bxs-file-image'></i>
                                    </span>
                                    <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
                                    <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                    <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                                    <input name="appimage" type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*">
                                </div>
                                <!-- End Drop Zoon -->

                                <!-- File Details -->
                                <div id="fileDetails" class="upload-area__file-details file-details">
                                    <h3 class="file-details__title">Uploaded File</h3>

                                    <div id="uploadedFile" class="uploaded-file">
                                    <div class="uploaded-file__icon-container">
                                        <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                        <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                    </div>

                                    <div id="uploadedFileInfo" class="uploaded-file__info">
                                        <span class="uploaded-file__name">Proejct 1</span>
                                        <span class="uploaded-file__counter">0%</span>
                                    </div>
                                    </div>
                                </div>
                                <!-- End File Details -->
                                </div>
                                <!-- End Upload Area -->
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-6">
                        <div class="add-app__group-input grid__row">
                            <label class="add-app__label col-3" for="description">Description:</label>
                            <textarea name="description" id="description" type="text" class="add-app__input col-5" rows="6" cols="50"></textarea>
                        </div>
                    </div>
                    <input class="add-app__submit" type="submit" value="Upload" name="upload">
                </form>
            </div>

            <!-- Setting -->
            <div id="setting"></div>
        </div>
        <!-- Add apps -->
    </div>
    <script>
        const userNameLogedin = '<?php
            echo $_SESSION['userName']??'';
        ?>'
        console.log(userNameLogedin);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/handleLogic/user.js"></script>
    <script src="/handleLogic/addapp.js"></script>
</body>
</html>