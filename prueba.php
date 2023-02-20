<?php 
require 'config.php';
require 'inc/session.php';

if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 1;

$role = $_session->get_user_role();
if($role != 1 && $role != 2)
	header('Location: prueba.php');



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>prueba</title>
	<link rel="stylesheet" href="">
<?php require 'inc/head.php'; ?>

</head>
<body>
 <div id="main-wrapper">
	<?php require 'inc/header.php'; ?>
	<div class="wrapper-pad">
		<br>
	<h2>paginas plantillas para hacer mejoras al sistema</h2>
	</div>
	</div>
</body>
</html>