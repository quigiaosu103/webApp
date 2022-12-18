//code để xứ lý dữ liệu cho trang thông tin của app


//thực hiện render thông tin của app
document.querySelector('.app-infor__name').innerText= data.app.appName;
document.querySelector('.app-user').innerText= data.app.userName;
document.querySelector('.downloadBtn').setAttribute('href', data.app.srcDownload)
document.querySelector('.app-image img').setAttribute('src', data.app.srcImage)
document.querySelector('.about-text').innerHTML = data.app.decsription
document.querySelector('.update-text').innerHTML = `Last update: ${data.app.DATEUP}`
console.log(data.app)
const likeBtn = document.querySelector('.like')
const unLikeBtn = document.querySelector('.unlike')


//render bình luận của user
function renderCmt() {
  const html = data.comment.map((cmt)=>{ 
    //kiểm tra bình luận xem có phải của user hiện tại không 
    if(cmt.userName==userName){
      //nếu là user hiện tại thì render ra thẻ bình luận có nút xóa
      document.querySelector('.myCmt').innerHTML=`
        <div class = "comment">
          <span style="text-decoration:none;">
            <img src="./images/defaultAvatar.png" alt="User" style="width:40px;margin: 0 0 0 20px;" class="rounded-pill"> 
          </span>
          <div id = "chat">
            <div id="rateBox" style="margin: 0; padding: 0">${renderStar(cmt.vote)}</div>
            <span clas="cmt__content" style="margin-left: 12px; font-weight: 500">${cmt.content}</span>
          </div>
          <button onclick = "removeCmt(this)" class="btn btn-primary deleteCmt">Delete</button>
        </div>
      `
      return ''
    }
    //nếu không phải user hiện tại thì return về thẻ chứa thông tin user và bình luận
  return `
        <div class = "comment">
          <span style="text-decoration:none; min-width: 160px">
            <img src="./images/defaultAvatar.png" alt="User" style="width:40px;margin: 0 0 0 20px;" class="rounded-pill"> 
            <span style="font-weight: 500; margin-left: 12px;" class="comment__userName">${cmt.userName}</span>
          </span>
          <div id = "chat">
            <div id="rateBox" style="margin: 0; padding: 0">${renderStar(cmt.vote)}</div>
            <span clas="cmt__content" style="margin-left: 12px; font-weight: 500">${cmt.content}</span>
          </div>
        </div>
      `})
  //Đưa các nình luận trong biến html vào ô chứa bình luận
  document.querySelector('.cmts').innerHTML = html.join('')
}


//render ra số sao với num là số sao được highlight
function renderStar(num) {
  let starNum = num
  let totalStar = 5;
  let html=''
  for (let i = 1; i <= starNum;i++){
      html+= "<i class = 'fas rate'> &#xf005; </i>"
      totalStar = totalStar - 1;
  }
  for (let i = 1; i <= totalStar;i++){
      html+= "<i class = 'far rate'> &#xf005; </i>"
  }
  return html;
}

//Thêm một bình luận mới
function addComment() {
  const addBtn = document.querySelector('.addNewCmt')
  addBtn.addEventListener('click',(e)=>{

    const mess = document.querySelector('.new-comment>input').value
    //kiểm tra nếu giá trị người dùng nhập vào không rỗng thì insert vào database
    if(mess) {
      $.post('/API/addCmt.php', {
        id: id,
        content: mess
      }, (data, status)=> {
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

//Xóa bình luận
function removeCmt(e) {
  const element = e.parentElement
  //Sử dụng post gọi tới removeItem
  $.post('/API/removeItem.php', {
    type: 'cmt', //xóa dữ liệu ở bảng comments
    id: id,
    userName: userName
  }, (data)=> {
    //Xóa thành công dữ liệu ở database, ẩn thẻ vừa xóa đẻ k cần render lại
    element.style.display='none';
    document.querySelector('.new-comment>input').disabled = false
  }, 'json')
}

//Kiểm tra người dùng đã bình luận chưa
function isCmted() {
    let isCmt =false
    data.comment.map((cmt)=>{
      if(cmt.userName == userName) isCmt = true
    })
    if(isCmt) {
      //nếu bình luận rồi sẽ khóa ô bình luận lại
      document.querySelector('.userCommentHolder>input').disabled = true
    }
  
}

//hiển thị trạng thái nút yêu thích
function handleLike() {
  if(data.count.count==1)
    change(1)
  else
    change(2)
}

//Xử lý dữ liệu khi nhấn yêu thích
function likeAction(type) {
  if(type ==0){
      if(userName === '') { //kiểm tra nếu chưa đăng nhập thì chuyển tới trang đăng nhập
        location.href = 'loginForm.php' 
      }else{
        $.post('/API/removeItem.php', { //Gọi api insert thông tin vào bảng favorite
          type: 'like',
          id: id,
          userName: userName
        }, ()=> { 
        })
      }
  }else{
      if(userName === '') {
        location.href = 'loginForm.php'
      }else{
        $.post('API/addFavorite.php', {
          id: id
        }, ()=> {
        })
      }
  }
  
  
}

//Render các ứng dụng cùng thể loại
function sameTypeApps() {
  const appId = data.app.id
  console.log(data.app.TYPE)
  $.post('./Api/getApps.php', { //gọi api lấy dữ liệu
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
    //render vào thẻ có id appBasket
    document.querySelector('#appBasket').innerHTML = html.join('')
  }, 'json')
}

//Thực hiện chức năng tìm kiếm
function search() {
  const inputSearchElement = document.querySelector('#search')
  console.log('search: ', inputSearchElement)
  inputSearchElement.addEventListener('keypress', event => {
      if (event.keyCode == 13) { //Khi ấn enter thì sẽ tìm kiếm
          const value = inputSearchElement.value
          location.href= `Api/searchApps.php?data=${value}` //gọi api 
      }
    })
}

//Chạy các hàm
search()
sameTypeApps()
handleLike()
renderCmt()
addComment()
isCmted()