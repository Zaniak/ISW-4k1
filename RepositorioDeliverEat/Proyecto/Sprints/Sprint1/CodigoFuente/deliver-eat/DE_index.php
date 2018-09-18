<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nombre del local</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/DE_favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/DE_bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/DE_animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/DE_hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/DE_animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/DE_select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/DE_daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/DE_slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/DE_lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/DE_util.css">
    <link rel="stylesheet" type="text/css" href="css/DE_main.css">
    <!--===============================================================================================-->
</head>
<body class="animsition">
<?php
include "./php/DE_conexion.php";
$sql1 = "SELECT C.nombre AS nombre, C.descripcion AS descripcion,C.imagen_url AS logo,
          C.imagen_url_grande AS imagen
          FROM t_comercio_adherido C WHERE C.id_comercio = 1;";
$query = $con->query($sql1);
$comercio = null;
if ($query->num_rows > 0) {
    while ($r = $query->fetch_object()) {
        $comercio = $r;
        break;
    }
}
?>
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
        <div class="wrap_header trans-0-3">
            <!-- Logo -->
            <div class="logo">
                <img src="<?php echo $comercio->logo; ?>" alt="IMG-LOGO">
            </div>
            <div class="social flex-w flex-l-m p-r-20">
                <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
            </div>
        </div>
    </div>
    </div>
</header>

<!-- Sidebar -->
<aside class="sidebar trans-0-4">
    <!-- Sidebar Title-->
    <h3 class="tit-hide-sidebar tit10">
        Mi Carrito
    </h3>

    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <ul class="menu-sidebar p-t-95" id="carrito">
        <div class="col-md-8 col-lg-6 m-l-r-auto text-blo3">
            <span id="peso_carrito">El carrito tiene 0/10</span>
        </div><br>


    </ul>

    <ul class="menu-sidebar p-t-95">
        <li>
            <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Total
                    <input class="col-md-3 to-right m-l-250" type="number" step="0.01" id="total_pedido"
                           name="total_pedido"
                           placeholder="Total" style="display: initial;padding-right: 0px;padding-left: 0px" disabled>
                </span>
            </div>
        </li>
        <li>
            <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40" style="width:100%">
                    Forma de Pago
                    <select class="col-md-5 to-right m-l-95" id="forma_pago" name="forma_pago"
                            style="display: initial;padding-right: 0px;padding-left: 0px">
                        <option value="2">Efectivo</option>
                        <option value="1">Visa</option>
                    </select>
                </span>
            </div>
        </li>
        <li>
            <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Con cuanto abona
                    <input class="col-md-5 to-right m-l-90" type="number" step="0.01" id="con_cuanto_abona"
                           name="con_cuanto_abona"
                           placeholder="Con cuanto abona" style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
            </div>
        </li>
        <li>
            <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Domicilio de Entrega
                    <input class="col-md-5 to-right m-l-65" type="text" id="domicilio" name="domicilio"
                           placeholder="Av. J. B. Justo N° XXXX"
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
            </div>
        </li>
        <li>
            <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40" style="width: 100%">
                    Cuando quieres recibirlo
                    <input class="col-md-5 to-right m-l-39" type="datetime-local" id="cuando_quieres_recibirlo"
                           name="cuando_quieres_recibirlo"
                           placeholder="Cuando quieres recibirlo"
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
            </div>
        </li>
        <li class="btn-completar-pedido">
            <button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-t-40 m-b-50" onclick="guardarPedido()">
                Completar Pedido
            </button>
        </li>
    </ul>
</aside>

<!-- Title Page -->
<section class="bg-title-page flex-c-m p-b-80 p-l-15 p-r-15"
         style="background-image: url(<?php echo $comercio->imagen ?>);">
    <div style="width: 100%;position:relative;">
        <h2 class="tit6 t-center" style="width: 100%">
            <?php echo $comercio->nombre ?>
        </h2>
    </div>
    <div class="m-t-120 t-center" style="width: 100%;position:absolute">
        <span class="txt31" style="font-size: 18px;">
								<?php echo $comercio->descripcion ?>
							</span>
    </div>
</section>

<!-- Main menu -->
<section class="section-mainmenu bg1-pattern">
    <div class="container">
        <div class="row p-t-108 p-b-70">
            <div class="col-md-8 col-lg-6 m-l-r-auto">
                <h3 class="tit-mainmenu tit10 p-b-25 align-content-center">
                    Nuestros Productos
                </h3>
                <div class="container">
                    <div class="row p-t-108 p-b-70">

                        <!-- Block3 -->

                        <?php
                        include "./php/DE_conexion.php";
                        $sql2 = "SELECT P.id_producto AS id_producto, P.nombre AS nombre_producto,
                              P.descripcion AS descripcion_producto, P.precio AS precio_producto, P.peso AS peso_producto,
                              P.imagen_url AS imagen_producto
                              FROM t_productos P WHERE P.id_comercio = 1;";
                        $query2 = $con->query($sql2);
                        if ($query->num_rows > 0) {
                            while ($r = $query2->fetch_object()) {
                                ?>
                                <div class="blo3 flex-w flex-col-l-sm m-b-30">
                                    <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                        <img src="<?php echo $r->imagen_producto ?>" alt="IMG-MENU"></a>
                                    </div>

                                    <div class="text-blo3 size21 flex-col-l-m">
                                        <p class="txt21 m-b-3">
                                            <?php echo $r->nombre_producto ?>
                                        </p>

                                        <span class="txt23">
								<?php echo $r->descripcion_producto ?>
							</span>

                                        <span class="txt22 m-t-20">
                                    $<?php echo $r->precio_producto ?>
                                            <button
                                                    id="<?php echo $r->id_producto ?>"
                                                    class="m-l-35 p-1 btn3 flex-c-m size18 txt11 trans-0-4"
                                                    style="display: initial;"
                                                    onclick="agregarAlCarrito(this)">
                                        Agregar al carrito
                                    </button>
                            </span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/DE_jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/DE_animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/DE_popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/DE_bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/DE_select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/daterangepicker/DE_moment.min.js"></script>
<script type="text/javascript" src="vendor/daterangepicker/DE_daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/slick/DE_slick.min.js"></script>
<script type="text/javascript" src="js/DE_slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/parallax100/DE_parallax100.js"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/DE_countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/lightbox2/js/DE_lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="js/DE_main.js"></script>

<script>
    var cantidad_items = 0;
    var total = 0;
    var peso = 0;

    function agregarAlCarrito(boton) {
        let id = boton.id;
        var div_cont = '#div' + id;
        if (peso >= 10) {
            alert("El carrito esta lleno");
        }
        else {
            if ($(div_cont).length > 0) {
                alert("La comida que intenta agregar ya esta en su carrito");
            }
            else {
                cantidad_items++;
                console.log(cantidad_items);
                var data = {
                    "id": id,
                    "cantidad_items": cantidad_items
                }
                $.ajax({
                    type: 'POST',
                    data: {data: data},
                    url: './php/DE_agregarProductoAlCarrito.php',
                    success: function (response) {
                        $('#carrito').append(response);
                    },
                    error: function (request, status, error) {
                        alert(request.responseText, status, error);
                    }
                });
            }
        }
    }

    function quitar(boton) {
        cantidad_items--;
        var regex = /(\d+)/g;
        let id = boton.id;
        var str = id.match(regex);
        var idli = '#li' + str;
        var peso_item = '#peso' + str;
        console.log(peso_item);
        console.log($(peso_item).text());
        peso -= Number($(peso_item).text().match(regex));
        carrito();
        restarTotal(str);
        $(idli).remove();
    }

    function sumarTotal() {
        total = 0;
        peso = 0;
        var regex = /(\d+)/g;
        console.log(cantidad_items);
        for (i = cantidad_items; i > 0; i--) {
            var id = $('#precio_carrito' + i).parents('li').attr('id').match(regex);
            var peso_item = '#peso' + id;
            total += Number($('#precio_carrito' + i).text().match(regex)) * $('#cant_producto' + i).val();
            peso += Number($(peso_item).text().match(regex)) * $('#cant_producto' + i).val();
            console.log(peso);
            carrito();
        }
        $('#total_pedido').val(total);
    }

    function restarTotal(i) {
        var regex = /(\d+)/g;
        total -= Number($('#precio_carrito' + i).text().match(regex)) * $('#cant_producto' + i).val();
        $('#total_pedido').val(total);
    }

    function guardarPedido() {
        if(peso < 10)
        {
            var data = {
                "id": 1,
                "cantidad_items": cantidad_items
            }
            for (i = cantidad_items; i > 0; i--) {
                var regex = /(\d+)/g;
                var id = $('#precio_carrito' + i).parents('li').attr('id').match(regex);
                data['id_producto' + i] = id[0];
                data['cantidad' + i] = $('#cant_producto' + i).val();
                data['precio' + i] = Number($('#precio_carrito' + i).text().match(regex));
            }
            data['forma_pago'] = $('#forma_pago').val();
            data['domicilio'] = $('#domicilio').val();
            data['paga'] = $('#con_cuanto_abona').val();
            data['fecha'] = $('#cuando_quieres_recibirlo').val().replace('T', ' ');
            ;

            $.ajax({
                type: 'POST',
                data: {data: data},
                url: './php/DE_confirmarPedido.php',
                success: function (response) {
                    alert("Pedido confirmado");
                    window.location = "./DE_index.php";
                },
                error: function (request, status, error) {
                    alert(request.responseText, status, error);
                }
            });
        }
        else{
            alert("No se puede guardar el pedido, porque el carrito esta lleno");
        }

    }
    function carrito(){
        if(peso >= 10)
        {
            $('#peso_carrito').text("El carrito esta lleno!!")
            $('#peso_carrito').css("color", "red");
        }
        else{
            $('#peso_carrito').text("El carrito tiene "+peso+"/10")
            $('#peso_carrito').css("color", "black");
        }
    }
</script>

</body>
</html>
