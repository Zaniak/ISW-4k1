<?php
  require_once('conexion.php');
  conectar();
  $sql = "SELECT * FROM comidas WHERE tipo_comida = '".$_REQUEST['filtro_comidas']."' ORDER BY nombre_comida";
  $result = mysql_query($sql);
  			echo "<option disabled selected>Seleccionar..</option>";
            while($row = mysql_fetch_array($result)){
              echo "<option value=".$row['id_comida'].">".$row['nombre_comida']."</option>";
            }
?>