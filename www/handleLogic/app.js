let wish = 0;
let fav = 0;
let userStar = 0;

window.onload = function() {
    document.getElementById("btn1").click();
    
    const slider = document.querySelector("#appBasket");
    let isDown = false;
    let startX;
    let scrollLeft;
    
    slider.addEventListener("mousedown",(e)=>{
        slider.style.scrollBehavior = "initial";
        isScrolled = true;
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;

    });

    slider.addEventListener("mouseleave",()=>{
        isDown = false;
    });

    slider.addEventListener("mouseup",(e)=>{
        slider.style.scrollBehavior = "smooth";
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


//thay đổi trạng thái của icon yêu thích
function change(type){
    switch(type){
        case 1:{
            if (wish == 0){
                document.getElementById("wishlist").className= "fas";
                document.getElementById("wishlist").style.color = "#ff002d";
                likeAction(1)
                wish = 1;
            }
            else{
                document.getElementById("wishlist").className = "far";
                document.getElementById("wishlist").style.color = "black";
                likeAction(0)
                wish = 0;
            }
            break;
        }
    }

};


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
};

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
    
};

function scrollDiv(btn,direction){
    let pr = btn.parentElement.parentElement.children[1];
    let childWidth = btn.parentElement.parentElement.children[1].children[0].offsetWidth ;

    switch(direction){
        case 'left':
            pr.scrollBy(-(childWidth*2),0);
            break;
        case 'right':
            pr.scrollBy(childWidth*2,0);
            break;
    }
}


function addCmt(x){
    let cmt = x.parentElement.children[1].value;

    let node = document.createElement('div');
    node.className = "comment";

    let a = document.createElement('a');
    a.href = "javascript:void(0)";
    a.style = "text-decoration:none;";

    let img = document.createElement('img');
    img.src ="appContainer/images/gms/tft.jpg"; 
    img.alt = "User";
    img.style = "width:40px;margin: 0 0 0 20px;";
    img.className = "rounded-pill";
    
    a.appendChild(img);

    node.appendChild(a);

    let cmtContainer = document.createElement('div');
    cmtContainer.id = "chat";

    text = document.createTextNode(cmt);
    cmtContainer.appendChild(text);

    node.appendChild(cmtContainer);


    btn = document.createElement('button');
    btn.className = "btn btn-primary deleteCmt";
    btn.setAttribute('onclick','dltCmt(this)');
    btn.appendChild(document.createTextNode("Delete")); 

    node.appendChild(btn);

    let cmtSession = document.getElementById("commentSection");
    cmtSession.appendChild(node);

}

function dltCmt(x){
    let pr = x.parentElement;
    pr.remove();
}

