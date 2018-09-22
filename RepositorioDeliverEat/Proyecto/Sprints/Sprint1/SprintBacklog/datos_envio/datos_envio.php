<!DOCTYPE html>
<html lang="en">

<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- Esta linea puede que haya que actualizarle el 'href=' en el otro proyecto -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <!-- Formulario para datos de envío -->
    <form>
        <div class="card card-body m-5">
            <h5 class="text-info mb-5">Datos de Envío:</h5>
            <ul style="list-style:none;">
                <li>
                    <label for="domicilio">Dirección de envío:</label>
                    <input type="text" class="form-control col-3" id="domicilio" required>
                </li>
                <li>
                    <span>Forma de pago:</span>
                    <select class="form-control col-3" id="forma_pago" required title="seleccione una opcion.">
                        <option value="">Seleccionar..</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="visa">tarjeta VISA</option>
                    </select>
                </li>
                <!-- seleccionar efectivo -->
                <li class="group_efectivo" style="display: none;">
                    <i>Importe en efectivo con el cual va a abonar:</i>
                    <input type="text" class="efectivo form-control col-3" id="monto_efectivo" pattern="([0-9]*){0,7}" title="Solo se aceptan números.">
                </li>
                <!-- seleccionar VISA -->
                <li class="group_visa" style="display: none;">
                    <i>Código de tarjeta:</i>
                    <input type="text" class="visa form-control col-3" id="codigo_tarjeta" placeholder="16 dígitos sin espacios" pattern="[0-9]{16}" title="Solo se acepta un número de 16 dígitos.">
                </li>
                <li class="group_visa" style="display: none;">
                    <i> fecha de vencimiento:</i>
                    <input type="text" class="visa form-control col-3" id="vencimiento_tarjeta" value="00/00" title="Solo se aceptan números." readonly>
                </li>
                <li class="group_visa" style="display: none;">
                    <i> Nombre completo:</i>
                    <input type="text" class="visa form-control col-3" id="nombre_tarjeta" placeholder="como sale en su tarjeta" pattern="^[a-zA-Z ]*$" title="Solo se aceptan letras.">
                </li>
                <li class="group_visa" style="display: none;">
                    <i> Código de seguridad:</i>
                    <input type="text" class="visa form-control col-3" id="nombre_tarjeta" placeholder="3 dígitos" pattern="[0-9]{3}" title="Solo se acepta un número de 3 dígitos.">
                </li>
                <li>
                    <label for="domicilio">Tipo de envío</label>
                    <select class="form-control col-3" id="tipo_pago" required title="seleccione una opcion.">
                        <option value="">Seleccionar..</option>
                        <option value="envio_normal">Normal</option>
                        <option value="envio_cuanto_antes">Lo antes posible</option>
                    </select>
                </li>
                <li class="group_fecha_entrega" style="display: none;">
                    <span>Fecha de entrega:</span>
                    <input type="text" class="form-control col-3" id="fecha_entrega" value="<?php echo date(" d/m/Y "); ?>" required readonly>
                </li>
                <li class="group_hora_entrega" style="display: none;">
                    <span>Hora de entrega:</span>
                    <div class="row">
                        <div class="col-1">
                            <input type="text" class="form-control" id="hr_entrega" placeholder="hh" pattern="[0-9]{2}" title="Solo nro" required>
                        </div>:
                        <div class="col-1">
                            <input type="text" class="form-control" id="min_entrega" placeholder="mm" pattern="[0-9]{2}" title="Solo nro" required>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="text-center bordered">
            <button class="btn btn-info" name="guardar_pedido" style="width: 300px; padding: 5px">Confirmar pedido !</button>
        </div>
    </form>
</body>
</html>

<!-- js asociado al formulario para datos de envío -->
<script>
    $(function() {
        $("#fecha_entrega").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

    $(function() {
        $("#vencimiento_tarjeta").datepicker({
            dateFormat: 'mm/y'
        });
    });

    $("#tipo_pago").change(function() {
        if ($("#tipo_pago").val() == 'envio_normal') {
            $(".group_fecha_entrega, .group_hora_entrega ").show();
            $('#fecha_entrega, #hr_entrega, #min_entrega').attr('required', true);
        } else {
            $(".group_fecha_entrega, .group_hora_entrega ").hide();
            $('#fecha_entrega, #hr_entrega, #min_entrega').attr('required', false);
        }
    });

    $("#forma_pago").change(function() {
        if ($("#forma_pago").val() == 'efectivo') {
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