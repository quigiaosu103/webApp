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

