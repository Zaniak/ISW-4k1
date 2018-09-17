<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "INSERT INTO carrito (comida, cantidad, descripcion, precio)
  		  VALUES ('".$_REQUEST['comida']."',".$_REQUEST['cantidad'].",'".$_REQUEST['descripcion']."',".$_REQUEST['precio'].")";
  $result = mysql_query($sql);
  echo $sql;
?>