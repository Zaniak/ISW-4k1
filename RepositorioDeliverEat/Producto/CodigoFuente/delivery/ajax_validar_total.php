<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "SELECT SUM(cantidad) as total_carrito FROM carrito";
  $result = mysql_query($sql);
  while($row = mysql_fetch_array($result)){
  	$total_carrito = $row['total_carrito'];
  }
  echo $total_carrito;
?>