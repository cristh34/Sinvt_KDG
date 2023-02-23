<?php
require 'inc/recovery_pass_core.php';

    $res = $mysqli->query("Select invento_items.id, invento_items.name,( invento_categories.name) as p, invento_items.qty, invento_items.price, invento_items.descrp, invento_items.date_added  from invento_categories, invento_items where invento_items.category =  invento_categories.id");
$fecha = date("d-m-Y");
?>
<!DOCTYPE html>
<html>
<head>
   
   <link rel="stylesheet" type="text/css" href="media/css/normalize.css">
   <link rel="stylesheet" type="text/css" href="media/css/site.css">

    <title>Sinvt-SDK</title>
</head>
<body>
<div class="row">
    <div class="col-lg-6 ">
    <img style="float: right; width: 55px; margin: 5px; padding: 20px 15px;" class="" src='' alt="Logotipo">
    </div>
    
    <div class="col-lg-6 ">
        <h3 style="margin-top: 20px;">Sistema de Control de Inventario - KGD</h3>
        <h6>Rif: J-000000000-0</h6>
        <h6>Urb. Los Cocales. Cdad El Tigre.</h6>
    </div>
    
</div>
<hr>
<div class="row">
<div class="col-lg-12">
    <h6 class="h6">Productos existentes</h6>
</div>
<div class="col-lg-2 text-center">
    <strong>Fecha:</strong>
    <br>
    <?php echo $fecha; ?>
    <br>
    <strong>Nota n°</strong>
    <br>

    </div>
</div>
<div class="row text-center" style="margin-bottom: 2rem;">
        <div class="col-lg-6">
            <h1 class="h2">Genericos</h1>
            <strong>Estadisticas</strong>
        </div>
    </div>
    <div class="main-wrapper">
    <div class="row text-center">
        <div class="col-lg-12">
            
      
         <table  class="table table-condensed table-bordered table-striped"> 
               <thead>
                <tr>
                    <th><input type="checkbox" name="select-all" /></th>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Fecha</th>

                </tr>
               </thead>
                <tbody>
                    <?php
                            while($mostrar = mysqli_fetch_array($res)) {
        ?>
                <tr>

                        <td ><?php echo ' '; ?></td>
                        <td style="width:5%;"><?php echo $mostrar['id']; ?></td>
                        <td style="width:25%;"><?php echo $mostrar['name']; ?></td>
                        <td ><?php echo $mostrar['p']; ?></td>
                        <td style="width:10%;"><?php echo $mostrar['qty']; ?></td>
                        <td style="width:7%;"><?php echo $mostrar['price']; ?></td>
                        <td style="width:27%;"><?php echo $mostrar['descrp']; ?></td>
                        <td><?php 
                         $fecha1 = date("d-m-Y", strtotime($mostrar['date_added']));
                             echo $fecha1; ?></td>

                </tr>
        <?php
        }
        ?>
        <tr>
            <td>
            
            </td>
        </tr>
        <hr>
                </tbody>
                
                <tfoot>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </tfoot>
            </table>
<span>-- Https//:sinvtkdg.com.ve</span>
      </div>
      </div>
    </div>
</body>
</html>
