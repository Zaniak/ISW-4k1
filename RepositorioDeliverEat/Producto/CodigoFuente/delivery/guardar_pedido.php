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
  <body class="text-center" style="background-color: #EEE;">
    <div class="bg-warning ">
      <div class="card-head"><h3> Estado del pedido: </h3></div>
      <div class="card-body"> <h5 class="text-dark">Su pedido se generó correctamente!. Puede consultar el estado del mismo desde el panel de opciones.<h5></div>
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
        if(comida == 'Seleccionar..'){
          alert('Debe seleccionar algún producto.');
        }
        else{
          var cantidad = $("#cantidad_comida").val();
          var descripcion = $("#descripcion_comida").val();
          var precio = $("#valor_comida").val();
          $.ajax({
            url: 'ajax_add_carrito.php?comida='+comida+'&cantidad='+cantidad+'&descripcion='+descripcion+'&precio='+precio,
            success: function(respuesta) {
              refresh_visor();
            }
          });
        }
      });
      $("#subtract_carrito").click(function() {
        $.ajax({
          url: 'ajax_subtract_carrito.php',
          success: function(respuesta) {
            refresh_visor();
          }
        });
      });      
      function refresh_visor(){
        $.ajax({
          url: 'ajax_refresh_visor.php',
          success: function(respuesta) {
            $("#visor").html(respuesta);
          }
        });
      }
    </script>

  </body>

</html>
