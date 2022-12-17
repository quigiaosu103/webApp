function searchHandle() {
    let html = data.data.map((app, id)=> `
    <a class="common-app" href="App.php?id=${app.id}">
        <span class="common-app_top">${id}</span>
        <div class="common-app_image"><img src="${app.srcImage}" width="56" height="56" border-radius="4"></image></div>
        <div class="common-app_infor">
            <span class="common-app_infor--name">${app.appName}</span>
            <span class="common-app_infor--type">${app.TYPE}</span>
            <span class="common-app_infor--download">${app.download}</span>
        </div>
    </a>   
    `)  
    document.querySelector('.found-apps').innerHTML = html.join('')
}


function search() {
    const inputSearchElement = document.querySelector('#search')
    console.log('search: ', inputSearchElement)
    inputSearchElement.addEventListener('keypress', event => {
        if (event.keyCode == 13) {
            const value = inputSearchElement.value
            location.href= `Api/searchApps.php?data=${value}`
        }
      })
  }
  
  search()
searchHandle()