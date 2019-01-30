<?php

//Parámetros base de datos operaciones
$servername_operaciones = 'borse.com.mx';
$username_operaciones = 'borse_oper';
$password_operaciones = 'Y781rkB1n7RC';
$dbname_operaciones = 'borse_clientes';

//Connect and select the database
$link = new mysqli($servername_operaciones, $username_operaciones , $password_operaciones, $dbname_operaciones);

if ($link->connect_error) {
    die("Sin conexión a la base de datos: " . $link->connect_error);
}
?>