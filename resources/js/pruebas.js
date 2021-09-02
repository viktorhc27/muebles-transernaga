$(document).ready(function () {
    $('#login').click(function () {

        var correo = document.getElementById("correo").value;
        var password = document.getElementById("password").value;

        if (correo == "") {

            $('#alerta').html(" <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Alerta!</strong> el campo CORREO no debe estar vacio</div> <br>");

        } if (password == "") {

            $('#alerta1').html(" <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Alerta!</strong> el campo CONTRASEÑA no debe estar vacio</div> <br>");
        } else {
            var datos = "correo=" + correo + "&password=" + password;
            if (correo.trim() != '' && password.trim() != '') {
                $('#button').addClass('text-center');
                $('#button').html("<div class='spinner-border text-primary' role='status'> <span class='sr-only'>Loading...</span></div>");
                $.ajax({
                    url: 'controllers/employeesControllers.php?accion=login',
                    type: 'POST',
                    data: datos,
                })
                    .done(function (respuesta) {

                        if (!respuesta.error) {
                            setTimeout(function () {
                                window.location.replace("views/admin/home/home.php?param=inicio");
                            }, 3000)

                        }else{
                            console.log("error");
                        }

                    })
                    .fail(function (resp) {
                        
                    });




            }
        }

    });
});