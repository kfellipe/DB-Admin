
let state = 0;

let theme = document.getElementById("theme-check");
theme.addEventListener("change", function(){
    if(state == 0){
        
        state++;
        document.body.style = "background: rgba(0, 0, 0, .2); color: black";
        document.querySelectorAll(".theme-icon > img")[0].setAttribute("src", "/View/images/moon-icon.png");
        document.querySelectorAll(".theme-icon > img")[0].style = "filter: invert(0%)";
    } else {

        state--;
        document.body.style = "background: rgba(0, 0, 0, .8); color: white;";
        document.querySelectorAll(".theme-icon > img")[0].setAttribute("src", "/View/images/sun-icon.png");
        document.querySelectorAll(".theme-icon > img")[0].style = "filter: invert(100%)";
    }
})