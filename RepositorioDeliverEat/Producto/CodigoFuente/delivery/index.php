<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DeliverEat! </title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
  <?php
    require_once('conexion.php');
    conectar();
  ?>
  <body style=" background-color: rgb(252, 249, 242)">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.html"><h3><span class="text-warning"><i class="fas fa-truck"></i> DeliverEat!</span> Servicio de delivery de “lo que sea”</a></h3>
    </nav>
    <div class="mt-3 mb-3 text-center text-secondary">
      <h5> Comercio seleccionado: <span class="text-dark">MiniShop</span></h5>
    </div>
    <div class="card card-body">
      <table>
        <tr>
          <td>Tipo de comida:</td>
          <td>Productos:</td>
          <td>Valor unit ($):</td>
          <td>Cantidad:</td> 
          <td>Añadir nota:</td>
        </tr>
        <tr>
          <td>
            <select class="form-control" id="filtro_comidas" style="width: 20rem;">
              <option disabled selected>Seleccionar..</option>
              <option value="bebidas" >Bebidas</option>
              <option value="pastas" >Pastas</option>
              <option value="pizzas" >Pizzas</option>
              <option value="sandwiches" >Sandwiches</option>
            </select>
          </td>
          <td>
            <select class="form-control" id="comidas_sin_seleccionar" style="width: 20rem;">
              <option disabled selected>Seleccionar..</option>
              <?php
                $sql = "SELECT * FROM comidas";
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result)){
                  echo "<option value=".$row['id_comida'].">".$row['nombre_comida']."</option>";
                }
              ?>
            </select>
          </td>
          <td>
            <input type="text" class="form-control" id="valor_comida" readonly style="width: 10rem;">
          </td>
          <td>
            <input type="text" class="form-control" id="cantidad_comida" value="1" style="width: 5rem;">
          </td>
          <td>
            <input type="text" class="form-control" id="descripcion_comida" value="" style="width: 20rem;">
          </td>
        </tr>
        <tr>
          <td colspan="5" align="center">
            <button id="add_carrito" class="btn btn-secondary bordered text-warning mt-4" style="width: 200px;">
              <i class="fas fa-plus"></i> Añadir al carrito
            </button>
            <input type="hidden" id="tam_carrito">
          </td>
        </tr>
      </table>
    </div>
    <div class="card m-5">
      <div class="card-header">
       <i class="fas fa-cart-plus"></i> My carrito de compras: <i class="text-secondary">(max. 20 articulos por envío)</i>
      </div>
      <div class="card-body">
        <table class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
          <thead>
            <tr>
              <th><b>Nombre</b></th>
              <th><b>Cantidad</b></th>
              <th><b>Nota</b></th>
              <th><b>Subtotal ($)</b></th>
            </tr>
          </thead>
          <tbody id="visor">
            <!-- aquí se visualizan los artículos del carrito -->
          </tbody>
        </table>
      </div>
      <div class="card-footer text-center">
        <button id="subtract_carrito" class="btn btn-secondary text-warning" style="width: 200px;">
          <i class="fas fa-broom"></i> Quitar ultimo pedido
        </button>
      </div>
    </div>
    <div class="card card-body row m-5">
      <h5 class="text-info mb-5">Datos de Envío:</h5>
      <table cellpadding="5" style="width: 500px;">
        <tr>
          <td width="200px;">Dirección de envío:</td>
          <td><input type="text" class="form-control" id="domicilio" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Forma de pago: </td>
          <td>
            <select class="form-control" id="forma_pago" style="width: 100%;">
              <option disabled selected>Seleccionar..</option>
              <option value="efectivo">Efectivo</option>
              <option value="visa">tarjeta VISA</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Importe en efectivo</td>
          <td><input type="text" class="form-control" id="monto_efectivo" readonly value="0" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Fecha de entrega:</td>
          <td><input type="date" class="form-control" id="fecha_envio" placeholder="dd/mm/aaaa" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Hora de entrega:</td>
          <td><input type="text" class="form-control" id="hr_envio" placeholder="00:00" style="width: 100%;"></td>
        </tr>
      </table>
    </div>
      <div class="text-center bordered">
        <button class="btn btn-info" id="guardar_pedido" style="width: 300px; padding: 5px">Confirmar pedido !</button>
      </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script>
      $(window).ready(function() {
        validar_total_carrito();
        refresh_visor();
      });
      $("#filtro_comidas").change(function() {
        var filtro = $("#filtro_comidas").val();
        $.ajax({
          url: 'ajax_filtro_comidas.php?filtro_comidas='+filtro,
          success: function(respuesta) {
            $("#comidas_sin_seleccionar").html(respuesta);
          }
        });
      });
      $("#comidas_sin_seleccionar").change(function() {
        var comida = $("#comidas_sin_seleccionar option:selected").text();
        $.ajax({
          url: 'ajax_ver_precio_unitario.php?comida='+comida,
          success: function(respuesta) {
            $("#valor_comida").val(respuesta);
          }
        });
      }); 
      $("#add_carrito").click(function() {
        var comida = $("#comidas_sin_seleccionar option:selected").text();
        if(comida == 'Seleccionar..'){
          alert('Debe seleccionar algún producto.');
        }
        else
        {
          validar_total_carrito();
          var proximo_tam_carrito = parseInt($('#tam_carrito').val(), 10) + parseInt($('#cantidad_comida').val(), 10);
          if(proximo_tam_carrito > 20){
            alert('Se exede el total de articulos por pedido (20 articulos).');
          }
          else
          {
            var cantidad = $("#cantidad_comida").val();
            var descripcion = $("#descripcion_comida").val();
            var precio = $("#valor_comida").val();
            $.ajax({
              url: 'ajax_add_carrito.php?comida='+comida+'&cantidad='+cantidad+'&descripcion='+descripcion+'&precio='+precio,
              success: function(respuesta) {
                refresh_visor();
                validar_total_carrito();
              }
            });
          }
        }
      });
      $("#subtract_carrito").click(function() {
        $.ajax({
          url: 'ajax_subtract_carrito.php',
          success: function(respuesta) {
            validar_total_carrito();
            refresh_visor();
          }
        });
      });
      $("#forma_pago").change(function() {
        if($("#forma_pago").val() == 'efectivo'){
          $('#monto_efectivo').val(0);
          $('#monto_efectivo').attr('readonly', false);    
        }
        else
        {
          $('#monto_efectivo').val(0);
          $('#monto_efectivo').attr('readonly', true);
        }
      });        
      function refresh_visor(){
        $.ajax({
          url: 'ajax_refresh_visor.php',
          success: function(respuesta) {
            $("#visor").html(respuesta);
          }
        });
      }
      function validar_total_carrito(){
        $.ajax({
          url: 'ajax_validar_total.php',
          success: function(respuesta) {
             $('#tam_carrito').val(respuesta);
          }
        });
      }
      $("#guardar_pedido").click(function() {

        var domicilio = $("#domicilio").val();
        var forma_pago = $("#forma_pago").val();
        var importe_efectivo = $("#monto_efectivo").val();
        var fecha_entrega = $("#fecha_envio").val();
        var hr_entrega = $("#hr_envio").val();

        $.ajax({
          url: 'ajax_datos_envio.php?domicilio='+domicilio+'&forma_pago='+forma_pago+'&importe_efectivo='+importe_efectivo+'&fecha_entrega='+fecha_entrega+'&hr_entrega='+hr_entrega,
          success: function(respuesta) {
            console.log(respuesta);
            location.href="guardar_pedido.php";
          }
        });
      });
    </script>

  </body>

</html>
