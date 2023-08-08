function verCitas() {
    window.location.href = "../database/Citas.php";
}


// Obtener el botón por su identificador y agregar el evento de clic
document.getElementById("ver-citas-btn").addEventListener("click", verCitas);


// Esperar a que el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtener la referencia a la imagen y a la lista desplegable
    var profileImg = document.getElementById('profile-img');
    var optionsList = document.getElementById('options-list');

    // Ocultar la lista desplegable al cargar la página
    optionsList.style.display = 'none';

    // Manejar el evento de clic en la imagen
    profileImg.addEventListener('click', function() {
      // Alternar la visibilidad de la lista desplegable al hacer clic en la imagen
      if (optionsList.style.display === 'none') {
        optionsList.style.display = 'block';
      } else {
        optionsList.style.display = 'none';
      }
    });
  });