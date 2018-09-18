<?php
  require_once('conexion.php');
  conectar(); 
  $sql = "SELECT * FROM carrito ORDER BY id";
  $result = mysql_query($sql);
  $valor_total = 0;
  $unidades_total = 0;
   	while($row = mysql_fetch_array($result)){
	   	echo "<tr><td>".$row['comida']."</td><td>".$row['cantidad']."</td><td>".$row['descripcion']."</td><td>".$row['cantidad']*$row['precio']."</td></tr>";
	   	$unidades_total += $row['cantidad'];
	   	$valor_total += $row['cantidad']*$row['precio'];
   	}
   	echo "<tr style='height: 50px;'><td></td><td class='text-primary'> Cantidad total: ".$unidades_total."</td><td></td><td class='text-primary'>Importe total: $".$valor_total."</td></tr>";
?>