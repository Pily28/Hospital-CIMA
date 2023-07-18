function seleccionarSexo() {
  const combo = document.querySelector("select");
  const opcionSeleccionada = combo.value;
  console.log("Opción seleccionada: " + opcionSeleccionada);
}

function seleccionarEstadoCivil() {
  const combo = document.querySelector("select");
  const opcionSeleccionada = combo.value;
  console.log("Opción seleccionada: " + opcionSeleccionada);
}

// Function to earase all of the input fields
function limpiar() {
  document.getElementById("nombre").value = "";
  document.getElementById("primer-apellido").value = "";
  document.getElementById("segundo-apellido").value = "";
  document.getElementById("identificacion").value = "";
  document.getElementById("sexo").value = "";
  document.getElementById("tratamiento").value = "";
  document.getElementById("birt-date").value = "";
  document.getElementById("si").value = "";
  document.getElementById("no").value = "";
  document.getElementById("estado-civil").value = "";
}

// Añadir un input usuario, contraseña, botón añadir y cancelar
