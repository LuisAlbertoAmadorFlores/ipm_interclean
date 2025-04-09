Livewire.on('updateStatus', function (message) {
    Swal.fire({
        title: "Cambio Exitoso",
        text: message,
        icon: "success"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': document.getElementById('idTarjetaDelete').innerHTML
            }]);
        }
    });
})

Livewire.on('turnado', function (message) {
    Swal.fire({
        title: "Turnado Exitoso",
        text: message,
        icon: "success"
    });
})

Livewire.on('paselista', function (message) {
    Swal.fire({
        title: "Pase de Lista Exitoso",
        text: message,
        icon: "success"
    });
})



Livewire.on('updateDocumento', function (message) {
    Swal.fire({
        title: "Cambio Exitoso",
        text: message,
        icon: "success"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': document.getElementById('idTarjetaUpdate').innerHTML
            }]);
        }
    });
})

Livewire.on('Personales', function (message) {
    Swal.fire({
        title: "Actualización Exitosa",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': document.getElementById('idTarjetaUpdate').innerHTML
            }]);
        }
    });
})

Livewire.on('Laborales', function (message) {
    Swal.fire({
        title: "Actualización Exitosa",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': document.getElementById('idTarjetaUpdate').innerHTML
            }]);
        }
    });
})

Livewire.on('Registro', function (message) {
    Swal.fire({
        title: "Registro Exitoso",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    });
})


Livewire.on('successdocument', function (message) {
    Swal.fire({
        title: "Registro Exitoso!",
        text: message,
        icon: "success"
    });
})


Livewire.on('usuario', function (message) {
    Swal.fire({
        title: "Usuario creado!",
        text: message,
        icon: "success"
    });
})

Livewire.on('registroProspecto', function (message) {
    Swal.fire({
        title: "Registro Exitoso",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    });
})

Livewire.on('asigaTurnoCorrecto', function (message) {
    Swal.fire({
        title: "Asignacion Exitosa",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    });
})

Livewire.on('incidenciaCreada', function (message) {
    Swal.fire({
        title: "Registro Exitoso",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    });
})

Livewire.on('autorizacion', function (message) {
    Swal.fire({
        title: "Cuenta Autorizada",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    });
})

Livewire.on('bajaCompleta', function (message) {
    Swal.fire({
        title: "Baja Realizada",
        text: message,
        icon: "success",
        confirmButtonText: 'Listo'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('updatebajas');
        }
    });
})


Livewire.on('colaboradorExistente', function (message) {
    Swal.fire({
        title: "Colaborador Encontrado!",
        text: message,
        icon: "info"
    });
})

Livewire.on('errorDatosPersonales', function (message) {
    Swal.fire({
        title: "Error, rectificar!",
        text: message,
        icon: "error"
    });
})

Livewire.on('errorDatosLaborales', function (message) {
    Swal.fire({
        title: "Error, rectificar!",
        text: message,
        icon: "error"
    });
})

Livewire.on('errorDocumentos', function (message) {
    Swal.fire({
        title: "Registro Exitoso!",
        text: message,
        icon: "success"
    });
})

Livewire.on('errorCreateColaborador', function (message) {
    Swal.fire({
        title: "Error, rectificar!",
        text: message,
        icon: "error"
    });
})

Livewire.on('errorturnado', function (message) {
    Swal.fire({
        title: "Error!",
        text: message,
        icon: "error"
    });
})

Livewire.on('alertaLista', function (message) {
    Swal.fire({
        title: "Atencion!",
        text: message,
        icon: "info"
    });
})

Livewire.on('descuento', function (message) {
    Swal.fire({
        title: "Descuento",
        text: message,
        icon: "info"
    });
})

Livewire.on('Nomina_turnada', function (message) {
    Swal.fire({
        title: "Nomina",
        text: message,
        icon: "success"
    });
})


Livewire.on('Nomina_existe', function (message) {
    Swal.fire({
        title: "Nomina",
        text: message,
        icon: "info"
    });
})

Livewire.on('PagoExtra', function (message) {
    Swal.fire({
        title: "Pago Extra",
        text: message,
        icon: "success"
    });
})

Livewire.on('excelAcept', function (message) {
    Swal.fire({
        title: "Excel Cargado",
        text: message,
        icon: "success"
    });
})

Livewire.on('excelError', function (message) {
    Swal.fire({
        title: "Error Excel",
        text: message,
        icon: "error"
    });
})


//Tomar un Colaborador
Livewire.on('tomarColaborador', function (message) {
    Swal.fire({
        title: "¿Deseas tomar al colabordaor con ID: " + message['idColaborador'] + "?",
        icon: "question",
        confirmButtonText: "Aceptar",
        showDenyButton: true,
        denyButtonText: `No quiero`
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('updateAllColaboradores', message)
        }
    })
})

Livewire.on('aceptcolaborador', function () {
    Swal.fire({
        title: "Colaborador Tomado",
        icon: "success",
        confirmButtonText: "Aceptar",
    })
})

//juridico Finiquitos

Livewire.on('finiquito', function (message) {
    Swal.fire({
        title: "¿Deseas registar el finiquito?",
        icon: "warning",
        confirmButtonText: "Aceptar",
        showDenyButton: true,
        denyButtonText: `No quiero`
    }).then((result) => {
        if (result.isConfirmed) {
            if (result.isConfirmed) {
                Livewire.emit('updateFiniquto', message)
            }
        }
    })
})

Livewire.on('finiquitoregistrado', function () {
    Swal.fire({
        title: "Finiquito Asignado",
        icon: "success",
        confirmButtonText: "Aceptar",
    }).then((result) => {
        if (result.isConfirmed) {
            if (result.isConfirmed) {
                Livewire.emit('updateFiniqutoEstatus')
            }
        }
    })
})

//Validacion de INE

Livewire.on('inevalidada', function (message) {
    Swal.fire({
        title: "INE Validada",
        icon: "success",
        confirmButtonText: "Aceptar",
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('inevalida', message)
        }
    })
})

Livewire.on('inerechazada', function (message) {
    Swal.fire({
        title: "INE Rechazada",
        icon: "success",
        confirmButtonText: "Aceptar",
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('inevalida', message)
        }
    })
})

//Autorizacion de Usuario

Livewire.on('autorizarCuenta', function (message) {
    Swal.fire({
        title: "¿Deseas autorizar la cuenta?",
        icon: "warning",
        confirmButtonText: "Aceptar",
        showDenyButton: true,
        denyButtonText: `No quiero`
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('autorizarContrato', message)
        }
    })
})

Livewire.on('ContratoAutorizado', function (message) {
    Swal.fire({
        title: "Autorizacion Correcta",
        text: message,
        icon: "success",
        confirmButtonText: "Aceptar",
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('updatePlantilla', message)
        }
    })
})

Livewire.on('ContratoAutorizadoError', function (message) {
    Swal.fire({
        title: "Error",
        icon: "error",
        text: message,
        confirmButtonText: "Aceptar",
    })
})

//Control de Mensajes Emergentes
Livewire.on('logout', function () {
    localStorage.setItem('flatView', '0');

})

//Comprobante de Capacitacion
Livewire.on('cargaExitosa', function () {
    Swal.fire({
        title: "Documento Adjuntado",
        icon: "success",
        confirmButtonText: "Aceptar",
    })
})

//Contratos Busqueda
Livewire.on('errorBusquedaInput', function () {
    Swal.fire({
        title: "Ingresa información",
        icon: "error",
        confirmButtonText: "Aceptar",
    })
})

//Validacion Correo
Livewire.on('Correocorrecto', function (message) {
    Swal.fire({
        title: "Ingresa información",
        icon: "success",
        text: message,
        confirmButtonText: "Aceptar",
    })
})

Livewire.on('CorreoIncorrecto', function (message) {
    Swal.fire({
        title: "Ingresa información",
        icon: "error",
        text: message,
        confirmButtonText: "Aceptar",
    })
})



