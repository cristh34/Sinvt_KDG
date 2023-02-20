<?php
require 'config.php';
require 'inc/session.php';
require 'inc/pays_core.php';
if($_session->isLogged() == false)
	header('Location: index.php');
$_items->set_session_obj($_session);

$_page = 20;

$role = $_session->get_user_role();
if($role==4)
	header('Location: pay-pro.php');

//$mont, $fecha, $hash

if(isset($_POST['act'])) {
	if($_POST['act'] == '1') {
		if(!isset($_POST['itemid']) || !isset($_POST['name']) || !isset($_POST['monto']) || !isset($_POST['fecha']) || !isset($_POST['hash']))
			die('wrong');
		if($_POST['itemid'] == '' || $_POST['name'] == '' || $_POST['monto'] == '')
			die('wrong');

		$itemid = $_POST['itemid'];
		$name = $_POST['name'];
		$monto = $_POST['monto'];
		$fecha = $_POST['fecha'];
		$hash = $_POST['hash'];

		if($_items->update_item($itemid, $name, $monto, $fecha, $hash) == false)
			die('wrong');
		die('1');
	}
}

if(!isset($_GET['id']))
	header('Location: pay-pro.php');
$itemid = $_GET['id'];

if($_items->get_item_name($itemid) == '')
	header('Location: pay-pro.php');

$item = $_items->get_item($itemid);
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
			<h2>Editar producto (ID <?php echo $itemid; ?>)</h2>
			<div class="center">
				<div class="new-item form">
					<form method="post" action="" name="edit-pay" data-id="<?php echo $itemid; ?>">
						Nombre:<br />
						<div class="ni-cont">
							<input type="text" name="item-name" class="ni" value="<?php echo $item->name; ?>" />
						</div>
						Monto: <br />
						<div>
							<?php $monto = round($item->monto,2)  ?>
							<input type="text" name="item-monto" class="ni" placeholder="0.00" value="<?php echo $monto; ?>" />
						</div>
						Fecha: <br />
						<div>
							<input type="date" name="item-fecha" class="ni" value="<?php echo $item->fechain; ?>" />
						</div>
						hash:<br />
						<div>
						
							<input type="text" name="item-hash" class="ni" placeholder="0.00" value="<?php echo $item->hash; ?>" />

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