function handleBlur(rut) {
    // Verificar si el campo tiene contenido antes de llamar a formatRut
    if (rut.value.trim() !== '') {
        formatRut(rut);
    }
}

function formatRut(rut) {
    var valor = rut.value.replace(/\./g, '').replace(/\-/g, '');

    if (valor.length > 9) {
        valor = valor.substring(0, 9);
    }

    while (valor.length < 9) {
        valor = '0' + valor;
    }

    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    var cuerpoFormateado = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    rut.value = cuerpoFormateado + '-' + dv;

    if (valor.length < 7 || valor.length > 9) {
        rut.setCustomValidity("RUT Incompleto o Demasiado Largo");
    } else {
        rut.setCustomValidity('');
    }
}




document.getElementById('reg_email').addEventListener('blur', function() {
    var emailInput = this.value;
    var allowedDomains = ['outlook.com', 'gmail.com', 'gmail.cl', 'hotmail.com', 'alumnos.santotomas.cl'];
    var validDomain = false;

    for (var i = 0; i < allowedDomains.length; i++) {
        if (emailInput.endsWith('@' + allowedDomains[i])) {
            validDomain = true;
            break;
        }
    }

    if (validDomain) {
        document.getElementById('email-error').textContent = '';
        this.setCustomValidity('');
    } else {
        document.getElementById('email-error').textContent = ' El dominio de correo electrónico no es válido';
        this.setCustomValidity('El dominio de correo electrónico no es válido');
    }
});


