import jQuery from 'jquery';
window.$ = jQuery;

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.querySelector('#datosModal');
    const showUserDetailsButtons = document.querySelectorAll('.show-user-details');
    const nombreInput = document.querySelector('#nombre');
    const apePaternoInput = document.querySelector('#apePaterno');
    const apeMaternoInput = document.querySelector('#apeMaterno');
    const emailInput = document.querySelector('#email');
    const celularInput = document.querySelector('#celular');
    const fechaNacInput = document.querySelector('#fechaNac');
    const ciInput = document.querySelector('#ci');  // Verifica que exista un input con id 'ci'
    const rolInput = document.querySelector('#rol');

    // Verificar si los elementos existen antes de intentar manipularlos
    if (!modal || !showUserDetailsButtons.length) {
        console.error('Modal or buttons not found.');
        return;
    }

    // Agregar el evento a cada botón
    showUserDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const user = JSON.parse(this.dataset.user);
            console.log(user); // Verificar que el JSON se está leyendo correctamente

            // Rellenar los campos del formulario
            nombreInput.value = user.nombre || '';
            apePaternoInput.value = user.apePaterno || '';
            apeMaternoInput.value = user.apeMaterno || '';
            emailInput.value = user.email || '';
            celularInput.value = user.celular || '';
            fechaNacInput.value = user.fechaNac || '';
            ciInput.value = user.ci || '';
            rolInput.value = user.rol || '';
        });
    });
});
