<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "INSERT INTO carrito (comida, cantidad, descripcion, precio, id_cliente)
  		  VALUES ('".$_REQUEST['comida']."',".$_REQUEST['cantidad'].",'".$_REQUEST['descripcion']."',".$_REQUEST['precio'].",1)";
  $result = mysql_query($sql);
  echo $sql;
?>