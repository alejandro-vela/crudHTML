<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style/css.css" />
	<title>Fundación Canina</title>
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

	<div id="cuadro">

			<?php include("insert.php"); ?>

	</div>

</body>


</html>