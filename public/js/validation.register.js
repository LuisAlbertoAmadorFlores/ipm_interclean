let edad, codigoPostal, telefono, curp, nss;

edad = document.getElementById('edad');
codigoPostal = document.getElementById('codigoPostal');
telefono = document.getElementById('telefono');
curp = document.getElementById('CURP');
nss = document.getElementById('NSS');
rfc = document.getElementById('RFC');

edad.addEventListener('input', function () {
    if (this.value.length > 2)
        this.value = this.value.slice(0, 2);
})

codigoPostal.addEventListener('input', function () {
    if (this.value.length > 5)
        this.value = this.value.slice(0, 5);
})

telefono.addEventListener('input', function () {
    if (this.value.length > 10)
        this.value = this.value.slice(0, 10);
})

curp.addEventListener('input', function () {
    if (this.value.length > 18)
        this.value = this.value.slice(0, 18);
})

nss.addEventListener('input', function () {
    if (this.value.length > 11)
        this.value = this.value.slice(0, 11);
})

rfc.addEventListener('input', function () {
    if (this.value.length > 13)
        this.value = this.value.slice(0, 13);
})

codigoPostalRFC.addEventListener('input', function () {
    if (this.value.length > 5) {
        this.value = this.value.slice(0, 5)
    }
})

telefono_emergencia.addEventListener('input', function () {
    if (this.value.length > 10)
        this.value = this.value.slice(0, 10);
})

clabe.addEventListener('input', function () {
    if (this.value.length > 18)
        this.value = this.value.slice(0, 18);
})

cuenta.addEventListener('input', function () {
    if (this.value.length > 18)
        this.value = this.value.slice(0, 18);
})

tarjeta.addEventListener('input', function () {
    if (this.value.length > 16)
        this.value = this.value.slice(0, 16);
})

codigoEliminacion.addEventListener('input', function () {
    if (this.value.length > 8)
        this.value = this.value.slice(0, 8);
})


// cuip.addEventListener('input', function () {
//     if (this.value.length > 0)
//         this.value = this.value.slice(0, 10);

// })
