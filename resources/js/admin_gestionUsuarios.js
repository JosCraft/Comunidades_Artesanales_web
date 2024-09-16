import jQuery from 'jquery';
window.$ = jQuery;

document.addEventListener('DOMContentLoaded', function() {

    const showUserDetailsButtons = document.querySelectorAll('.show-user-details');

    const nombreInput = document.querySelector('#nombre');
    const apePaternoInput = document.querySelector('#apePaterno');
    const apeMaternoInput = document.querySelector('#apeMaterno');
    const emailInput = document.querySelector('#email');
    const celularInput = document.querySelector('#celular');
    const fechaNacInput = document.querySelector('#fechaNac');
    const ciInput = document.querySelector('#ci');
    const rolInput = document.querySelector('#rol');

    const addRoleButton = document.querySelector('#add-role-btn');
    const rolesContainer = document.querySelector('#roles-container');

    // Función para mostrar el formulario según el rol seleccionado
    function toggleForms(rol, type) {
        // Oculta todos los formularios
        const adminForm = document.getElementById(type === 'edit' ? 'form-admin' : 'form-admin-crear');
        const comunarioForm = document.getElementById(type === 'edit' ? 'form-comunario' : 'form-comunario-crear');
        const deliveryForm = document.getElementById(type === 'edit' ? 'form-delivery' : 'form-delivery-crear');

        adminForm.style.display = 'none';
        comunarioForm.style.display = 'none';
        deliveryForm.style.display = 'none';

        // Muestra el formulario correspondiente
        if (rol == 1) {
            adminForm.style.display = 'block';
        } else if (rol == 3) {
            comunarioForm.style.display = 'block';
        } else if (rol == 4) {
            deliveryForm.style.display = 'block';
        }
    }

    // Función para rellenar los roles actuales en la sección de edición
    function populateRoles(roles) {
        rolesContainer.innerHTML = ''; // Limpiar los roles existentes
        roles.forEach(rol => {
            const roleSelect = document.createElement('div');
            roleSelect.classList.add('row', 'mb-3');
            roleSelect.innerHTML = `
                <label for="rol" class="col-md-4 col-form-label text-md-end">Rol</label>
                <div class="col-md-6">
                    <select class="form-select" name="roles[]">
                        <option value="1" ${rol == 1 ? 'selected' : ''}>Administrador</option>
                        <option value="2" ${rol == 2 ? 'selected' : ''}>Usuario</option>
                        <option value="3" ${rol == 3 ? 'selected' : ''}>Comunario</option>
                        <option value="4" ${rol == 4 ? 'selected' : ''}>Delivery</option>
                    </select>
                </div>
            `;
            rolesContainer.appendChild(roleSelect);
        });
    }

    // Evento para mostrar los detalles del usuario en el modal de edición
    showUserDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const user = JSON.parse(this.dataset.user);

            // Rellenar los campos del formulario de edición
            nombreInput.value = user.nombre || '';
            apePaternoInput.value = user.apePaterno || '';
            apeMaternoInput.value = user.apeMaterno || '';
            emailInput.value = user.email || '';
            celularInput.value = user.celular || '';
            fechaNacInput.value = user.fechaNac || '';
            ciInput.value = user.ci || '';

            // Rellenar los roles existentes
            populateRoles(user.roles);

            // Mostrar el formulario correspondiente según el primer rol del usuario
            toggleForms(user.roles[0], 'edit');
        });
    });

    // Agregar evento para el botón de "Agregar Rol"
    addRoleButton.addEventListener('click', function() {
        const newRoleSelect = document.createElement('div');
        newRoleSelect.classList.add('row', 'mb-3');
        newRoleSelect.innerHTML = `
            <label for="rol" class="col-md-4 col-form-label text-md-end">Rol adicional</label>
            <div class="col-md-6">
                <select class="form-select" name="roles[]">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                    <option value="3">Comunario</option>
                    <option value="4">Delivery</option>
                </select>
            </div>
        `;
        rolesContainer.appendChild(newRoleSelect);
    });

    // Manejar la selección de rol al crear un nuevo usuario
    const rolCrearInput = document.querySelector('#rol-crear');
    rolCrearInput.addEventListener('change', function() {
        toggleForms(this.value, 'crear');
    });

    // Manejar la selección de rol al editar un usuario
    const rolEditInput = document.querySelector('#rol');
    rolEditInput.addEventListener('change', function() {
        toggleForms(this.value, 'edit');
    });

});
