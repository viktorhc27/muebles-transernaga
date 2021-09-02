
$("#btnmodificar").click(function (e) {
    e.preventDefault();
    var id = $('#id').val();
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var correo = $('#correo').val();
    var telefono = $('#telefono').val();
    var sexo = $('#sexo').val();
    var rol = $('#rol').val();
    var estado = $('#estado').val();
    
    datos = { "id": id, "nombre": nombre, "apellidos": apellidos, "correo": correo, "telefono": telefono, "sexo": sexo, "rol": rol, "estado": estado };
    $.ajax({
        url: '../../../controllers/employeesControllers.php?accion=modificar',
        type: 'POST',
        data: datos,
    }).done(function (respuesta) {
       console.log(respuesta);
        if (respuesta.info === "ok") {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Modificado',
                showConfirmButton: false,
                timer: 1500
            })

            $('#modal-m').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000)
            
        }
    });
});
function alertaM(a){
    
    buscar(a)
    }
    
function buscar(a){
    var id = a;


    datos = { "id": id };

    $.ajax({
        url: "../../../controllers/employeesControllers.php?accion=buscar",
        type: "POST",
        data: datos
    }).done(function (respuesta) {
        /* console.log(JSON.stringify(respuesta)); */
        $('#m_id').val(respuesta.id);
        $('#m_nombre').val(respuesta.nombre);
        $('#m_apellidos').val(respuesta.apellidos);
        $('#m_correo').val(respuesta.correo);
        $('#m_telefono').val(respuesta.telefono);
        $('#m_sexo').val(respuesta.sexo);
        $('#m_rol').val(respuesta.rol);
        $('#m_estado').val(respuesta.estado);
    });

}
