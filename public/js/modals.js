/* ---------------------- */
/* Modales personalizados */
/* ---------------------- */

function abrirModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
  }

function cerrarModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
  }

// Obtener los botones que abren los modales 
var botonesAbrirModal = document.querySelectorAll("[data-modal-target]");

botonesAbrirModal.forEach(function(boton) {
    // Para cada uno aplicamos la funcion de "abrirModal" con s id correspondiente
boton.addEventListener("click", function() {
      var modalId = this.getAttribute("data-modal-target");
      abrirModal(modalId);
    });
  });

// Obtenemos los botones de las x para cerrar el modal
var elementosCerrarModal = document.querySelectorAll(".cerrar-modal");

elementosCerrarModal.forEach(function(elemento) {
    // Por cada elemento asignamos una funcion de cerrar el modal con su id
    elemento.addEventListener("click", function() {
      // Obtiene el id del modal
      var modalId = this.closest(".modal").id;
      cerrarModal(modalId);
    });
});

var elementosCancelarModal = document.querySelectorAll(".cancelar");

elementosCancelarModal.forEach(function(elemento) {
    // Por cada boton de cancelar le asignamos la funcion de cerrar el modal
    elemento.addEventListener("click", function() {
      // Obtiene el id del modal
      var modalId = this.closest(".modal").id;
      cerrarModal(modalId);
    });
});

// Cerrar el modal al hacer click en la parte opaca
window.onclick = function(event) {
    var modals = document.querySelectorAll(".modal");
    modals.forEach(function(modal) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
}