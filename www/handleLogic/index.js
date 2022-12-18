//Render ứng dụng theo từng thể loại
function renderApps() {
    $.post('/API/getApps.php', {
      role: 'user'
    }, (data, status)=> {
          let gms = ''
          let mxh = ''
          let dv = ''
          let ms = ''
          let bk = ''
          console.log(data)
          data.data.map((app)=> {
              if(app.TYPE == 'gms'){ //kiểm tr thể loại
                    gms+= `
                    <a href='App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
                        <div class='game-containt__img img-color'></div>
                        <div class='infor'>
                            <div class='main-img'>
                                <img src='${app.srcImage}' width='56' height='56' border-radius='4'></image>
                            </div>
                            <div class='infor-text'>
                                <h5 class='game-containt__name'>${app.appName}</h5>
                                <span class='game-containt__username'>${app.userName}</span>
                            </div>
                        </div>
                    </a>
                    `
              }
              if(app.TYPE == 'ms') {
                  ms += `
                  <a href='App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
                        <div class='game-containt__img img-color'></div>
                        <div class='infor'>
                            <div class='main-img'>
                                <img src='${app.srcImage}' width='56' height='56' border-radius='4'></image>
                            </div>
                            <div class='infor-text'>
                                <h5 class='game-containt__name'>${app.appName}</h5>
                                <span class='game-containt__username'>${app.userName}</span>
                            </div>
                        </div>
                    </a>
                  `
              }

              if(app.TYPE == 'dv'){
                  dv+= `
                  <a href='App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
                    <div class='game-containt__img img-color'></div>
                    <div class='infor'>
                        <div class='main-img'>
                            <img src='${app.srcImage}' width='56' height='56' border-radius='4'></image>
                        </div>
                        <div class='infor-text'>
                            <h5 class='game-containt__name'>${app.appName}</h5>
                            <span class='game-containt__username'>${app.userName}</span>
                        </div>
                    </div>
                </a>
                  `
              }

              if(app.TYPE == 'mxh') {
                  mxh += `
                  <a href='App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
                        <div class='game-containt__img img-color'></div>
                        <div class='infor'>
                            <div class='main-img'>
                                <img src='${app.srcImage}' width='56' height='56' border-radius='4'></image>
                            </div>
                            <div class='infor-text'>
                                <h5 class='game-containt__name'>${app.appName}</h5>
                                <span class='game-containt__username'>${app.userName}</span>
                            </div>
                        </div>
                    </a>
                  `
              }

              if(app.TYPE == 'bk') {
                bk += `
                <a href='App.php?id=${app.id}' class='app-type__game--containt app-containt col-4'>
                      <div class='game-containt__img img-color'></div>
                      <div class='infor'>
                          <div class='main-img'>
                              <img src='${app.srcImage}' width='56' height='56' border-radius='4'></image>
                          </div>
                          <div class='infor-text'>
                              <h5 class='game-containt__name'>${app.appName}</h5>
                              <span class='game-containt__username'>${app.userName}</span>
                          </div>
                      </div>
                  </a>
                `
            }



          })

          $('#app-type__games-containt').append(gms)
          $('#app-type__serviceapps-containt').append(dv)
          $('#app-type__shoppingapps-containt').append(ms)
          $('#app-type__socialnwapps-containt').append(mxh)
    }, 'json')
}
function renderCommonApps() {
    let limitItems = 9
    selectApps(limitItems)
    function selectApps(num) {
        $.post('/API/selectApps.php', {
            limitItems: num
        }, (data, status)=> {
            console.log('data: ', data)
            let id =0
            //render ứng dụng sắp xếp theo lượt tải
            const apps = data.data.map((app)=>{
                id++;   //cứ mỗi 3 ứng dụng sẽ cho vào 1 thẻ cha
                return `${id%3==1? '<div class="common-apps col-4">':''}
                <a class="common-app" href="App.php?id=${app.id}">
                    <span class="common-app_top">${id}</span>
                    <div class="common-app_image"><img src="${app.srcImage}" width="56" height="56" border-radius="4"></image></div>
                    <div class="common-app_infor">
                        <span class="common-app_infor--name">${app.appName}</span>
                        <span class="common-app_infor--type">${app.TYPE}</span>
                        <span class="common-app_infor--download">${app.download}</span>
                    </div>
                </a>   
                ${id%3==0? '</div>':''} 
            `})
            //Render ứng dụng theo vote
            const voteApps = data.data2.map(app=> `
                <a href="App.php?id=${app.id}" class="favorite-apps__list-app">
                    <div class="favorite-apps__list-app__image" style="background-image: url(${app.srcImage});"></div>
                        <div class="favorite-apps__list-app__info">
                        <span class="favorite-apps__list-apps__info__name">${app.appName}</span> <br>
                        <span class="favorite-apps__list-apps__info__user-name">${app.userName}</span>
                    </div>
                </a>
            `)
            document.querySelector('.common-apps__apps-bar').innerHTML = apps.join('')
            document.querySelector('.list-vote-apps__containt').innerHTML = voteApps.join('')
        }, 'json')
    }
  }


  //Xử lý tìm kiếm
 function search() {
  const inputSearchElement = document.querySelector('#search')
  console.log('search: ', inputSearchElement)
  inputSearchElement.addEventListener('keypress', event => {
      if (event.keyCode == 13) { //tìm kiếm khi nhấn enter
          const value = inputSearchElement.value
          location.href= `Api/searchApps.php?data=${value}`
      }
    })
 }

 
function handleLogOut() {
    const userElement = document.querySelector('.isLoggedIn')
    userElement.addEventListener('mouseover', ()=> {
        document.querySelector('.logout').style.display='block'
    })
    userElement.addEventListener('mouseout', ()=> {
        document.querySelector('.logout').style.display='none'
    })
    
}

search()
renderApps();
renderCommonApps()
// handleLogOut()