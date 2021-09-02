<?php

$em = new Employees();
$resultados = $em->buscar($_REQUEST['id']);


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modificar Funcionarios  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?param=inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Funcionarios</li>
                        <li class="breadcrumb-item active">Modificar</li>
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
                            <h3 class="card-title ">Modificar </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input id="id" type="text" class="form-control" value="<?php echo $resultados['em_id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input id="nombre" type="text" class="form-control" value="<?php echo $resultados['em_nombre']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input id="apellidos" type="text" class="form-control" value="<?php echo $resultados['em_apellido']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input id="correo" type="mail" class="form-control" value="<?php echo $resultados['em_correo']; ?>">
                                        </div>
                                    </div>



                            </div>
                            <div class="col-md-6">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input id="telefono" type="number" class="form-control" value="<?php echo $resultados['em_telefono']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select name="sexo" id="sexo" class="custom-select form-control-border border-width-2" required>

                                            <?php
                                            if ($resultados['em_sexo'] == "Hombre") {
                                            ?>
                                                <option value="">Seleccione</option>
                                                <option value="Hombre" selected>Hombre</option>
                                                <option value="Mujer"> Mujer</option>
                                            <?php
                                            }
                                            if ($resultados['em_sexo'] == "Mujer") {
                                            ?><option value="">Seleccione</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer" selected> Mujer</option>
                                            <?php # code...
                                            }
                                            if ($resultados['em_sexo'] == "") {

                                            ?>
                                                <option value="" selected>Seleccione</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer"> Mujer</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Rol Actual</label>
                                            <div class="form-group">
                                                <input class="form-control" disabled id="" value="<?php echo $resultados['roles_ro_id']?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Nuevo Rol</label>
                                                <select id="rol" name="rol" class="custom-select form-control-border border-width-2" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2"> Repartidor</option>

                                                </select>
                                            </div>

                                        </div>



                                    </div>



                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select id="estado" name="estado" class="custom-select form-control-border border-width-2" required>
                                            <option value="" selected>Seleccione</option>
                                            <option value="1">Activado</option>
                                            <option value="2"> Desactivado</option>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button id="btnmodificar" type="submit" class="btn btn-success">Confirmar</button>
                                        <button class="btn btn-danger">Cancelar</button>
                                    </div>
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