<?php
$dbhost = 'localhost';      // Host de MYSQL.
$dbuser = 'root';   // Usuario de HOST.
$dbpass = '';  //Password del HOST.
$dbname = 'test_inv';       // Base de datos de HOST
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $res = $mysqli->query("SELECT * FROM invento_items ORDER BY id ASC");

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div>
    <img src='' style='width:80px;height:auto; float: right; margin:5px -2px 0px 0px;'>
    
</div>
    <h1>Listado de Productos</h1>
    <div id="center"></div>
 <table border="0" rules="rows" id="items">
       
                    <tr>
                        <td width="5%"><input type="checkbox" name="select-all" /></td>
                        <td width="6%">ID </td>
                        <td width="30%">Producto </td>
                        <td width="20%">Categoría </td>
                        <td width="10%">Stock </td>
                        <td width="14%">Precio </td>
                        <td width="15%">Descripción </td>
                        <td width="15%">Fecha </td>
                    </tr>

       
        <tbody>
            <?php
                    while($mostrar = mysqli_fetch_array($res)) {
?>
 <br><br>
    <tr>

            <td width="6%"><?php echo ' '; ?></td>
            <td width="30%"><?php echo $mostrar['id']; ?></td>
            <td width="20%"><?php echo $mostrar['name']; ?></td>
            <td width="40%"><?php echo $mostrar['category']; ?></td>
            <td width="14%"><?php echo $mostrar['qty']; ?></td>
            <td width="15%"><?php echo $mostrar['price']; ?></td>
            <td><?php echo $mostrar['descrp']; ?></td>
            <td><?php echo $mostrar['date_added']; ?></td>
    </tr>
<?php
}
?>
        </tbody>
    </table>
</body>
</html>
