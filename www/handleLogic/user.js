// JS for reponsive
if(document.getElementById("btn-category")){
    nav = document.getElementById("nav");
    btn_show = document.getElementById("btn-category");
    btn_close = document.getElementById("btn-close-category");
    btn_show.onclick = function(){
        nav.style.display = (nav.style.display != "block") ? "block":"none";
        btn_show.style.display= "none";
        btn_close.style.display= "block";
        document.getElementsByClassName("container__list-apps")[0].style.display = "none";
    }

    btn_close.onclick = function(){
        nav.style.display = (nav.style.display != "block") ? "block":"none";
        btn_show.style.display= "block";
        btn_close.style.display= "none";    
        document.getElementsByClassName("container__list-apps")[0].style.display = "flex";
    }
}

currentUrl = window.location.href;
function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}
page = gup('page', currentUrl);
if(page==null){
    document.getElementById("listapp").style.display="block";
    document.getElementById("listapp_category").classList.add("category-active");
} else {
    pages = document.getElementsByClassName("container-page");
    for(var i=0; i<pages.length; i++){
        pages[i].style.display="none";
    }
    document.getElementById(page).style.display="block";
    document.getElementById(page.concat("_category")).classList.add("category-active");
}


function getUsersApps(){
    $.post('./Api/getApps.php', {
        userName: userNameLogedin
    }, data=> {
        const html = data.data.map(app=> `
            <a href="" class="col-2 container__app">
                <div class="container__image-app">
                    <img src="${app.srcImage}" alt="" class="image-app">
                </div>
                <p class="name-app">${app.appName}</p>
                <span class="rate-app">${app.vote!=0?`${app.vote}<svg style="width: 12px; margin-left: 4px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>`:'Chưa có đánh giá'}</span>
            </a>
        `)
        document.querySelector('.users-app-container').innerHTML = html.join('')
    }, 'json')
}
getUsersApps()