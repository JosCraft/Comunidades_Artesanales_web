import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function() {
    $('#buscar').on('keyup', function() {
        const filtro = $(this).val().toLowerCase();
        $('tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(filtro) > -1)
        });
    });
});
