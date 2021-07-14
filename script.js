
    $('.counts').counterUp({
        delay: 10,
        time: 3000
    });
 
    

    

var Arrow = document.getElementById('topArrow');

window.onscroll = function(){
    if(document.body.scrollTop>150 || document.documentElement.scrollTop>150){
        Arrow.style.display="block";
    }else{
        Arrow.style.display="none";
    }
}

function scrlTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}