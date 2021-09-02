<?php

require_once  "../../../models/Colores.php";
require_once  "../../../models/Tipo_armados.php";
require_once  "../../../models/Categorias.php";
require_once  "../../../models/Despachos.php";
require_once  "../../../models/Marcas.php";
require_once  "../../../models/Estados_productos.php";
$t = new Tipo_armados();
$p = new Colores();
$c = new Categorias();
$d = new Despachos();
$m = new Marcas();
$e = new Estados_productos();

$colores = $p->listar();
$tipo_armado = $t->listar();
$categoria = $c->listar();
$despachos = $d->listar();
$marcas = $m->listar();
$estado = $e->listar();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar Producto</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?param=inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item active">Agregar</li>
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
                            <h3 class="card-title ">Agregar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">
                                <form enctype="multipart/form-data" action="../../../controllers/productosControllers.php?accion=agregar" method="post">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input id="p_nombre" name="nombre" type="text" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="p_descripcion" name="descripcion" rows="2" cols="20" placeholder="Descripcion"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Precio Compra</label>
                                                    <input id="p_compra" name="precio_compra" type="number" class="form-control" class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Precio Venta</label>
                                                    <input id="p_venta" name="precio_venta" type="number" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Modelo 3D</label>
                                                    <input type="file" name="modelo" class="form-control-file" id="fichero">
                                                    <p id="texto"> </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Imagen</label>
                                                    <input type="file" name="imagen" class="form-control-file" id="p_imagen">
                                                </div>
                                            </div>

                                        </div>


                                        <div class=" row">
                                            <div class="colores col-md-6">
                                                <div class="form-group2">
                                                    <label>Color</label>
                                                    <input id="p_color" name="color" type="text" class="form-control" value="">


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de armado</label>
                                                <select id="p_armado" name="tipo_armado" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <?php
                                                    foreach ($tipo_armado as $c) :

                                                    ?>
                                                        <option value="<?= $c['tip_id'] ?>"><?= $c['tip_nombre'] ?></option>


                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select id="p_categoria" name="categoria" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <?php
                                                    foreach ($categoria as $c) :

                                                    ?>
                                                        <option value="<?= $c['cat_id'] ?>"><?= $c['cat_nombre'] ?></option>


                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo Despacho</label>
                                                <select id="p_despachos" name="tipo_despacho" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <?php
                                                    foreach ($despachos as $c) :

                                                    ?>
                                                        <option value="<?= $c['des_id'] ?>"><?= $c['des_nombre'] ?></option>


                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Marca</label>
                                            <div class="form-group">
                                                <select id="p_marca" name="marca" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <?php
                                                    foreach ($marcas as $c) :

                                                    ?>
                                                        <option value="<?= $c['ma_id'] ?>"><?= $c['ma_nombre'] ?></option>


                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Estado</label>
                                                <select id="p_estado" name="estado" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <?php
                                                    foreach ($estado as $c) :

                                                    ?>
                                                        <option value="<?= $c['ep_id'] ?>"><?= $c['ep_nombre'] ?></option>


                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Altura</label>
                                                <input id="p_altura" type="number" name="altura" class="form-control" value="<?php echo $resultados['em_correo']; ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input id="p_stock" type="number" name="stock" class="form-control" value="">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Profundidad</label>
                                                <input id="p_profundidad" type="number" name="profundidad" class="form-control" value="">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Peso</label>
                                                <input id="p_peso" name="peso" type="number" class="form-control" value="<?php echo $resultados['em_apellido']; ?>">
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ancho</label>
                                                <input id="p_ancho" name="ancho" type="text" class="form-control" value="">
                                            </div>

                                        </div>
                                    </div>



                                </div>

                            </div>



                            <div class="card-footer">
                                <button type="submit" id="btnProductos" class="btn btn-primary">Agregar</button>
                                <button class="btn btn-default">Cancelar</button>
                            </div>
                            </form>
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
<!-- Js de validacion -->
<script src="../../../resources/js/agregar/agregar_productos.js"></script>

<script>
    $("#mas").click(function() {
        var colores = <?= json_encode(
                            $colores,
                            JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS
                        ) ?>;
        console.log(colores)
        for (var i = 0; i < colores.length; i++) {
            for (var j = 0; j < colores.length; j++) {
                $(".colores").append($(".form-group2").append("<select id='p_colores' class='custom-select form-control-border border-width-2' name='colores' style='width: 100%;'>"));
                console.log(colores[i][j]);
            }
        }

    });
</script>
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Agregado',
        showConfirmButton: false,
        timer: 1500
    })
</script>