<?php 

require 'inc/recovery_pass_core.php';
require 'inc/updatePass_core.php';


if(isset($_POST['a']) && isset($_POST['username']) && isset($_POST['preg_1']) && isset($_POST['preg_2'])) {
	
	$username = $_POST['username'];
	$preg_1 = $_POST['preg_1'];
	$preg_2 = $_POST['preg_2'];

	//var_dump($username);

	if($username =='' || $preg_1 == '' || $preg_2 == '') 
		die('2');

	if($_UpdatePass->findAsk($username, $preg_1, $preg_2 )== false)
		 die('1');
		
die('3');



}

//header('location:update_pass.php');

	?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link type="text/css" rel="stylesheet" href="media/css/recovery.css" media="all" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,600" rel="stylesheet" type="text/css">
	<link rel="icon" href="media/img/favicon.ico" type="image/x-icon" />

	<script type="text/javascript" src="media/js/jquery.min.js"></script>
	<script type="text/javascript" src="media/js/recovery_pass.js"></script>
</head>
<body>
	<div id="center"></div>
<div id="content">
	<div id="login">
			<h2 class="noborder">Preguntas de Seguridad</h2> <br />
			<span class="downtitle">Si no deseas cambiar su contraseña, deja los siguientes cuadros vacíos.
				
			</span>
			<br />
		</div>
			<div class="center">
				<div class="form">
					<form method="post" action="" name="recovery_pass">
						<div id="login">
						Nombre de Usuario:<br />
						<div class="ni-cont">
							<input type="text" name="username" class="ni" />
							<br />
						</div>
						Primera pregunta:<br />
						<div>
							<span>¿Como se llama tu perro?</span>
						</div>
						<div class="ni-cont">
							<input type="text" name="preguntaUno" class="ni" />
							<br />
						</div>
						
						Segunda pregunta:<br />
						<div>
							<span>¿Color preferido?</span>
						</div>

						<div class="ni-cont">
							<input type="text" name="preguntaDos" class="ni" />
						</div>
						

						<br />
						<input type="submit" name="invento-settings-changepass" class="ni btn blue" value="Resetear contraseña" />
					</div>
					</form>
				</div>
			</div>
		</div>
		</div>
</body>
</html>