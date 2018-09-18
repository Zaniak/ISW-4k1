<?php
if (!empty($_POST)) {
    include "DE_conexion.php";

    $obj = $_POST['data'];
    $forma_pago = $obj['forma_pago'];
    $domicilio = $obj['domicilio'];
    $paga = $obj['paga'];
    $fecha = $obj['fecha'];
    $id = $obj['id'];

    for ($i=$obj["cantidad_items"]; $i>0; $i--)
    {
        $id_producto = $obj['id_producto'.$i];
        $cantidad = $obj['cantidad'.$i];
        $precio = $obj['precio'.$i];
        $sql= "INSERT INTO t_detalles_pedido(id_detalle_pedido, id_producto, cantidad, precio) VALUES (1,$id_producto,$cantidad,$precio)";
        $res = $con->query($sql);
    }



    $sql2 = "INSERT INTO t_pedido(id_detalle_pedido, id_forma_de_pago, fecha_hora, domicilio_de_entrega, fecha_hora_entrega, con_cuanto_paga)
VALUES ($id,$forma_pago,NOW(),'".$domicilio."','".$fecha."',$paga)";
    $resultado = $con->query($sql2);
}
?>