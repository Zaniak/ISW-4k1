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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

    <form id="formCarrito" name="formCarrito" method="POST">
        <ul class="menu-sidebar p-t-95" id="carrito">

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
                    <select class="form-control col-md-5 to-right m-l-95" id="forma_pago" name="forma_pago" required
                            title="seleccione una opcion."
                            style="display: initial;padding-right: 0px;padding-left: 0px">
                        <option value="">Seleccionar..</option>
                        <option value="2">Efectivo</option>
                        <option value="1">Visa</option>
                    </select>
                </span>
                </div>
            </li>
            <!-- seleccionar efectivo -->
            <li class="group_efectivo" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Con cuanto abona
                    <input type="text" class="form-control efectivo col-md-5 to-right m-l-95" id="monto_efectivo"
                           name="monto_efectivo" pattern="([0-9]*){0,7}" title="Solo se aceptan números."
                           style="display: initial;padding-right: 0px;padding-left: 0px"
                           placeholder="Con cuanto abona">
                </span>
                </div>
            </li>
            <!-- seleccionar VISA -->
            <li class="group_visa" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40 m-r-3">
                    Código de tarjeta:
                    <input type="text" class="visa form-control col-md-5 to-right m-l-105" id="codigo_tarjeta"
                           name="codigo_tarjeta" placeholder="16 dígitos sin espacios" pattern="[0-9]{16}"
                           title="Solo se acepta un número de 16 dígitos."
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li class="group_visa" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Fecha de vencimiento:
                    <input type="text" class="visa form-control col-md-2 text-center m-l-175" id="vencimiento_tarjeta"
                           name="vencimiento_tarjeta" value="00/00" title="Solo se aceptan números." readonly
                           style="text-align:center; display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li class="group_visa" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Nombre completo:
                    <input type="text" class="visa form-control col-md-5 to-right m-l-95" id="nombre_tarjeta"
                           name="nombre_tarjeta" placeholder="como sale en su tarjeta" pattern="^[a-zA-Z ]*$"
                           title="Solo se aceptan letras."
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li class="group_visa" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Código de seguridad:
                    <input type="text" class="visa form-control col-md-2 to-right m-l-185" id="codigo_seguridad"
                           name="codigo_seguridad" placeholder="3 dígitos" pattern="[0-9]{3}"
                           title="Solo se acepta un número de 3 dígitos."
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li>
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Domicilio de Entrega
                    <input class="form-control col-md-5 to-right m-l-75" type="text" id="domicilio" name="domicilio"
                           placeholder="Av. J. B. Justo N° XXXX"
                           style="display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li>
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40" style="width:100%">
                    Tipo de Envio
                    <select class="form-control col-md-5 to-right m-l-95" id="tipo_pago" name="tipo_pago"
                            title="seleccione una opcion."
                            style="display: initial;padding-right: 0px;padding-left: 0px">
                        <option value="">Seleccionar..</option>
                        <option value="envio_normal">Normal</option>
                        <option value="envio_cuanto_antes">Lo antes posible</option>
                    </select>
                </span>
                </div>
            </li>
            <li class="group_fecha_entrega" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                <span class="to-left m-l-40">
                    Fecha de entrega:
                    <input type="text" class="form-control col-md-3 text-center m-l-170" id="fecha_entrega"
                           value="<?php echo date(" d/m/Y "); ?>" required readonly
                           style="text-align:center; display: initial;padding-right: 0px;padding-left: 0px">
                </span>
                </div>
            </li>
            <li class="group_fecha_entrega" style="display: none;">
                <div class="text-blo3 size12 flex-col-l-m">
                    <div class="row to-left m-l-40">
                        Hora de entrega:
                        <div class="col-2 m-l-150">
                            <input type="text" class="form-control" id="hr_entrega" placeholder="hh" pattern="[0-9]{2}"
                                   title="Solo nro" required>
                        </div>
                        :
                        <div class="col-2">
                            <input type="text" class="form-control" id="min_entrega" placeholder="mm" pattern="[0-9]{2}"
                                   title="Solo nro" required>
                        </div>
                    </div>
                </div>
            </li>
            <li class="btn-completar-pedido">
                <input type="submit" id="boton_submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-t-40 m-b-50"
                       value="Completar Pedido"
                />
            </li>
        </ul>
    </form>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $("#formCarrito").submit(function (event) {
        event.preventDefault();
        guardarPedido();
    });
    var cantidad_items = 0;
    var total = 0;


    function agregarAlCarrito(boton) {
        let id = boton.id;
        var div_cont = '#div' + id;
        if ($(div_cont).length > 0) {
            alert("La comida que intenta agregar ya esta en su carrito");
        }
        else {
            cantidad_items++;
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

    function quitar(boton) {
        cantidad_items--;
        var regex = /(\d+)/g;
        let id = boton.id;
        var str = id.match(regex);
        var idli = '#li' + str;
        peso -= Number($(peso_item).text().match(regex));
        restarTotal(str);
        $(idli).remove();
    }

    function sumarTotal() {
        total = 0;
        peso = 0;
        var regex = /(\d+)/g;
        for (i = cantidad_items; i > 0; i--) {
            var id = $('#precio_carrito' + i).parents('li').attr('id').match(regex);
            total += Number($('#precio_carrito' + i).text().match(regex)) * $('#cant_producto' + i).val();
        }
        $('#total_pedido').val(total);
    }

    function restarTotal(i) {
        var regex = /(\d+)/g;
        total -= Number($('#precio_carrito' + i).text().match(regex)) * $('#cant_producto' + i).val();
        $('#total_pedido').val(total);
    }

    function guardarPedido() {
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

        if ($('#tipo_pago').val() == "envio_normal") {
            fecha = $('#fecha_entrega').val() + $('#hr_entrega').val() + ":" + $('#min_entrega').val();
            data['fecha'] = fecha;
        } else {
            data['fecha'] = "lo antes posible";
        }

        if ($('#monto_efectivo').val() == "") {
            data['paga'] = "null";
        } else {
            data['paga'] = $('#monto_efectivo').val();
        }

        if ($('#codigo_seguridad').val() == "") {
            data['cod_tarjeta'] = "null";
        } else {
            data['cod_tarjeta'] = $('#codigo_seguridad').val();
        }

        if ($('#codigo_tarjeta').val() == "") {
            data['num_tarjeta'] = "null";
        } else {
            data['num_tarjeta'] = $('#codigo_seguridad').val();
        }

        data['nombre_tarjeta'] = $('#nombre_tarjeta').val();
        data['vencimiento_tarjeta'] = $('#vencimiento_tarjeta').val();

        $.ajax({
            type: 'POST',
            data: {data: data},
            url: './php/DE_confirmarPedido.php',
            success: function (response) {
                alert(response);
                console.log(response);
                alert("Pedido confirmado");
            }
        });

    }

    $(function () {
        $("#fecha_entrega").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

    $(function () {
        $("#vencimiento_tarjeta").datepicker({
            dateFormat: 'mm/yy'
        });
    });

    $("#tipo_pago").change(function () {
        if ($("#tipo_pago").val() == 'envio_normal') {
            $(".group_fecha_entrega, .group_hora_entrega ").show();
            $('#fecha_entrega, #hr_entrega, #min_entrega').attr('required', true);
        } else {
            $(".group_fecha_entrega, .group_hora_entrega ").hide();
            $('#fecha_entrega, #hr_entrega, #min_entrega').attr('required', false);
        }
    });

    $("#forma_pago").change(function () {
        if ($("#forma_pago").val() == '2') {
            $('#monto_efectivo').val('');
            $('.group_efectivo').show();
            $('.group_visa').hide();
            $('.visa').attr('required', false);
            $('.efectivo').attr('required', true);
        } else {
            $('#monto_efectivo').val('');
            $('.group_efectivo').hide();
            $('.group_visa').show();
            $('.visa').attr('required', true);
            $('.efectivo').attr('required', false);
        }

    });

</script>

</body>
</html>
