<?php 
require 'inc/recovery_pass_core.php';
require 'inc/updatePass_core.php';

if (isset($_GET['name'])) {
	
	$name = $_GET['name'];
}

// Change Password
if (isset($_POST['act'])) {
	
	if($_POST['act'] == '2') {
		if(!isset($_POST['password1']) || !isset($_POST['password2']) || !isset($_POST['name']))
			die('wrong');
		if($_POST['password1'] == '' || $_POST['password2'] == '' || $_POST['name'] == '')
			die('wrong');
		
		$name =		$_POST['name'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
			
        $userid = $_UpdatePass->get_userid($name);
			

			if($password1 != $password2)
				die('2');
		
		
		
			if($_UpdatePass->update_pass($userid, $password1)== true)
			 	die('1');
			
		die('wrong');
	}
}



?>
<!DOCTYPE html>
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
	<div id="content">
		<div id="center"></div>
		<div id="login">
			<h2 class="noborder">Cambio de Contraseña</h2> <br />
			<span class="downtitle">Excelente vamos avanzando...!.</span>
			<span><?php echo $name; ?> </span>
			<br />
			<div class="center">
				<div class="form">
					<form method="post" action="" name="change-password">
						<div class="ni-cont">
							<input type="hidden" name="new-name" class="ni" value="<?php echo $name; ?>">
						</div>
						Nueva contraseña:<br />
						<div class="ni-cont">
							<input type="password" name="new-password" class="ni" />
						</div>
						
						Repetir contraseña:<br />
						<div class="ni-cont">
							<input type="password" name="rnew-password" class="ni" />
						</div>
						<br />
						<input type="submit" name="invento-settings-changepass" class="ni btn blue" value="Resetear contraseña" />
					</form>
		</div>
	</div>
	<span>Excelente vamos avanzando...!</span>
	</div>
</body>
</html>