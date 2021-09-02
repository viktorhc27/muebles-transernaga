function estado(id, estado) {

    Swal.fire({
        title: '¿Desea Cambiar el estado?',
        showDenyButton: true,
        confirmButtonText: 'Si',


    }).then((result) => {
        if (result.isConfirmed) {


            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Cambiado',
                showConfirmButton: false,
                timer: 1500
            })

            if (estado == 2) {
                nuevo = 1;
            }
            if (estado == 1) {
                nuevo = 2
            }

            location.href = "../../../Controllers/productosControllers.php?accion=cambiar&id=" + id + "&estado=" + nuevo;


        }
    })
}

//Editar        
$(document).on("click", ".btnEditar", function() {
    opcion = 2; //editar
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
    precio_compra = fila.find('td:eq(2)').text();
    precio_venta = fila.find('td:eq(3)').text();
    marca = fila.find('td:eq(4)').text();
    categoria = fila.find('td:eq(5)').text();
    stock = parseInt(fila.find('td:eq(6)').text());
    img = fila.find('td:eq(7)').text();
    
    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#p_compra").val(precio_compra);
    $("#p_venta").val(precio_venta);
    $("#marca").val(marca);
    $("#categoria").val(categoria);
    $("#stock").val(stock);
    $("#img").val(img);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Producto");
    $('#modalCRUD').modal('show');
});