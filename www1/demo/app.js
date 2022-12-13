let wish = 0;
let fav = 0;
let userStar = 0;

window.onload = function() {
    document.getElementById("btn1").click();
    document.getElementById("closeMenu").click();

    h = $(document).height() + "px";
    document.getElementById("menu").style.height = h;
    
    const timeChangeEle = document.getElementsByClassName("fas rightarrow")[0];
    setInterval(function() {timeChangeEle.click();}, 5000);

    const slider = document.querySelector("#appBasket");
    let isDown = false;
    let startX;
    let scrollLeft;
    
    slider.addEventListener("mousedown",(e)=>{
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener("mouseleave",()=>{
        isDown = false;
    });
    slider.addEventListener("mouseup",()=>{
        isDown = false;
    });
    slider.addEventListener("mousemove",(e)=>{
        if(!isDown){
            return 0;
        };
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = x - startX;
        slider.scrollLeft = scrollLeft - walk;
    });



};

function openMenu() {
    document.getElementById("menu").style.width = "200px";
    document.getElementById("closeMenu").style.display = "inline";
}

function closeMenu() {
    document.getElementById("menu").style.width = "0";
    document.getElementById("closeMenu").style.display = "none";
}

function change(type){
    switch(type){
        case 1:{
            if (wish == 0){
                document.getElementById("wishlist").className= "fas";
                document.getElementById("wishlist").style.color = "#ff002d";
                wish = 1;
            }
            else{
                document.getElementById("wishlist").className = "far";
                document.getElementById("wishlist").style.color = "black";
                wish = 0;
            }
            break;
        }
        case 2:{
            if (fav == 0){
                document.getElementById("favorite").className = "fas";
                document.getElementById("favorite").style.color = "orange";
                fav = 1;
            }
            else{
                document.getElementById("favorite").className = "far";
                document.getElementById("favorite").style.color = "black";
                fav = 0;
            }
            break;
        }
    }

};


function switchImg(direction){
    var container = document.getElementById("slideContainer");
    var imgNum = container.childElementCount - 2;
    var imgs = container.getElementsByTagName("img");
    var arrNum;

    for (let i = 0; i < imgs.length ; i++){
        if(imgs[i].style.display == "block"){
            arrNum = i;
            break;
        }
    }

    imgs[arrNum].style.display = "none";

    switch(direction){
        case 1:{
            arrNum = arrNum - 1;
            if (arrNum < 0){
                arrNum = imgNum - 1;
            }
            imgs[arrNum].style.display = "block";
            break;
        }
        case 2:{
            arrNum = arrNum + 1
            if (arrNum >= imgNum){
                arrNum = 0;
            }
            imgs[arrNum].style.display = "block";
            break;
        }
    }

}
function changeStarCl(star,mode){
    var idNum = star.id;
    var temp = document.getElementById("userRateBox");
    var stars = temp.getElementsByTagName("a");
    switch(mode){
        case 1:
            if (userStar == 0){
                for(let i = 0; i <= idNum - 1;i++){
                    stars[i].style.color = "gold";
                }
            }
            break;
        case 2:
            if (userStar == 0){
                for(let i = 0; i <= stars.length - 1;i++){
                    stars[i].style.color = "black";
                }
            }
            break;
        case 3:
            if (userStar == 0){
                for(let i = 0; i <= idNum - 1;i++){
                    stars[i].className = "fas rate";
                    stars[i].style.color = "gold";
                }
                userStar = 1;
            }
            else{
                for(let i = 0; i <= stars.length - 1;i++){
                    stars[i].className = "far rate";
                }
                for(let i = 0;i <= idNum - 1; i ++){
                    stars[i].style.color = "gold";
                }
                userStar = 0;
            }
            break;
    }
}
function infoBtnClick(x){
    x = x.id;
    var tabs = document.getElementById("info").getElementsByClassName("subInfoTab");
    var mark;
    switch(x){
        case "btn1":
            mark = 0;
            break;
        case "btn2":
            mark = 1;
            break;
        case "btn3":
            mark = 2;
            break;
    }
    tabs[mark].style.display = "flex";
    for(let i = 0; i <= tabs.length - 1;i++){
        if(i == mark){
            continue;
        }
        tabs[i].style.display = "none";
    }
    
}