<?php
    session_start();
    require_once ('admin/connection.php');
    $id2 = $_SESSION['id']??'';
    $id = $_GET['id']?? $id2;
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
        $_SESSION['pageData'] = json_encode(array('comment'=>$arr, 'app'=> $app));
      }
    // s
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
                       $_SESSION['currPage'] = 'App.php';
                        echo 'loginForm.php'; 
                    }else {
                    echo 'admin/logout.php?currPage=App.php';
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

      <div class="containt">
        <div class="app">
            <div class="app-infor">
                <h2 class="app-infor__name">Appname</h2>
                <button class="btn btn-primary">Download</button>
            </div>
            <div class="app-image">

            </div>
        </div>
        
        <h4 class="">Images</h4>
        <div class="app-images">

          <div class="image"></div>
          <div class="image"></div>
          <div class="image"></div>
          <div class="image"></div>
        </div>

        <div class="cmts">

        </div>

        <div class="new-comment">
           <input type="text" placeholder="Add comment...">
           <button class="btn btn-primary addNewCmt">Comment</button>
        </div>
      </div>

      
    <script>
      const data = (<?php
        echo $_SESSION['pageData'];
        ?>)
      const userName = '<?php
        echo $_SESSION['userName'];
      ?>'
      const id = data.app.id;

      document.querySelector('.app-infor__name').innerText= data.app.appName;

      function renderCmt() {
        const html = data.comment.map((cmt)=> `
          <div class="cmt">
            <div class="cmt__user">
                ${cmt.userName==userName?'<button class="rmCmt" onclick="removeCmt(this)">x</button>' :''}
                <div class="cmt__user__image"></div>
                <span class="cmt__user_name">${cmt.userName}</span>
            </div>
            <div class="cmt__content">
                ${cmt.content}
            </div>
          </div>`)
        document.querySelector('.cmts').innerHTML = html.join('')
      }
      
      function addComment() {
        const addBtn = document.querySelector('.addNewCmt')
        addBtn.addEventListener('click',(e)=>{

          const mess = document.querySelector('.new-comment>input').value

          if(mess) {
            $.post('/API/addCmt.php', {
              id: id,
              content: mess
            }, (data, status)=> {
              console.log(data)
              document.querySelector('.cmts').innerHTML += `
                <div class="cmt">
                  <div class="cmt__user">
                      <button class="rmCmt" onclick="removeCmt(this)">x</button>
                      <div class="cmt__user__image"></div>
                      <span class="cmt__user_name"><?php
                        echo $_SESSION['userName'];
                      ?></span>
                  </div>
                  <div class="cmt__content">
                      ${mess}
                  </div>
                </div>`

              document.querySelector('.new-comment>input').value =''
              document.querySelector('.new-comment>input').disabled = true

            }, 'json')
          }
        })
      }

      function removeCmt(e) {
        const element = e.parentElement.parentElement
        $.post('/API/removeItem.php', {
          type: 'cmt',
          id: id,
          userName: userName
        }, (data)=> {
          element.style.display='none';
          document.querySelector('.new-comment>input').disabled = false
        }, 'json')
      }

      function isCmted() {
          let isCmt =false
          data.comment.map((cmt)=>{
            if(cmt.userName == userName) isCmt = true
          })
          if(isCmt) {
            document.querySelector('.new-comment>input').disabled = true
          }
        
      }

      renderCmt()
      addComment()
      isCmted()

    </script>
</body>
</html>