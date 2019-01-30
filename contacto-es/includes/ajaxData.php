<?php
//Include the database configuration file
include 'dbConfig_borse_clientes.php';

if(!empty($_POST["country_id"]) && !empty($_POST["lada_id"])){

    //Fetch all City data
    $query = "SELECT * FROM sys_cities WHERE lada = ".$_POST['lada_id']." ORDER BY nombre ASC";
    $result = $link->query($query);
    $row = mysqli_fetch_array($result);
    $ptr_estado = $row["ptr_edo"];


    //Fetch State data
    $query = "SELECT * FROM sys_states WHERE id = ".$ptr_estado."";
    $result = $link->query($query);
    $row = mysqli_fetch_array($result);
    $estado = $row["nombre"];

    //State option list
    if($estado){
        echo $estado;
    }else{
        echo 'Estado no disponible';
    }
} elseif (!empty($_POST["country_id"])){

    // Fetch countrycode
    $query = "SELECT phonecode FROM sys_countries WHERE id = ".$_POST['country_id'];
    $result = $link->query($query);
    $row = mysqli_fetch_array($result);
    $countrycode = $row["phonecode"];

    if($countrycode){
        echo $countrycode;
    }else{
        echo 'C&#243;digo de pa&#237;s no disponible';
    }
}
?>