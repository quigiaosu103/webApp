document.querySelector('.app-infor__name').innerText= data.app.appName;
document.querySelector('.app-user').innerText= data.app.userName;
document.querySelector('.downloadBtn').setAttribute('href', data.app.srcDownload)
document.querySelector('.app-image img').setAttribute('src', data.app.srcImage)
document.querySelector('.about-text').innerHTML = data.app.decsription
document.querySelector('.update-text').innerHTML = `Last update: ${data.app.DATEUP}`
console.log(data.app)
const likeBtn = document.querySelector('.like')
const unLikeBtn = document.querySelector('.unlike')

function renderCmt() {
  const html = data.comment.map((cmt)=>{ 
    if(cmt.userName==userName){
      document.querySelector('.myCmt').innerHTML=`
        <div class = "comment">
          <span style="text-decoration:none;">
            <img src="./images/defaultAvatar.png" alt="User" style="width:40px;margin: 0 0 0 20px;" class="rounded-pill"> 
          </span>
          <div id = "chat">
              ${cmt.content}
          </div>
          <button onclick = "removeCmt(this)" class="btn btn-primary deleteCmt">Delete</button>
        </div>
      `
      return ''
    }
  return `
        <div class = "comment">
          <span style="text-decoration:none; min-width: 160px">
            <img src="./images/defaultAvatar.png" alt="User" style="width:40px;margin: 0 0 0 20px;" class="rounded-pill"> 
            <span style="font-weight: 500; margin-left: 12px;" class="comment__userName">${cmt.userName}</span>
          </span>
          <div id = "chat">
              ${cmt.content}
          </div>
        </div>
      `})
  
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
  const element = e.parentElement
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
      document.querySelector('.userCommentHolder>input').disabled = true
    }
  
}
function handleLike() {
  if(data.count.count==1)
    change(1)
  else
    change(2)
}

function likeAction(type) {
  if(type ==0){
    // likeBtn.addEventListener('click', (e) => {
      if(userName === '') {
        location.href = 'loginForm.php'
      }else{
        $.post('/API/removeItem.php', {
          type: 'like',
          id: id,
          userName: userName
        }, ()=> { 
        })
      }
    // })
  }else{
    // unLikeBtn.addEventListener('click', (e) => {
      if(userName === '') {
        location.href = 'loginForm.php'
      }else{
        $.post('API/addFavorite.php', {
          id: id
        }, ()=> {
        })
      }
    // })
  }
  
  
}

function sameTypeApps() {
  const appId = data.app.id
  console.log(data.app.TYPE)
  $.post('./Api/getApps.php', {
    type: data.app.TYPE
  }, function(data){
    const html = data.data.map(app=> app.id != appId? `
      <a href=' href="App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
        <div class='game-containt__img img-color'></div>
        <div class='infor'>
          <div class='main-img'><img src='${app.srcImage}' width='56' height='56' border-radius='4'></image></div>
          <div class='infor-text'>
          <h5 class='game-containt__name'>${app.appName}</h5>
          <span class='game-containt__username'>${app.userName}</span>
        </div>
        </div>
      </a>
    `:'')
    document.querySelector('#appBasket').innerHTML = html.join('')
  }, 'json')
}

sameTypeApps()
handleLike()

renderCmt()
addComment()
isCmted()