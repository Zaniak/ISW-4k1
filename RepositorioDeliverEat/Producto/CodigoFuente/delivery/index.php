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
      <h5> Comercio seleccionado: <span class="text-dark">El Mesón</span></h5>
    </div>
    <div class="card card-body">

      <div class="row mt-2 mb-2">
        <div class="col-3">
          <div id="content-wrapper">
            Tipo de comida:
            <select id="filtro_comidas" style="width: 10rem;">
              <option disabled selected>Seleccionar..</option>
              <option value="bebidas" >Bebidas</option>
              <option value="pastas" >Pastas</option>
              <option value="pizzas" >Pizzas</option>
              <option value="sandwiches" >Sandwiches</option>
            </select>
          </div>
        </div>
        <div class="col-2">
          Productos:
          <select id="comidas_sin_seleccionar" style="width: 10rem;">
            <option disabled selected>Seleccionar..</option>
            <?php
              $sql = "SELECT * FROM comidas";
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)){
                echo "<option value=".$row['id_comida'].">".$row['nombre_comida']."</option>";
              }
            ?>
          </select>
        </div>
        <div class="col">
          Valor unit ($):
          <input type="text" id="valor_comida" readonly size="3">
        </div>
        <div class="col">
          Cantidad:
          <input type="text" id="cantidad_comida" value="1" size="1">
        </div>
        <div class="col-3">
          Añadir una nota:
          <input type="text" id="descripcion_comida" value="" size="20">
        </div>
        <div class="col">
          <button id="add_carrito" class="btn btn-info bordered"><i class="fas fa-plus"></i> Añadir al carrito</button>
        </div>
      </div>
    </div>
    <div class="card m-5">
      <div class="card-header">
       <i class="fas fa-cart-plus"></i> My carrito de comras !
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
    </div>
    <div class="card card-body row m-5">
      <h5 class="text-info mb-5">Datos de Envío:</h5>
      <table cellpadding="5" style="width: 500px;">
        <tr>
          <td width="200px;">Dirección de envío:</td>
          <td><input type="text" id="domicilio" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Forma de pago: </td>
          <td>
            <select id="forma_pago" style="width: 100%;">
              <option disabled selected>Seleccionar..</option>
              <option value="efectivo">Efectivo</option>
              <option value="visa">tarjeta VISA</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Fecha de entrega:</td>
          <td><input type="date" placeholder="dd/mm/aaaa" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Hora de entrega:</td>
          <td><input type="text" placeholder="00:00" style="width: 100%;"></td>
        </tr>
      </table>
    </div>
          <div class="text-center bordered">
        <button class="btn btn-secondary" style="width: 300px; padding: 5px">Confirmar pedido</button>
      </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

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
        var cantidad = $("#cantidad_comida").val();
        var descripcion = $("#descripcion_comida").val();
        var precio = $("#valor_comida").val();
        $.ajax({
          url: 'ajax_add_carrito.php?comida='+comida+'&cantidad='+cantidad+'&descripcion='+descripcion+'&precio='+precio,
          success: function(respuesta) {
            $.ajax({
            url: 'ajax_refresh_visor.php',
            success: function(respuesta) {
              $("#visor").html(respuesta);
            }
            });
          }
        });

      });
    </script>

  </body>

</html>
