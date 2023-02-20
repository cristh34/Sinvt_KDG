
<?php
require 'config.php';
require 'inc/session.php';
require 'inc/pays_core.php';
if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 18;

if(!isset($_GET['id']))
	header('Location: pay-pro.php');
$item = $_items->get_item($_GET['id']);
if(!$item->id)
	header('Location: pay-pro.php');
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
			<h2>Detalles de Orden <?php echo $item->id ?></h2>
			<div class="center">
				<div class="form">
					N°:<br />
					<div class="ni-cont light">
						<?php echo $item->id ?><br /><br />
					</div>
					Nombre / Empresa:<br />
					<div class="ni-cont light">
					<?php echo $item->name ?><br /><br />
					</div>
					Monto:<br />
					<div class="ni-cont light">
					<?php echo round($item->monto,2) ?><br /><br />
					</div>
					Fecha:<br />
					<div class="ni-cont light">
						<?php echo date("d/m/Y",strtotime($item->fechain)) ?><br /><br />
					</div>
					Factura:<br />
					<div class="ni-cont light">
						<?php echo $item->hash ?><br /><br />
					</div>
					Observaciones:<br />
					<div class="ni-cont light">
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="clear" style="margin-bottom:40px;"></div>
		<div class="border" style="margin-bottom:30px;"></div>
	</div>
</body>
</html>