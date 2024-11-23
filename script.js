// Seleccionamos todas las tarjetas
const tarjetas = document.querySelectorAll('.tarjeta');

tarjetas.forEach((tarjeta) => {
  const idTarjeta = tarjeta.getAttribute('id'); // Obtenemos el ID único de la tarjeta
  const form = tarjeta.querySelector('form');

  form.addEventListener('click', async function (event) {
    if (event.target.tagName === 'BUTTON' || event.target.tagName === 'INPUT') {
      event.preventDefault(); // Evita el comportamiento predeterminado del formulario

      const accion = event.target.textContent.trim(); // Texto del botón pulsado
      const observaciones = form.querySelector('textarea[name="observaciones"]').value;

      // Crear un objeto FormData con los datos
      const formData = new FormData();
      formData.append('id', idTarjeta); // Usamos el data-id como identificador
      formData.append('accion', accion);
      formData.append('observaciones', observaciones);

      console.log('Datos enviados:', { idTarjeta, accion, observaciones }); // Para depuración

      try {
        const response = await fetch('procesar.php', {
          method: 'POST',
          body: formData,
        });

        if (response.ok) {
            const result = await response.text(); // Cambiar a .json() si el backend envía JSON
            document.getElementById('resultado'+idTarjeta).innerText = result;
        } else {
            document.getElementById('resultado'+idTarjeta).innerText = 'Error al enviar los datos';
        }
      } catch (error) {
        console.error('Error:', error);
        document.getElementById('resultado').innerText = 'Error de conexión';
      }
    }
  });
});
