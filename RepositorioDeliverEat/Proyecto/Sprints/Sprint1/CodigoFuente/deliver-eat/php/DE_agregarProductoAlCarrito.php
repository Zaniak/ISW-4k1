<?php
include "DE_conexion.php";

$obj = $_POST["data"];
$id = $obj["id"];
$cantidad_items = $obj["cantidad_items"];

$sql = "SELECT P.id_producto AS id_producto, P.nombre AS nombre_producto,
       P.descripcion AS descripcion_producto, P.precio AS precio_producto, P.peso AS peso_producto,
       P.imagen_url AS imagen_producto
FROM t_productos P WHERE P.id_producto = $id";
$res = $con->query($sql);

if ($res != null) {
    while ($row = $res->fetch_assoc()) {
        $idProducto = $row["id_producto"];
        $precio = $row["precio_producto"];
        $imagen = $row["imagen_producto"];
        $descripcion = $row["nombre_producto"];
        $peso = $row["peso_producto"];
        $html=
            '<li id="li'.$id.'" class="t-center">' .
            '<div class="blo3 flex-w flex-col-l-sm m-b-30 p-r-30 p-l-30" id="div'.$id.'">' .
            '<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">' .
            '<img src="'.$imagen.'" alt="IMG-MENU"></a>' .
            '</div>' .

            '<div class="text-blo3 size21 flex-col-l-m">' .
            '<p class="txt21 m-b-3">' .
            $descripcion .
            '</p>' .

            '<span id="precio_carrito'.$cantidad_items.'" class="txt22 m-t-10">$' .
            $precio .
            '</span>' .
            '<span class="txt22 m-t-10">' .
            '<input class="col-md-3 to-right form-control" type="number" id="cant_producto'.$cantidad_items.'"'.
            'name="cant_producto"' .
            'placeholder="Cantidad" style="display: initial;padding-right: 0px;padding-left: 0px;"
            onchange="sumarTotal()" onkeyup="sumarTotal()">' .
            '<button id="quitar'.$id.'" class="m-l-20 btn3 flex-c-m size18 txt11 trans-0-4" style="display: initial;" onclick="quitar(this)">' .
            'Quitar' .
            '</button>' .
            '</span>' .
            '</div>' .
            '</div>' .
            '</li>';
        echo $html;
    }

} else {
    echo '<p>HOLAAA333333333</p>';
}
?>