<?php  	
require 'config.php';
require 'inc/session.php';
require 'inc/pays_core.php';
if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 19;

$role = $_session->get_user_role();
if($role==4)
	header('Location: pay-pro.php');


if(isset($_POST['act'])) {
	if($_POST['act'] == '1') {

		if(!isset($_POST['name']) || !isset($_POST['monto']) || !isset($_POST['fecha']) || !isset($_POST['hash']))
			die('wrong');
		if($_POST['name'] == '' || $_POST['monto'] == '' || $_POST['hash'] == '')
			die('wrong');

		$name = $_POST['name'];
		$monto = $_POST['monto'];
		$fecha = $_POST['fecha'];
		$hash = $_POST['hash'];
		if($_items->new_item($name, $monto, $fecha, $hash) == false)
			die('wrong');
		die('1');
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<?php require 'inc/head.php'; ?>
</head>
<body>
	<div id="main-wrapper">
		<?php require 'inc/header.php'; ?>

		<div class="wrapper-pad">
			<h2>Nueva Factura</h2>
			<div class="center">
				<div class="new-item form">
					<form method="post" action="" name="new-item">
						Nombre:<br />
						<div class="ni-cont">
							<input type="text" name="item-name" class="ni" />
						</div>
						<span class="item-desc-left">Monto:</span><br />
							<input type="text" name="item-monto" class="ni" />
							
						Fecha:<br />
						<div class="ni-cont">
							<input type="date" name="item-fecha" class="ni"  />
						</div>
						Factura:<br />
						<div class="ni-cont">
						<input type="text" name="item-hash" class="ni" placeholder="vacio" />
						</div>
						<input type="submit" name="item-submit" class="ni btn blue" value="Guardar datos" />
					</form>
				</div>
			</div>
		</div>

		<div class="clear" style="margin-bottom:40px;"></div>
		<div class="border" style="margin-bottom:30px;"></div>
	</div>
</body>
</html>