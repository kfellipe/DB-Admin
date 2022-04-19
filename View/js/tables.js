
function table(query, cols){
    let table = document.getElementsByClassName("table")[query];
    table.addEventListener("mouseover", function(){
        table.style = "height: "+  (25 * cols) + "px";
    })
    table.addEventListener("mouseout", function(){
        table.style = "height: "+  (25 * 1) + "px";
    })
}

let tables = document.getElementsByClassName("table");

for(let counter = 0; counter < tables.length; counter++){
    let colnum = document.querySelectorAll("aside :nth-child("+ (counter + 1) +") > div > span").length;
    table(counter, colnum);
}