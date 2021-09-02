<?php
require_once "../../../models/Categorias.php";

$categorias = new Categorias();

$resultados = $categorias->listar();
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categorias </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?param=inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Categorias</li>

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
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Agregar Categorias</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data" role="form" method="post" action="../../../controllers/categoriasControllers.php?accion=agregar">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="img" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="custom-select form-control-border border-width-2">
                                        <option value="1">habilitar</option>
                                        <option value="2">Desabilitado</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tabla</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($resultados as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $r['cat_nombre'] ?></td>
                                            <td><img src="../../../resources/imagenes/<?= $r['cat_img'] ?>" width="50px"></td>
                                            <td><?= $r['cat_estado'] ?></td>
                                            <td>
                                                <a href="../../../controllers/categoriasControllers.php?accion=eliminar&id="<?= $r['cat_id'] ?>" class="btn btn-danger btn-circle "><i class="fas fa-trash"></i></a>
                                                <!--   <a class="btn btn-danger" href="?param=funcionarios_eliminar&id="><i class="far fa-trash-alt"></i></i></a> -->
                                                <a class="btn btn-warning" href="?param=funcionarios_modificar&id=<?= $r['cat_id'] ?>"><i class="fas fa-user-edit"></i></a>
                                            </td>
                                        </tr>


                                    <?php
                                    endforeach;
                                    ?>


                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    function eliminar(id) {
        var res = window.confirm("¿Realmente desea eliminar el Producto :" + id + "?");
        var id = a

        Swal.fire({
            title: '¿Desea eliminarlo?',
            showDenyButton: true,
            confirmButtonText: 'Si',


        }).then((result) => {
            if (result.isConfirmed) {

                location.href = "../../../controllers/categoriasControllers.php?accion=eliminar&id=" + id;
            }
        })
    }
</script>