function renderApps() {
    $.post('/API/getApps.php', {
      role: 'user'
    }, (data, status)=> {
          let gms = ''
          let mxh = ''
          let dv = ''
          let ms = ''
          console.log(data)
          data.data.map((app)=> {
              if(app.TYPE == 'gms'){
                  gms += `<a href="App.php?id=${app.id}" class="app-type__game--containt app-containt col-4">
                        <div class="game-containt__img img-color"></div>
                        <div class="infor">
                          <div class="main-img" "><img src="${app.srcImage}" width="56" height="56" border-radius="4"></image></div>
                          <div class="infor-text">
                              <h5 class="game-containt__name">${app.appName}</h5>
                              <span class="game-containt__username">${app.userName}</span>    
                          </div>    
                      </div>
                    </a>`
              }
              if(app.TYPE == 'ms') {
                  ms += `<a href="App.php?id=${app.id}" class="shoppingapp--containt app-containt col-4">
                          <div class="shoppingapp-containt__img img-color"  ></div>
                          <div class="infor">
                              <div class="main-img" "><img src="${app.srcImage}" width="56" height="56" border-radius="4"></image></div>
                              <div class="infor-text">
                                  <h5 class="shoppingapp-containt__name">${app.appName}</h5>
                                  <span class="shoppingapp-containt__username">${app.userName}</span>    
                              </div>    
                          </div>
                      </a>`
              }

              if(app.TYPE == 'dv'){
                  dv+= `<a href="App.php?id=${app.id}" class="app-type__serviceapp--containt app-containt col-4">
                          <div class="serviceapp-containt__img img-color">
                          
                          </div>
                          <div class="infor">
                              <div app-main-image>
                                <img src="${app.srcImage}" width="56" height="56" border-radius="4"></image> 

                              </div>

                              <div class="infor-text">
                                  <h5 class="serviceapp-containt__name">${app.appName}</h5>
                                  <span class="serviceapp-containt__username">${app.userName}</span>    
                              </div>    
                          </div>
                        </a>`
              }

              if(app.TYPE == 'mxh') {
                  mxh += `<a href="App.php?id=${app.id}" class="socialnwapp--containt app-containt col-4">
                          <div class="socialnwapp-containt__img img-color" ></div>
                          <div class="infor">
                              <div class="main-img"><img src="${app.srcImage}" width="56" height="56" border-radius="4"></image></div>
                              <div class="infor-text">
                                  <h5 class="socialnwapp-containt__name">${app.appName}</h5>
                                      <span class="socialnwapp-containt__username">${app.userName}</span>    
                              </div>    
                          </div>
                      </a>`
              }


          })

          $('.app-type__games-containt').append(gms)
          $('.app-type__serviceapps-containt').append(dv)
          $('.app-type__shoppingapps-containt').append(ms)
          $('.app-type__socialnwapps-containt').append(mxh)
    }, 'json')
  }
  
  function renderCommonApps() {
    let limitItems = 9
    selectApps(limitItems)
    function selectApps(num) {
      $.post('/API/selectApps.php', {
        limitItems: num
        }, (data, status)=> {
            let id =0
            const apps = data.data.map((app)=>{
                id++;
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
            document.querySelector('.common-apps__apps-bar').innerHTML = apps.join('')
        }, 'json')
    }
  }

 function search() {
  const inputSearchElement = document.querySelector('input#find')
  inputSearchElement.addEventListener('keypress', event => {
      if (event.keyCode == 13) {
          const value = inputSearchElement.value
          location.href= `Api/searchApps.php?data=${value}`
      }
    })
 }


  search()
  renderApps();
  renderCommonApps()