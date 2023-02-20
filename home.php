<?php
require 'config.php';
require 'inc/session.php';
require 'inc/home_core.php';
if($_session->isLogged() == false )
  header('Location: index.php');

$_page = 1;

$role = $_session->get_user_role();
if($role != 1 && $role != 2)
  header('Location: items.php');

if(isset($_POST['act']) && $_POST['act'] == 'reqinfo') {
  $interval = $_POST['int'];
  
  $res = array(
    $_home->get_new_items($interval),
    $_home->get_checked_in($interval),
    $_home->get_checked_out($interval),
  );
  
  $_check_in_price = $_home->get_checked_in_price($interval);
  $_check_out_price = $_home->get_checked_out_price($interval);
  
  $res[] = '$'.$_check_in_price;
  $res[] = '$'.$_check_out_price;
  
  $res = implode('|', $res);
  
  echo $res;
  die();
}
?>

<!DOCTYPE html>
<html>

<?php require 'inc/head.php'; ?>

<body>
  
<?php require 'inc/header.php'; ?>
  
  <div class="info">

      
        <div id="main-wrapper">    
    <div class="wrapper-pad">
      <h2>Inicio</h2>
      <ul id="selectors">
        <li class="selected" value="today">HOY</li>
        <li value="this_week">ESTA SEMANA</li>
        <li value="this_month">ESTE MES</li>
        <li value="this_year">ESTE AÑO</li>
        <li value="all_time">TODOS</li>
      </ul>
      
      <div id="fdetails">
        <div class="element">
          <span><?php echo $_home->get_new_items('today'); ?></span><br />
          NUEVOS<br />
          PRODUCTOS
        </div>
        <div class="element">
          <span><?php echo $_home->get_checked_in('today'); ?></span><br />
          INGRESOS<br />
          (CANT. TOTAL)
        </div>
        <div class="element">
          <span><?php echo $_home->get_checked_out('today'); ?></span><br />
          SALIDAS<br />
          (CANT TOTAL)
        </div>
        <div class="element">
          <span>$ <?php echo $_check_in_price = $_home->get_checked_in_price('today'); ?></span><br />
          INGRESOS
        </div>
        <div class="element">
          <span>$ <?php echo $_check_out_price = $_home->get_checked_out_price('today'); ?></span><br />
          SALIDAS
        </div>
      </div>
    </div>
    
    <div class="clear" style="margin-bottom:40px;height:1px;"></div>
    <div class="border" style="margin-bottom:30px;"></div>
    
    <div class="wrapper-pad">
      <h3>ESTADÍSTICAS GENERALES</h3>
      <div id="f2details">
        <div class="element">
          <span><?php echo $_home->general_registered_items(); ?></span><br />
          PRODUCTOS<br />
          REGISTRADOS
          <br />
        <div class="element">
          <span><?php echo $_home->general_registered_pays(); ?></span><br />
          FACTURAS<br />
          REGISTRADAS
        </div>
        </div>

        <div class="element">
          <span><?php echo $_home->general_warehouse_items(); ?></span><br />
          ALMACÉN<br />
          PRODUCTO (CANT)
        </div>
        <div class="element">
          <span>$ <?php echo $_home->general_warehouse_value(); ?></span><br />
          VALOR EN ALMACÉN
          <br />
          <br />
        <div>
          <?php $monto = round($_home->general_warehouse_value_pays(),2)  ?>
          <span><?php echo "$ ".$monto; ?></span><br />
          <div class="element"> 
          VALOR <br />
          FACTURAS
          </div>
        </div>
        </div>
  
        <div class="element">
          <span>$ <?php echo $_home->general_warehouse_checked_out(); ?></span><br />
          VALOR SALIDAS
        </div>
        
        
      </div>
    </div>
    </div>
    <div class="clear" style="height:50px;"></div>
  </div>
        <div class="border-arrow">
          <button class="button arrow top button-border-arrow"></button>
        </div>
        
          <div class="action-sidebar">
            <div class="action-sidebar-social">
              <a href="#" class="button-social social-link facebook">
                <i class="fa fa-facebook icon-action-sidebar"></i>
                Post to Facebook
              </a>
              <a href="#" class="button-social social-link twitter">
                <i class="fa fa-twitter icon-action-sidebar"></i>
                Tweet this Job
              </a>
              <a href="#" class="button-social social-link linkedin">
                <i class="fa fa-linkedin-square icon-action-sidebar"></i>
                Post to Linkedin
              </a>
            </div>
            
            </ul>
          </div>  
        </div>
      </div> 
    </div>

<!-- partial -->
	
</body>
</html>