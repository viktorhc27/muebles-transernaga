function alertaE(a){
    
eliminar(a)
}

function eliminar(a){
    var id = a 

    Swal.fire({
        title: '¿Desea eliminarlo?',
        showDenyButton: true,
        confirmButtonText: 'Si',


    }).then((result) => {
        if (result.isConfirmed) {
            datos = { "id": id };
            $.ajax({
                url: '../../../controllers/employeesControllers.php?accion=eliminar',
                type: 'POST',
                data: datos,
            }).done(function (respuesta) {
                if (respuesta.estado === "eliminado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'ELIMINADO',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(function () {
                        location.reload();
                    }, 1000)
                }
            })
        }
    })

}
/* $(".eliminar").click(function () {
    var id = $(this).data('id');

    Swal.fire({
        title: '¿Desea eliminarlo?',
        showDenyButton: true,
        confirmButtonText: 'Si',


    }).then((result) => {
        if (result.isConfirmed) {
            datos = { "id": id };
            $.ajax({
                url: '../../../controllers/employeesControllers.php?accion=eliminar',
                type: 'POST',
                data: datos,
            }).done(function (respuesta) {
                if (respuesta.estado === "eliminado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'ELIMINADO',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(function () {
                        location.reload();
                    }, 1000)
                }
            })
        }
    })




});  */