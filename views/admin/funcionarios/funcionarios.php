<?php
require_once "../../../models/Roles.php";


$em = new Employees();

$r = new Roles();
$resultados = $em->listar();

$rol = $r->listar();


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- <pre><?php print_r($rol); ?></pre> -->
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Funcionarios</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Inicio</a></li>
						<li class="breadcrumb-item active">Funcionarios</li>
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
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
								Agregar
							</button>

						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>rol</th>
										<th>Estado</th>
										<th>Sexo</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($resultados as $p) :

									?><?php

										$roles = (new Roles())->buscar($p['roles_ro_id']);
										/* $estado = (new Estados_usuarios())->buscar($p['roles_ro_id']); */
										?>
									<tr>
										<td><?= $p['em_nombre'] ?></td>
										<td><?= $p['em_apellido'] ?></td>
										<td><?= $p['em_correo'] ?></td>
										<td><?= $p['em_telefono'] ?></td>
										<td><?= $roles['ro_nombre'] ?></td>
										<td> Habilitado</td>
										<td><?= $p['em_sexo'] ?></td>
										<td>
											<button onclick="alertaE(<?= $p['em_id'] ?>)" class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
											<a class="btn btn-warning" href="?param=funcionarios_modificar&id=<?= $p['em_id'] ?>"><i class="fas fa-user-edit"></i></a>

											<!-- <button onclick="alertaM(<?= $p['em_id'] ?>)" class="buscar btn btn-warning" data-id="<?= $p['em_id'] ?>" data-toggle="modal" data-target="#modal-m"><i class="fas fa-user-edit"></i></button>-->
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

<div class="modal fade" id="modal-sm">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Agregar Funcionarios</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_agregar">
				<div class="modal-body">

					<div class="form-group">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" id="nombre" class="form-control" name="nombre" placeholder="nombre" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Apellidos</label>
						<input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="apellidos" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Correo</label>
						<input type="email" id="correo" class="form-control" name="correo" placeholder="correo" required>

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Contraseña</label>
								<input type="password" id="password" class="form-control" name="password" placeholder="contraseña" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirmar Contraseña</label>
								<input type="password" id="password" class="form-control" name="password" placeholder="contraseña" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Telefono</label>
						<input type="number" id="telefono" class="form-control" name="telefono" placeholder="telefono" required>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Sexo</label>
						<select name="sexo" id="sexo" class="custom-select form-control-border border-width-2" required>
							<option value="" selected>Seleccione</option>
							<option value="Hombre">Hombre</option>
							<option value="Mujer"> Mujer</option>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Rol</label>
						<select id="rol" name="rol" class="custom-select form-control-border border-width-2" required>
							<option value="0">Selecione</option>
							<?php
							foreach ($rol as $c) :

							?>
								<option value="<?= $c['ro_id'] ?>"><?= $c['ro_nombre'] ?></option>


							<?php
							endforeach;

							?>

						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Estado</label>
						<select id="estado" name="estado" class="custom-select form-control-border border-width-2" required>
							<option value="" selected>Seleccione</option>
							<option value="1">Activado</option>
							<option value="2"> Desactivado</option>

						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button id="btnGuardar" type="submit" class="btn btn-primary">Agregar</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-m">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modificar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!--			 <form id="form_modificar"  method="post" action="../../../controllers/employeesControllers.php?accion=modificar"> -->
			<form id="form_modificar">
				<div class="modal-body">

					<div class="form-group">
						<input type="text" id="m_id" class="form-control" name="id" placeholder="nombre" required>
						<label>Nombre</label>
						<input type="text" id="m_nombre" class="form-control" name="nombre" placeholder="nombre" required>
					</div>
					<div class="form-group">
						<label>Apellidos</label>
						<input type="text" id="m_apellidos" class="form-control" name="apellidos" placeholder="apellidos" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Correo</label>
						<input type="email" id="m_correo" class="form-control" name="correo" placeholder="correo" required>

					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Telefono</label>
						<input type="number" id="m_telefono" class="form-control" name="telefono" placeholder="telefono" required>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Sexo</label>
						<select name="sexo" id="m_sexo" class="custom-select form-control-border border-width-2" required>
							<option value="" selected>Seleccione</option>
							<option value="Hombre">Hombre</option>
							<option value="Mujer"> Mujer</option>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Rol</label>
						<select id="m_rol" name="rol" class="custom-select form-control-border border-width-2" required>
							<option value="" selected>Seleccione</option>
							<option value="1">Administrador</option>
							<option value="2"> Repartidor</option>

						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Estado</label>
						<select id="m_estado" name="estado" class="custom-select form-control-border border-width-2" required>
							<option value="" selected>Seleccione</option>
							<option value="1">Activado</option>
							<option value="2"> Desactivado</option>

						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

					<button id="btnmodificar" type="submit" class="btn btn-primary">Modificar</button>
			</form>

		</div>
		</form>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<script src="../../../resources/js/agregar/agregar.js"></script>
<!-- /.modal -->
<script>
	function myFunction() {

		Swal.fire({
			title: '¿Desea eliminarlo?',
			showDenyButton: true,
			confirmButtonText: 'Si',


		}).then((result) => {
			if (result.isConfirmed) {

				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'ELIMINADO',
					showConfirmButton: false,
					timer: 1500
				})


			}
		})

	}
</script>