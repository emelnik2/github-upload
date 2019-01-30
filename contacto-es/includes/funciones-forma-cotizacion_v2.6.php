<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT']."/dev/libs/phpmailer/phpmailer/src/Exception.php";
require $_SERVER['DOCUMENT_ROOT']."/dev/libs/phpmailer/phpmailer/src/PHPMailer.php";
require $_SERVER['DOCUMENT_ROOT']."/dev/libs/phpmailer/phpmailer/src/SMTP.php";

include 'string_replace.php';

//require $_SERVER['DOCUMENT_ROOT']."/dev/vendor/autoload.php";

date_default_timezone_set('America/Mexico_City');

//Obtenemos el asesor activo y asignamos al siguiente asesor por rotación

//Parámetros base de datos asesores
$servername = 'borse.com.mx';
$username = 'borse_oper';
$password = 'Y781rkB1n7RC';
$dbname = 'borse_asesores';

//Parámetros base de datos operaciones
$servername_operaciones = 'borse.com.mx';
$username_operaciones = 'borse_oper';
$password_operaciones = 'Y781rkB1n7RC';
$dbname_operaciones = 'borse_clientes';


$link = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Fallo en la conexión: %s\n", mysqli_connect_error());
    exit();
}

$query="SELECT * from Tabla_Asesores where actual_cotizacion = 1";
$result = $link->query($query);

while ($row = mysqli_fetch_array($result)) {

    $email_asesor = $row["mail"];
    $nombre_asesor = $row["descr"];
    $id_asesor = $row["ID"];

}

$query="SELECT MAX(ID) AS LastID FROM Tabla_Asesores";
$result = $link->query($query);
$row = mysqli_fetch_array($result);
$last_id = $row["LastID"];

if ($id_asesor == $last_id) {
    $query="SELECT MIN(ID) AS FirstID FROM Tabla_Asesores";
    $result = $link->query($query);
    $row = mysqli_fetch_array($result);
    $next_id = $row["FirstID"];
} else {
    $next_id = $id_asesor + 1;
}

$query="UPDATE Tabla_Asesores SET actual_cotizacion = 0 WHERE ID = $id_asesor";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de asesores: " . $conn->error;
    exit();
}


$query="UPDATE Tabla_Asesores SET actual_cotizacion = 1 WHERE ID = $next_id";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de asesores: " . $conn->error;
    exit();
}

$result->close();
$link->close();

// Obtenemos todas las variables de la forma de contacto

$email_from="cotizaciones@borse.com.mx";

$vk_medidas = remove_quotes(urldecode($_REQUEST["vk_medidas"]));
$vk_ancho = remove_quotes(urldecode($_REQUEST["vk_ancho"]));
$vk_alto = remove_quotes(urldecode($_REQUEST["vk_alto"]));
$vk_fondo = remove_quotes(urldecode($_REQUEST["vk_fondo"]));
$vk_cantidad = remove_quotes(urldecode($_REQUEST["vk_cantidad"]));
$vk_material = remove_quotes(urldecode($_REQUEST["vk_material"]));
$vk_tintas_frente = remove_quotes(urldecode($_REQUEST["vk_tintas_frente"]));
$vk_tintas_vuelta = remove_quotes(urldecode($_REQUEST["vk_tintas_vuelta"]));

$vk_nombre = remove_quotes(urldecode($_REQUEST["vk_nombre"]));
$vk_pais = remove_quotes(urldecode($_REQUEST["vk_pais"]));
$vk_cve_internacional = remove_quotes(urldecode($_REQUEST["vk_cve_internacional"]));
$vk_lada = remove_quotes(urldecode($_REQUEST["vk_lada"]));
$vk_empresa = remove_quotes(urldecode($_REQUEST["vk_empresa"]));
$vk_giro = remove_quotes(urldecode($_REQUEST["vk_giro"]));
$vk_comentarios = remove_quotes(urldecode($_REQUEST["vk_comentarios"]));

$vk_email = remove_quotes(urldecode($_REQUEST["vk_email"]));
$vk_telefono = remove_quotes(urldecode($_REQUEST["vk_telefono"]));
$vk_ext = remove_quotes(urldecode($_REQUEST["vk_ext"]));
$vk_como_se_entero = remove_quotes(urldecode($_REQUEST["vk_como_se_entero"]));
$vk_sucursales = remove_quotes(urldecode($_REQUEST["vk_sucursales"]));
$estado = remove_quotes(urldecode($_REQUEST["estado"]));
$data_title = remove_quotes(urldecode($data_title));

$pais_texto = remove_quotes(urldecode($_REQUEST["vk_pais_texto"]));

// Insertar la solicitud de contacto en la base de datos
$link = new mysqli($servername_operaciones, $username_operaciones, $password_operaciones, $dbname_operaciones);
if (mysqli_connect_errno()) {
    printf("Fallo en la conexión: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link, "utf8");
$query = "INSERT INTO borse_cotizaciones (fecha, data_title, medidas, ancho, alto, fondo, cantidad, material, tintas_frente, tintas_vuelta, nombre, pais, cve_internacional, lada, empresa, giro, comentarios, email, telefono, ext, como_se_entero, sucursales, id_asesor, nombre_asesor)";
$query .= "VALUES ('".date('Y-m-d H:i:s')."', '".$data_title."', '".$vk_medidas."', '".$vk_ancho."', '".$vk_alto."', '".$vk_fondo."', '".$vk_cantidad."', '".$vk_material."', '".$vk_tintas_frente."', '".$vk_tintas_vuelta."', '".$vk_nombre."', '".$vk_pais."', '".$vk_cve_internacional."', '".$vk_lada."', '".$vk_empresa."', '".$vk_giro."', '".$vk_comentarios."', '".$vk_email."', '".$vk_telefono."', '".$vk_ext."', '".$vk_como_se_entero."', '".$vk_sucursales."', '".$id_asesor."', '".$nombre_asesor."')";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de clientes: " . mysqli_connect_error();
    exit();
}

// Obtenemos el # de la última cotización
$query = "SELECT MAX(id) AS LastID FROM borse_cotizaciones";
$result = $link->query($query);
$row = mysqli_fetch_array($result);
$last_id_cotizaciones = $row["LastID"];

$result->close();
$link->close();

// Cargamos el template de la forma de contacto, luego tenemos que reemplazar los valores por las variables
// de la forma
$message_body = file_get_contents('includes/msg-asesor-cotizacion.html');

$message_body = str_replace('#id#', htmlentities($last_id_cotizaciones), $message_body);
$message_body = str_replace('#nombre#', htmlentities($vk_nombre), $message_body);
$message_body = str_replace('#telefono#', "(".$vk_lada.") ".$vk_telefono, $message_body);
$message_body = str_replace('#pais#', htmlentities($vk_pais), $message_body);
$message_body = str_replace('#empresa#', htmlentities($vk_empresa), $message_body);
$message_body = str_replace('#email#', htmlentities($vk_email), $message_body);
$message_body = str_replace('#giro#', htmlentities($vk_giro), $message_body);
$message_body = str_replace('#ext#', htmlentities($vk_ext), $message_body);
$message_body = str_replace('#pais_texto#', htmlentities($pais_texto), $message_body);
$message_body = str_replace('#cantidad#', htmlentities($vk_cantidad), $message_body);
$message_body = str_replace('#comentarios#', htmlentities($vk_comentarios), $message_body);
$message_body = str_replace('#medidas#', htmlentities($vk_medidas), $message_body);
$message_body = str_replace('#material#', htmlentities($vk_material), $message_body);
$message_body = str_replace('#tintas_frente#', htmlentities($vk_tintas_frente), $message_body);
$message_body = str_replace('#tintas_vuelta#', htmlentities($vk_tintas_vuelta), $message_body);
$message_body = str_replace('#material#', htmlentities($vk_material), $message_body);
$message_body = str_replace('#thumbnail#', htmlentities($thumbnail), $message_body);
$message_body = str_replace('#data_title#', htmlentities($data_title), $message_body);
$message_body = str_replace('#estado#', htmlentities($estado), $message_body);

if (smtpmailer($email_asesor, $vk_email, 'BORSE COTIZACIONES', 'BORSE COTIZACIONES', $message_body)) {
}
else {
    if (!smtpmailer($email_asesor, $vk_email, 'BORSE COTIZACIONES', 'BORSE COTIZACIONES', $message_body, false)) {
        if (!empty($error)) echo $error;
    } else {
    }
}

// Cargamos el template del mail dirigido al usuario, luego tenemos que reemplazar los valores por las variables
// de la forma. Esto para el correo que se envía al usuario.
$message_body = "";
$message_body = file_get_contents('includes/msg-usuario-cotizacion.html');

$message_body = str_replace('#nombre#', htmlentities($vk_nombre), $message_body);
$message_body = str_replace('#email_asesor#', htmlentities($email_asesor), $message_body);
$message_body = str_replace('#nombre_asesor#', htmlentities($nombre_asesor), $message_body);
$message_body = str_replace('#data_title#', htmlentities($data_title), $message_body);
$message_body = str_replace('#thumbnail#', htmlentities($thumbnail), $message_body);
$message_body = str_replace('#cantidad#', htmlentities($vk_cantidad), $message_body);
$message_body = str_replace('#comentarios#', htmlentities($vk_comentarios), $message_body);
$message_body = str_replace('#medidas#', htmlentities($vk_medidas), $message_body);
$message_body = str_replace('#material#', htmlentities($vk_material), $message_body);
$message_body = str_replace('#tintas_frente#', htmlentities($vk_tintas_frente), $message_body);
$message_body = str_replace('#tintas_vuelta#', htmlentities($vk_tintas_vuelta), $message_body);
$message_body = str_replace('#data_title#', htmlentities($data_title), $message_body);

if (smtpmailer($vk_email, $email_from, 'BORSE COTIZACIONES', 'BORSE COTIZACIONES', $message_body)) {
    header('Location: cotizacion-gracias.php');
} else {
    if (!smtpmailer($vk_email, $email_from, 'BORSE COTIZACIONES', 'BORSE COTIZACIONES', $message_body, false)) {
        if (!empty($error)) echo $error;
    } else {
        header('Location: cotizacion-gracias.php');
    }
}


function smtpmailer($to, $from, $from_name, $subject, $body, $is_gmail = true) {
    define('GUSER', 'cotizaciones@borse.com.mx'); // GMail username
    define('GPWD', 'nyTL1TTcNV,F'); // GMail password

    define('SMTPUSER', 'borse.mexico'); // sec. smtp username
    define('SMTPPWD', 'borseMXcloudY2018'); // sec. password
    define('SMTPSERVER', 'smtp.sendgrid.net'); // sec. smtp server

    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = false;
    $mail->SMTPAuth = true;
    if ($is_gmail) {
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
    } else {
        $mail->Host = SMTPSERVER;
        $mail->Username = SMTPUSER;
        $mail->Password = SMTPPWD;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    }
    $mail->AddReplyTo($from, $from_name);
    //$mail->addAddress($from, $from_name);                                            // Add a recipient
    $mail->SetFrom($from, $from_name);
    //$mail->addCC('emelnik@ametec.com.mx', 'Eduardo Melnik');     // Add a recipient
    $mail->addCC('ricardo.bc@brandingmix.com');                             // Add CC
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}

?>