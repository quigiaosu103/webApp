window.onload = function() {
    const slider = document.getElementsByClassName("appB");
    console.log(slider);


    let isDown = false;
    let startX;
    let scrollLeft;
    
    for(let i = 0; i < slider.length;i++){
        dragScroll(slider[i]);
    }

    function dragScroll(slider){
        slider.addEventListener("mousedown",(e)=>{
            slider.style.scrollBehavior = "initial";
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener("mouseleave",()=>{
            isDown = false;
        });
        slider.addEventListener("mouseup",()=>{
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