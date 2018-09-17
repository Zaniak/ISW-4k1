<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "SELECT * FROM comidas WHERE nombre_comida = '".$_REQUEST['comida']."'";
  $result = mysql_query($sql);
   	while($row = mysql_fetch_array($result)){
   		echo $row['precio'];
   	}
?>