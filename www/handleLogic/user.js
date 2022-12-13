// JS for reponsive
function reponsive() {
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
}


function getUserInfo() {
    
}

getUserInfo()

reponsive()