if(!localStorage.modoOscuro){
    localStorage.setItem("modoOscuro", "false");
}

window.onload = function() {
    cambiarModoOscuro();
}

function cambiarModoOscuro()
{
    if(localStorage.modoOscuro === "true"){
        document.body.setAttribute("class", "dark");
    } else {
        document.body.removeAttribute("class");
    }
}

