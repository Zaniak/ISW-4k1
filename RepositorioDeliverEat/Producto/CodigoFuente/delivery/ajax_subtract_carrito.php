<?php
  require_once('conexion.php');
  conectar(); 
  $sql1 = "SELECT MAX(id) as id_max FROM carrito";
  $result1 = mysql_query($sql1);
  while($row = mysql_fetch_array($result1)){
	  $sql2 = "DELETE FROM carrito WHERE id = ".$row['id_max'];
	  $result2 = mysql_query($sql2);
  }
  echo $result2;
?>