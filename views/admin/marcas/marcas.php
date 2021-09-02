<?php
require_once "../../../models/Marcas.php";
$marcas = new Marcas();
$resultados = $marcas->listar();

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Marcas </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?param=inicio">Inicio</a></li>
            <li class="breadcrumb-item">Marcas</li>

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
              <h3 class="card-title">Agregar Marca</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" role="form" action="../../../controllers/marcasControllers.php?accion=agregar" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" name="img" class="form-control" id="imagen">
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
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($resultados as $r) : ?>
                    <tr>
                      <td><?= $r['ma_nombre'] ?></td>
                      <td><img src="../../../resources/imagenes/<?= $r['ma_img'] ?>" width="50px"></td>
                      <td><button onclick="alertaE(<?= $p['em_id'] ?>)" class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
                        <a class="btn btn-warning" href="?param=funcionarios_modificar&id=<?= $p['em_id'] ?>"><i class="fas fa-user-edit"></i></a>
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