<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "INSERT INTO datos_pedido (id_cliente,domicilio, forma_pago, importe_efectivo, fecha_entrega, hr_entrega)
  		  VALUES (1,'".$_REQUEST['domicilio']."','".$_REQUEST['forma_pago']."','".$_REQUEST['importe_efectivo']."','".$_REQUEST['fecha_entrega']."','".$_REQUEST['hr_entrega']."')";
  $result = mysql_query($sql);
  echo $sql;
?>