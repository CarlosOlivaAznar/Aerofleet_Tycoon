function mostrarDd(nombreDd, sede){
    // Se muestra el dropDown
    document.getElementById(nombreDd).classList.add("show");
    // Se ajusta el tamaño de los campos del buscador respecto al ancho del input
    document.getElementById(nombreDd).style.width = String(document.getElementById(sede.id).offsetWidth) + "px"
  }

  function ocultarDd(nombreDd){
    // Se retrasa la funcion para que deje tiempo para manejar el evento de onclick()
    setTimeout(function() {
      // Se oculta el dropDown
      document.getElementById(nombreDd).classList.remove("show");
    }, 100);
  }

  function filtrar(elemento, nombreDd) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(elemento.id);
    filter = input.value.toUpperCase();
    div = document.getElementById(nombreDd);
    a = div.getElementsByTagName("p");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }

  function seleccionar(element, sede, sedeHid){
    let input = document.getElementById(sede)
    let inputHid = document.getElementById(sedeHid)

    input.value = element.innerHTML
    inputHid.value = element.getAttribute("id");

    ocultarDd();
  }