
document.body.addEventListener("keypress", function(tecla){
    if(tecla.keyCode == 10){
        let query = document.getElementById("input-text").value;
        document.getElementById("query").setAttribute("value", query);
        document.formulario.submit();
    }
})