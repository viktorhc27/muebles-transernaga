$("#login").click(function (e) {
	//evita la recarga de la pagina debido al form
	e.preventDefault();

	var correo = $("#correo").val();
	var password = $("#password").val();


	if (correo.trim() != "" && password.trim() != "") {


		datos = { "correo": correo, "password": password };

		$.ajax({
			url: "controllers/employeesControllers.php?accion=login",
			type: "POST",
			data: datos
		}).done(function (respuesta) {
			
			if (respuesta.estado === "ok") {
				
				//console.log(JSON.stringify(respuesta));

				$('#button').addClass('text-center');
				$('#button').html("<div class='spinner-border text-primary' role='status'> <span class='sr-only'>Loading...</span></div>");
				setTimeout(function () {//se agrega 2 segundos de carga
					window.location.replace("views/admin/home/home.php?param=inicio");
				}, 2000)
			}
			if (respuesta.estado === "password incorrecta") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Contraseña incorrecta',
				})

			}
			if (respuesta.estado === "datos invalidos") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Datos Erroneos',

				})

			}
			else {
				/* alert("error");
				alert(JSON.stringify(respuesta)); */

			}
		});
	} else {
		validar(correo, password);
	}
});

function validar(correo, password) {
	if (correo.trim() != "" && password.trim() == "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una contraseña!',
		})
	}
	if (correo.trim() == "" && password.trim() != "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una correo!',
		})
	}

	if (correo == "" && password.trim() == "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una Dato!',

		})
	}
}

