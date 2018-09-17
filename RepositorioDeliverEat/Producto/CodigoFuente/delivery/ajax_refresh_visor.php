<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "SELECT * FROM carrito ORDER BY comida";
  $result = mysql_query($sql);
  $valor_total = 0;
  $i = 0;
   	while($row = mysql_fetch_array($result)){
	   	echo "<tr><td>".$row['comida']."</td><td>".$row['cantidad']."</td><td>".$row['descripcion']."</td><td>".$row['cantidad']*$row['precio']."</td></tr>";
	   	$i++;
	   	$valor_total += $row['cantidad']*$row['precio'];
   	}
   	echo "<tr><td></td></tr>"; //ya estoy flasheando estas porquerias con el sueño...
   	echo "<tr><td></td></tr>";
   	echo "<tr><td></td></tr>";
   	echo "<tr><td></td></tr>";
   	echo "<tr><td></td><td></td><td></td><td class='text-primary'>Total: $".$valor_total."</td></tr>";
?>