const tablaSitios = document.getElementById('tabla-sitios');
const formularioAgregar = document.getElementById('formulario-agregar');
const seleccionOpciones = document.getElementById('mostar-lista');


function cargarTabla() {
  fetch('../terminado/modelo_sitios/obtener_sitios.php') 
    .then(response => response.text())
    .then(data => {
        tablaSitios.innerHTML = data;
    });
}


function cargarFormulario(){
  fetch('../terminado/modelo_sitios/mostrar_lista.php') 
    .then(response => response.text())
    .then(data => {
      seleccionOpciones.innerHTML = data;
    });
}

 function agregarRegistro(event) {
   event.preventDefault();
   const formData = new FormData(formularioAgregar);
   fetch('../terminado/modelo_sitios/agregar_sitio.php', {
     method: 'POST',
     body: formData
   })
     .then(response => response.text())
     .then(data => {
        tablaSitios.innerHTML = data;
        cargarTabla();
        cargarFormulario();
        formularioAgregar.style.display = "none";
     });
 }


 function eliminar(id) {
    if (confirm("¿Está seguro de que desea eliminar este registro?")) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("tabla-sitios").innerHTML = this.responseText;
        }
      };
      xhttp.open("POST", "../terminado/modelo_sitios/eliminar_sitio.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id);
      cargarTabla();
    }
  }

cargarTabla();
cargarFormulario();

formularioAgregar.addEventListener('submit', agregarRegistro);


var btnMostrarFormulario = document.getElementById("btnMostrarFormulario");


btnMostrarFormulario.addEventListener("click", function() {
  cargarFormulario();
    formularioAgregar.style.display = "block";
});


function abrirVentana() {
  // Abrir una nueva ventana con la página que contiene la tabla
  window.open("Categorias.html", "Categorias", "width=600,height=400");
}
