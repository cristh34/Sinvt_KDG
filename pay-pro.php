<?php
require 'config.php';
require 'inc/session.php';
require 'inc/pays_core.php';
require 'inc/categories_core.php';

if($_session->isLogged() == false)
	header('Location: index.php');

$_items->set_session_obj($_session);

$_page = 6;

$role = $_session->get_user_role();

if(isset($_POST['act'])) {
	// Search count
	if($_POST['act'] == '1') {
		if(!isset($_POST['val']) || $_POST['val'] == '')
			die('wrong');
		$search_string = $_POST['val'];
		if($_items->count_items_search($search_string) == 0)
			die('2');
		die('3');
		}
	// Delete item
	if($_POST['act'] == '2') {
		if(!isset($_POST['id']) || $_POST['id'] == '')
			die('wrong');

		if($role == 3 || $role == 4)
			die('wrong');

		if($_items->delete_item($_POST['id']) == true)
			die('1');
		die('wrong');
	}
	// Update item quantity (check-in/check-out)
	if($_POST['act'] == '3' || $_POST['act'] == '4') {
		if(!isset($_POST['id']) || !isset($_POST['val']) || !isset($_POST['fromval']) || $_POST['id'] == '' || $_POST['val'] == '' || $_POST['fromval'] == '')
			die('wrong');
		if($_POST['act'] == '3')
			$type = 1;
		elseif($_POST['act'] == '4') {
			$type = 2;
			$qty = $_items->get_item($_POST['id']);
			$qty = $qty->qty;
			if($qty < $_POST['val'])
				die('2');
		}

		if($_items->update_item_qty($type, $_POST['id'], $_POST['fromval'], $_POST['val']) == true)
			die('1');
		die('wrong');
	}

	// Delete Items
	if($_POST['act'] == '5') {
		if(!isset($_POST['data']) || $_POST['data'] == '')
			die('wrong');

		if($role == 3 || $role == 4)
			die('wrong');

		$decoded = json_decode($_POST['data']);
		$deleted = array();
		foreach($decoded as $id) {
			if($_items->delete_item($id) == true)
				$deleted[] = $id;
		}
		$reencoded = json_encode($deleted);
		if(count($reencoded) == 0)
			die('wrong');
		die($reencoded);
	}

	die();
	}

	if(!isset($_GET['page']) || $_GET['page'] == 0 || !is_numeric($_GET['page']))
	$page = 1;
else
	$page = $_GET['page'];


if(!isset($_GET['pp']) || !is_numeric($_GET['pp'])) {
	$pp = 25;
}else{
	$pp = $_GET['pp'];
	if($pp != 25 && $pp != 50 && $pp != 100 && $pp != 150 && $pp != 200 && $pp != 300 && $pp != 500)
		$pp = 25;
}
	// Search query
if(isset($_GET['search']) && ($_GET['search'] != '')){
	$s = urldecode($_GET['search']);
	$items = $_items->search($s, $page, $pp);
	$c_items = $_items->count_items_search($s);
}else{
	$s = false;
	$items = $_items->get_items($page, $pp);
	$c_items = $_items->count_items();
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
		<!-- menu opcional de botones -->
		<div id="table-head">
		<div class="fright" style="height:5px; margin-right:55px;"></div>
			<a href="new-pay.php" name="check-out-all" class="btn red disabled fright"><i class="fa fa-folder"></i>Nueva Factura</a>
			<a href="" name="check-out-all" class="btn blue disabled fright"><i class="fa fa-folder"></i>Opn2</a>
			<a href="" name="check-out-all" class="btn green disabled fright"><i class="fa fa-print"></i>Imprimir</a>



		</div>
		<!-- lista de consulta y acciones -->

		<div class="wrapper-pad">
			<?php
			if($c_items == 0)
				echo '<br /><br />Sin productos';
			else{
			?>
			<table border="1" rules="rows" id="items">
				<thead>
					<tr>
						<td width="5%"><input type="checkbox" name="select-all" /></td>
						<td width="6%">ID</td>
						<td width="25%">Persona</td>
						<td width="15%">Monto</td>
						<td width="12%">Fecha</td>
						<td width="14%">hash</td>
						<td width="15%">Acciones</td>
					</tr>
				</thead>
				<tbody>
					<?php
					while($item = $items->fetch_object()) {
?>
					<tr data-type="element" data-id="<?php echo $item->id; ?>">
						<td><input type="checkbox" name="chbox" value="<?php echo $item->id; ?>" /></td>
						<td class="hover" data-type="id"><?php echo $item->id; ?></td>
						<td class="hover" data-type="name"><?php echo $item->name; ?></td>
						<td class="hover" data-type="monto"><?php echo $item->monto; ?></td>
						<td class="hover" data-type="monto"><?php echo date("d/m/Y",strtotime($item->fechain)); ?></td>
						<td class="hover" data-type="monto"><?php echo $item->hash; ?></td>
						<td>
							<?php echo '<a href="pay.php?id='.$item->id.'" name="c1" title="Detalles"><i class="fa fa-file-text-o"></i></a>';?>
							<!--<a href="" name="c2" title="Salida"><i class="fa fa-arrow-up"></i></a>-->
							<?php
							if($role == 1 || $role == 2)
								echo '<a href="edit-pay.php?id='.$item->id.'" name="c3" title="Editar"><i class="fa fa-pencil"></i></a>';
							if($role == 1 || $role == 2)
								echo '<a href="" name="c5" title="Eliminar"><i class="fa fa-close"></i></a>';
							?>
						</td>
					</tr>
<?php
					}
					?>
				</tbody>
			</table>
			<br>
			<br>
		</div>
		
			<?php 
			}
			 ?>
		

		</div>
		<div id="pagination">
			<?php
			if($page != 1)
				echo '<div class="prev" name="'.($page-1).'"><i class="fa fa-caret-left"></i></div>';
			?>
			<div class="page"><?php echo $page; ?></div>
			<?php
			$total_items = $c_items;
			if($total_items > $pp) {
				$total_pages = $total_items / $pp;
				if($total_pages > $page)
					echo '<div class="next" name="'.($page+1).'"><i class="fa fa-caret-right"></i></div>';
			}
			?>
		</div>
		
		<div class="clear" style="margin-bottom:40px;"></div>
		<!--<div class="border" style="margin-bottom:30px;"></div> -->
	</div>
</body>
</html>