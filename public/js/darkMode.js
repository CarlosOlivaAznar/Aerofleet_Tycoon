if(!localStorage.modoOscuro){
    localStorage.setItem("modoOscuro", "false");
}

cambiarModoOscuro();

function cambiarModoOscuro()
{
    if(localStorage.modoOscuro === "true"){
        document.body.setAttribute("class", "dark");
    } else {
        document.body.removeAttribute("class");
    }
}

