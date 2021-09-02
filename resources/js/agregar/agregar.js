
//Agregar Funcionarios
$("#btnGuardar").click(function (e) {
    e.preventDefault();
    var nombre = $("#nombre").val();
    var apellidos = $("#apellidos").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var telefono = $("#telefono").val()
    var sexo = $("#sexo").val()
    var rol = $("#rol").val()
    var estado = $("#estado").val()

    if (nombre != "" && apellidos != "" && correo != "" && password != "" && telefono != "" && sexo != "" && rol != "" && estado != "") {

        datos = { "nombre": nombre, "apellidos": apellidos, "correo": correo, "password": password, "telefono": telefono, "sexo": sexo, "rol": rol, "estado": estado };

        $.ajax({
            url: '../../../controllers/employeesControllers.php?accion=agregar',
            type: 'POST',
            data: datos,
        }).done(function (respuesta) {
            console.log(respuesta);
            if (respuesta.estado === "agregado") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado',
                    showConfirmButton: false,
                    timer: 1500
                })

                $('#modal-sm').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000)
            }
        })

    } else {
        $('#nombre').removeClass('is-valid');
        $('#nombre').addClass('is-invalid');
        $('#apellidos').removeClass('is-valid');
        $('#apellidos').addClass('is-invalid');
        $('#correo').removeClass('is-valid');
        $('#correo').addClass('is-invalid');
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
        $('#telefono').removeClass('is-valid');
        $('#telefono').addClass('is-invalid');
        $('#sexo').removeClass('is-valid');
        $('#sexo').addClass('is-invalid');
        $('#rol').removeClass('is-valid');
        $('#rol').addClass('is-invalid');
        $('#estado').removeClass('is-valid');
        $('#estado').addClass('is-invalid');



    }

});
//valida correo
$("#correo").blur(function () {
    var correo = $("#correo").val();

    if (correo != "") {
        if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
            $('#correo').removeClass('is-valid');
            $('#correo').addClass('is-invalid');

        } else {
            datos = { "correo": correo };

            $.ajax({
                url: '../../../controllers/employeesControllers.php?accion=verificar',
                type: 'POST',
                data: datos,

            }).done(function (respuesta) {
                console.log(JSON.stringify(respuesta));
                if (respuesta.datos === "existe") {
                    $('#correo').removeClass('is-valid');
                    $('#correo').addClass('is-invalid');
                    console.log("correo ocupado")
                } if (respuesta.datos === "no existe") {
                    $('#correo').removeClass('is-invalid');
                    $('#correo').addClass('is-valid');
                    console.log("correo no ocupado")
                }
            })

        }

    } else {
        $('#correo').removeClass('is-valid');
        $('#correo').addClass('is-invalid');
    }
});
//valida correo de modificar
$("#mcorreo").blur(function () {
    var correo = $("#correo").val();

    if (correo != "") {
        if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
            $('#correo').removeClass('is-valid');
            $('#correo').addClass('is-invalid');

        } else {
            datos = { "correo": correo };

            $.ajax({
                url: '../../../controllers/employeesControllers.php?accion=verificar',
                type: 'POST',
                data: datos,

            }).done(function (respuesta) {
                console.log(JSON.stringify(respuesta));
                if (respuesta.datos === "existe") {
                    $('#correo').removeClass('is-valid');
                    $('#correo').addClass('is-invalid');
                    console.log("correo ocupado")
                } if (respuesta.datos === "no existe") {
                    $('#correo').removeClass('is-invalid');
                    $('#correo').addClass('is-valid');
                    console.log("correo no ocupado")
                }
            })

        }

    } else {
        $('#correo').removeClass('is-valid');
        $('#correo').addClass('is-invalid');
    }
});
$("#nombre").blur(function () {
    var nombre = $("#nombre").val();
    if (nombre.trim() != '') {
        $('#nombre').removeClass('is-invalid');
        $('#nombre').addClass('is-valid');
    } else {
        $('#nombre').removeClass('is-valid');
        $('#nombre').addClass('is-invalid');
    }

});
$("#apellidos").blur(function () {
    var apellidos = $("#apellidos").val();
    if (apellidos.trim() != '') {
        $('#apellidos').removeClass('is-invalid');
        $('#apellidos').addClass('is-valid');
    } else {
        $('#apellidos').removeClass('is-valid');
        $('#apellidos').addClass('is-invalid');
    }

});
$("#password").blur(function () {
    var dato = $("#password").val();
    if (dato.trim() != '') {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');
    } else {
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
    }

});
$("#telefono").blur(function () {
    var dato = $("#telefono").val();
    if (dato.trim() != '') {
        $('#telefono').removeClass('is-invalid');
        $('#telefono').addClass('is-valid');
    } else {
        $('#telefono').removeClass('is-valid');
        $('#telefono').addClass('is-invalid');
    }

});
$("#sexo").blur(function () {
    var dato = $("#sexo").val();
    if (dato.trim() != '') {
        $('#sexo').removeClass('is-invalid');
        $('#sexo').addClass('is-valid');
    } else {
        $('#sexo').removeClass('is-valid');
        $('#sexo').addClass('is-invalid');
    }

});
$("#rol").blur(function () {
    var dato = $("#rol").val();
    if (dato.trim() != '') {
        $('#rol').removeClass('is-invalid');
        $('#rol').addClass('is-valid');
    } else {
        $('#rol').removeClass('is-valid');
        $('#rol').addClass('is-invalid');
    }

});
$("#estado").blur(function () {
    var dato = $("#estado").val();
    if (dato.trim() != '') {
        $('#estado').removeClass('is-invalid');
        $('#estado').addClass('is-valid');
    } else {
        $('#estado').removeClass('is-valid');
        $('#estado').addClass('is-invalid');
    }

});

