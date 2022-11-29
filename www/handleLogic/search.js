function searchHandle() {
    let html = data.data.map((app, id)=> `${id%3==1? '<div class="common-apps col-4">':''}
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
    `)  
    document.querySelector('.found-apps').innerHTML = html.join('')
}

searchHandle()