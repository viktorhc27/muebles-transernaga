<?php
require_once "../../../models/Marcas.php";
require_once "../../../models/Categorias.php";

$c = new Categorias();
$m = new Marcas();

$categoria = $c->listar();
$marcas = $m->listar();

$pro = new Productos();
$resultados = $pro->listar();



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Productos</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Inicio</a></li>
						<li class="breadcrumb-item ">Productos</li>
						<li class="breadcrumb-item active">Productos</li>
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
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<a href="?param=productos_agregar" class="btn btn-default"><span><i class="far fa-plus-square"></i></span> Agregar</a>

							<!-- <div class="btn-group pull-right">
								<button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-expanded="false">Acciones</button>
								<ul class="dropdown-menu">
									<li><a href="edit_product.php?id=10"><i class="fa fa-edit"></i> Editar</a></li>
									<li><a href="#" data-toggle="modal" data-target="#barcodeModal" data-id="10" data-product_code="L-MAC-P256" data-product_name="MAC PRO 256 "><i class="fa fa-barcode"></i> Código de barra</a></li>
									<li><a href="#" onclick="eliminar('10')"><i class="fa fa-trash"></i> Borrar</a></li>
								</ul>
							</div> -->
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Precio-Compra</th>
										<th>Precio-Venta</th>
										<th>Marcas</th>
										<th>Categoria</th>
										<!-- <th>Modelo</th> -->
										<th>Stock</th>
										<th>Imagen</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($resultados as $p) :
										$marcas = (new Marcas())->buscar($p['marcas_ma_id']);
										$categorias = (new Categorias())->buscar($p['categoria_cat_id']);


									?><tr>
											<td><?= $p['pro_id'] ?></td>
											<td><?= $p['pro_nombre'] ?></td>
											<td><?= $p['pro_precio_compra'] ?></td>
											<td><?= $p['pro_precio_venta'] ?></td>
											<td><?= $marcas['ma_nombre'] ?></td>
											<td><?= $categorias['cat_nombre'] ?></td>
											<!-- <td>
												<model-viewer src="../../../resources/modelos3d/<?= $p['pro_modelo'] ?>" camera-controls auto-rotate ar ar-modes="webxr scene-viewer quick-look">

													<div class="progress-bar hide" slot="progress-bar">
														<div class="update-bar"></div>
													</div>
													<button slot="ar-button" id="ar-button">
														View in your space
													</button>

												</model-viewer>
											</td> -->
											<td>
												<?= $p['pro_stock'] ?>
											</td>
											<td>
												<img src="../../../resources/imagenes/<?= $p['pro_img'] ?>" width="100px">
											</td>
											<td>

												<?php if ($p['estados_productos_ep_id'] == 1) {
													echo "<i style='font-size:30px; color:green' class='fas fa-toggle-on'></i>";
												} else {
													echo "<i style='font-size:30px; color:red' class='fas fa-toggle-off'></i>";
												}
												?>

											</td>
											<td>
												<button onclick="estado(<?= $p['pro_id'] ?>,<?= $p['estados_productos_ep_id'] ?>);" class="btn btn-danger"><i class="fas fa-wrench"></i></button>

												<button class="btn btn-warning btnEditar" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-user-edit"></i></button>

											</td>
										</tr>
									<?php
									endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<!-- Modal Editar -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-4">
							<div class="form-group">
								<label>
									id:
									<input type="text" class="form-control" id="id" disabled>
									Nombre:
									<input type="text" class="form-control" id="nombre">
								</label>

								<label>
									Nueva Imagen
									<input type="file" id="img">
								</label>

							</div>

						</div>

						<div class="col-4">
							<div class="form-group">

								<label>
									Precio Venta:
									<input type="text" class="form-control" id="p_venta">
								</label>
								<label>
									Categoria Actual
									<input type="text" class="form-control" id="categoria" disabled>
									Categoria Nueva
									<select class="form-control" id="categoria">
										<option value="" selected>Seleccione</option>
										<?php
										foreach ($categoria as $c) :

										?>
											<option value="<?= $c['cat_id'] ?>"><?= $c['cat_nombre'] ?></option>


										<?php
										endforeach;

										?>
									</select>
								</label>

							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>
									Precio Compra:
									<input type="text" class="form-control" id="p_compra">
								</label>

								<label>
									Stock
									<input type="text" class="form-control" id="stock">
								</label>


							</div>
						</div>

					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default">Cancel</button>
				<button type="button" class="btn btn-primary">Modificar</button>
			</div>
		</div>
	</div>
</div>