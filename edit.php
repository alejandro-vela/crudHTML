<?php
include("service/conection.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Adoptante</title>
	<link href="style/bootstrap.min.css" rel="stylesheet">
	<link href="style/style_nav.css" rel="stylesheet">


</head>


<header class="header">
	<img src="assets/dibujos-animados-perros_24640-47234.jpg" height="200" />
	<h1>Fundación canina</h1>
</header>
<nav>
	<div class="topNavBar">
		<a class="active" href="index.html">Inicio</a>
		<a href="#">¿Quienes somos?</a>
		<a href="Formato.php">Registrate aqui para adoptar</a>
		<a href="#">Nuestros perritos</a>
		<a href="viewData.php">Adoptantes</a>
	</div>
</nav>

<body>

	<div class="container">
		<div class="content">
			<h2>Datos del Adoptante &raquo; Editar datos</h2>
			

			<?php

			$nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM CLIENT WHERE id='$nik'");
			if (mysqli_num_rows($sql) == 0) {
				header("Location: index.html");
			} else {
				$row = mysqli_fetch_assoc($sql);
			}
			if (isset($_POST['save'])) {
				$name 	= mysqli_real_escape_string($con, (strip_tags($_POST["name"], ENT_QUOTES)));
				$lastName = mysqli_real_escape_string($con, (strip_tags($_POST["lastName"], ENT_QUOTES)));
				$age = mysqli_real_escape_string($con, (strip_tags($_POST["age"], ENT_QUOTES)));
				$id = mysqli_real_escape_string($con, (strip_tags($_POST["id"], ENT_QUOTES)));
				$city = mysqli_real_escape_string($con, (strip_tags($_POST["city"], ENT_QUOTES)));
				$neighborhood = mysqli_real_escape_string($con, (strip_tags($_POST["neighborhood"], ENT_QUOTES)));
				$email = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES)));
				$phoneNumber = mysqli_real_escape_string($con, (strip_tags($_POST["phoneNumber"], ENT_QUOTES)));
				$commentary = mysqli_real_escape_string($con, (strip_tags($_POST["commentary"], ENT_QUOTES)));

				$update = mysqli_query(
					$con,
					"UPDATE CLIENT SET name='$name',
				  lastName='$lastName', 
				  age='$age', 
				  id='$id',
				  city='$city',
				  neighborhood='$neighborhood',
				  email='$email', 
				  phoneNumber='$phoneNumber', 
				  commentary='$commentary' 
				  WHERE id='$nik'"
				) or die(mysqli_error($con));
				if ($update) {
					header("Location: edit.php?nik=" . $nik . "&pesan=sukses");
				} else {
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}

			if (isset($_GET['pesan']) == 'sukses') {
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Código</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control" placeholder="Cedula" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-4">
						<input type="text" name="lastName" value="<?php echo $row['lastName']; ?>" class="form-control" placeholder="Apellido" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Edad</label>
					<div class="col-sm-4">
						<input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control" placeholder="Edad" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ciudad</label>
					<div class="col-sm-4">
						<input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" placeholder="Ciudad" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Barrio</label>
					<div class="col-sm-3">
						<textarea name="neighborhood" class="form-control" placeholder="Barrio"><?php echo $row['neighborhood']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Numero Telefonico</label>
					<div class="col-sm-3">
						<input type="text" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" class="form-control" placeholder="Numero Telefonico" required>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Comentario</label>
					<div class="col-sm-3">
						<input type="text" name="commentary" value="<?php echo $row['commentary']; ?>" class="form-control" placeholder="Comentario" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.html" class="btn btn-sm btn-danger">Cancelar</a>
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

</html>