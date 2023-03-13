const tablaCategorias = document.getElementById('tabla-categorias');
const formularioAgregarC = document.getElementById('formulario-agregar-c');


function cargarTablaCategorias() {
    fetch('../terminado/modelo_categorias/obtener_categorias.php') 
      .then(response => response.text())
      .then(data => {
        tablaCategorias.innerHTML = data;
      });
  }

  function agregarRegistroCategoria(event) {
    event.preventDefault();
    const formData = new FormData(formularioAgregarC);
    fetch('../terminado/modelo_categorias/agregar_categoria.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        tablaCategorias.innerHTML = data;
        cargarTablaCategorias();
         formularioAgregarC.style.display = "none";
      });
  }

  function eliminar(id) {
    if (confirm("¿Está seguro de que desea eliminar esta categoria?")) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("tabla-categorias").innerHTML = this.responseText;
        }
      };
      xhttp.open("POST", "../terminado/modelo_categorias/eliminar_categoria.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id);
      cargarTablaCategorias();
    }
  }

  cargarTablaCategorias();

  formularioAgregarC.addEventListener('submit', agregarRegistroCategoria);
  var btnMostrarFormularioC = document.getElementById("btnMostrarFormularioC");

  btnMostrarFormularioC.addEventListener("click", function() {
    formularioAgregarC.style.display = "block";
  });