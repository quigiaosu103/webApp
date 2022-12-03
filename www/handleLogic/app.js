document.querySelector('.app-infor__name').innerText= data.app.appName;
document.querySelector('.downloadBtn').setAttribute('href', data.app.srcDownload)
document.querySelector('.app-image img').setAttribute('src', data.app.srcImage)
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
function handleLike() {
  const likeBtn = document.querySelector('.liked')
  const unLikeBtn = document.querySelector('.unlike')
  if(data.count.count==1){
    unLikeBtn.classList.add('disabled')
  }else{
    likeBtn.classList.add('disabled')
  }

  likeBtn.addEventListener('click', (e) => {
    if(userName === '') {
      location.href = 'loginForm.php'
    }else{
      $.post('/API/removeItem.php', {
        type: 'like',
        id: id,
        userName: userName
      }, ()=> { 
        unLikeBtn.classList.remove('disabled')
        likeBtn.classList.add('disabled')
      })
    }
  })
  
  unLikeBtn.addEventListener('click', (e) => {
    if(userName === '') {
      location.href = 'loginForm.php'
    }else{
      $.post('API/addFavorite.php', {
        id: id
      }, ()=> {
        unLikeBtn.classList.add('disabled')
        likeBtn.classList.remove('disabled')    
      })
    }
  })


}
handleLike()

renderCmt()
addComment()
isCmted()