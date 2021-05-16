<?php
include("service/conection.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORM--php</title>


	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="content">
			<h2>Datos del empleados &raquo; Agregar datos</h2>
			<hr />

			<?php
			if (isset($_POST['add'])) {
				$name 	= mysqli_real_escape_string($con, (strip_tags($_POST["name"], ENT_QUOTES)));
				$lastName = mysqli_real_escape_string($con, (strip_tags($_POST["lastName"], ENT_QUOTES)));
				$age = mysqli_real_escape_string($con, (strip_tags($_POST["age"], ENT_QUOTES)));
				$id = mysqli_real_escape_string($con, (strip_tags($_POST["id"], ENT_QUOTES)));
				$city = mysqli_real_escape_string($con, (strip_tags($_POST["city"], ENT_QUOTES)));
				$neighborhood = mysqli_real_escape_string($con, (strip_tags($_POST["neighborhood"], ENT_QUOTES)));
				$email = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES)));
				$phoneNumber = mysqli_real_escape_string($con, (strip_tags($_POST["phoneNumber"], ENT_QUOTES)));
				$commentary = mysqli_real_escape_string($con, (strip_tags($_POST["commentary"], ENT_QUOTES)));

				$insert = mysqli_query($con, "INSERT INTO CLIENT(name, lastName, age, id, city, neighborhood, email, phoneNumber,commentary)
					VALUES('$name','$lastName', '$age', '$id', '$city', '$neighborhood', '$email', '$phoneNumber', '$commentary')") or die(mysqli_error($con));
				if ($insert) {
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
				} else {
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="name" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-4">
						<input type="text" name="lastName" class="form-control" placeholder="Apellido" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Edad</label>
					<div class="col-sm-3">
						<textarea name="age" class="form-control" placeholder="Edad"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Numero de identidad</label>
					<div class="col-sm-3">
						<input type="text" name="id" class="form-control" placeholder="Numero de identidad" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ciudad</label>
					<div class="col-sm-3">
						<input type="text" name="city" class="form-control" placeholder="Ciudad" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Barrio</label>
					<div class="col-sm-3">
						<input type="text" name="neighborhood" class="form-control" placeholder="Barrio" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo Electronico</label>
					<div class="col-sm-3">
						<input type="text" name="email" class="form-control" placeholder="Correo Electronico" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Numero de telefono</label>
					<div class="col-sm-3">
						<input type="text" name="phoneNumber" class="form-control" placeholder="Numero de telefono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Comentario</label>
					<div class="col-sm-3">
						<input type="text" name="commentary" class="form-control" placeholder="Comentario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('.date').datepicker({
			format: 'dd-mm-yyyy',
		})
	</script>
</body>