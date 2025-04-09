$(document).ready(function () {
    // Handler for .ready() called.
    $('#inputsearchcc').hide();
    let identicacion = document.getElementById('identificacion').files;

    $('.select-input').click(function () {
        console.log(identicacion);
        let item = window.getComputedStyle(document.querySelector(this, '::before'));
        item.bakcgroundColor = 'red';
    });

    function vacio() {
        var archivoInput = document.getElementById('archivoInput');
        if (archivoInput.value == "") {
            alert('Seleccione un Archivo');
            return false;
        }
    }

    
});