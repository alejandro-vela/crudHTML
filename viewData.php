<?php
include("service/conection.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/css.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Data</title>

    <!-- Bootstrap -->
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/style_nav.css" rel="stylesheet">

    <style>
        .content {
            margin-top: 80px;
        }
    </style>

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
            <h2>Lista</h2>
            <hr />

            <?php
            if (isset($_GET['aksi']) == 'delete') {
                $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
                $cek = mysqli_query($con, "SELECT * FROM CLIENT WHERE id='$nik'");
                if (mysqli_num_rows($cek) == 0) {
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                } else {
                    $delete = mysqli_query($con, "DELETE FROM CLIENT WHERE id='$nik'");
                    if ($delete) {
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                    }
                }
            }
            ?>
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>lastName</th>
                        <th>age</th>
                        <th>id</th>
                        <th>city</th>
                        <th>neighborhood</th>
                        <th>email</th>
                        <th>phoneNumber</th>
                        <th>commentary</th>
                        <th>Acciones</th>
                    </tr>
                    <?php

                    $sql = mysqli_query($con, "SELECT * FROM CLIENT ");
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $row['name'] . '</td>
                            <td>' . $row['lastName'] . '</td>
                            <td>' . $row['age'] . '</td>
							<td>' . $row['id'] . '</td>
                            <td>' . $row['city'] . '</td>
                            <td>' . $row['neighborhood'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phoneNumber'] . '</td>
                            <td>' . $row['commentary'] . '</td>
                            <td>
                            <a href="edit.php?nik='. $row['id'] . '
                            " title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" 
                            aria-hidden="true"></span></a>
                            
                            <a href="viewData.php?aksi=delete&nik=' . $row['id'] . '" 
                            title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos 
                            ' . $row['name'] . '?\')" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true">
                            </span></a>
                            </td>
                            
                        
						</tr>
						';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>