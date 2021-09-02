<link rel='stylesheet' href='../../../resources/spectrum/spectrum.css' />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar Color </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?param=inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item active">Color</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Agregar color </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="../../../controllers/coloresControllers.php?accion=agregar">
                                    <div class="card-body">
                                        <div class="form-group">

                                            <div id="color">
                                                <label>Realize el color</label><br>
                                                <input id="color" type='text' class="colores form-control" />
                                                <br>
                                                <label>Nombre de color</label>
                                                <input type="text" id="nombrecolor" class="form-control" name="nombre" disabled >
                                                <br>
                                                <label>Codigo</label>
                                                <input type="text" id="codigo" class="form-control" name="codigo" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">enviar</button>
                                </form>
                            </div>



                        </div>


                    </div>


                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<script src='../../../resources/spectrum/spectrum.js'></script>

<script type="text/javascript" src="https://chir.ag/projects/ntc/ntc.js"></script>
<script>
    $("#btndGuardar").click(function(e) {
//commit de prueba
        e.preventDefault();
        var nombre = $("#nombrecolor").val();
        var codigo = $("#codigo").val();

        datos = {
            "nombre": nombre,
            "codigo": codigo
        };

        $.ajax({

            url: '../../../controllers/coloresControllers.php?accion=agregar',
            type: 'POST',
            data: datos,
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta.datos === "agregado") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado',
                    showConfirmButton: false,
                    timer: 1500
                })


                /* setTimeout(function() {
                    location.reload();
                }, 1000) */
            }
        })



    });
    $(".colores").spectrum({
        preferredFormat: "hex",
        showInput: true,
        showPalette: true,
        palette: [
            ["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]
        ]
    });

    $('.sp-choose').click(function() {

        var color = $(".sp-input").val();
        console.log("color es:" + color);
        var ColorCode = "#0bbd9f";

        // 2. Califica el color usando NTC
        var ntcMatch = ntc.name(color);

        // 3. Maneja el resultado. La biblioteca devuelve una matriz con el color identificado.

        // 3.Un valor RGB de coincidencia más cercana, por ejemplo#01826B
        console.log(ntcMatch[0]);
        // Cadena de texto: nombre del color, p. Ej. "Deep Sea"
        console.log(ntcMatch[1]);
        // Verdadero si el color coincide exactamente, un booleano
        console.log(ntcMatch[2]);

        $('#nombrecolor').val(ntcMatch[1]);
        $('#codigo').val(ntcMatch[0]);



    })
</script>