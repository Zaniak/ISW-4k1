<?php
function conectar() {
    $host="localhost";
    $usuario = 'admin';
    $clave = 'admin';

    $ret = mysql_connect($host, $usuario, $clave) or die("No se pudo conectar a la BD");
    mysql_select_db('delivery', $ret);
    mysql_set_charset('utf8');
    return $ret;
  }
  ?>