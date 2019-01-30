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

$query="SELECT * from Tabla_Asesores where actual_contacto = 1";
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

$query="UPDATE Tabla_Asesores SET actual_contacto = 0 WHERE ID = $id_asesor";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de asesores: " . $link->error;
    exit();
}


$query="UPDATE Tabla_Asesores SET actual_contacto = 1 WHERE ID = $next_id";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de asesores: " . $link->error;
    exit();
}

$result->close();
$link->close();

// Obtenemos todas las variables de la forma de contacto

$email_from="contacto@borse.com.mx";

$contact_name = remove_quotes(urldecode($_REQUEST["vk_nombre"]));

$pais_texto = remove_quotes(urldecode($_REQUEST["vk_pais_texto"]));
$cve_internacional = remove_quotes(urldecode($_REQUEST["vk_cve_internacional"]));

$lada = remove_quotes(urldecode($_REQUEST["vk_lada"]));
$telefono = remove_quotes(urldecode($_REQUEST["vk_telefono"]));
$ext = remove_quotes(urldecode($_REQUEST["vk_ext"]));

$empresa = remove_quotes(urldecode($_REQUEST["vk_empresa"]));
$giro = remove_quotes(urldecode($_REQUEST["vk_giro"]));

$contact_email = remove_quotes(urldecode($_REQUEST["vk_email"]));
$como_se_entero = remove_quotes(urldecode($_REQUEST["vk_como_se_entero"]));
$enviar_a = remove_quotes(urldecode($_REQUEST["vk_enviar_a"]));
$comentarios = remove_quotes(urldecode($_REQUEST["vk_comentarios"]));
$estado = remove_quotes(urldecode($_REQUEST["estado"]));

// Insertar la solicitud de contacto en la base de datos
$link = new mysqli($servername_operaciones, $username_operaciones, $password_operaciones, $dbname_operaciones);
if (mysqli_connect_errno()) {
    printf("Fallo en la conexión: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link, "utf8");
$query = "INSERT INTO borse_contactos (fecha, nombre_apellido, pais, clave_lada, nombre_empresa, giro, observaciones, correo_electronico, telefono, extension, como_se_entero_de_borse, enviar_informacion_a, id_asesor, nombre_asesor) ";
$query .= "VALUES ('".date('Y-m-d H:i:s')."', '".$contact_name."', '".$pais_texto."', '".$lada."', '".$empresa."', '".$giro."', '".$comentarios."', '".$contact_email."', '".$telefono."', '".$ext."', '".$como_se_entero."', '".$enviar_a."', '".$id_asesor."', '".$nombre_asesor."')";
if ($link->query($query) != TRUE) {
    echo "Error actualizando tabla de clientes: " . mysqli_connect_error();
    exit();
}

// Obtenemos el # de la última cotización
$query = "SELECT MAX(id) AS LastID FROM borse_contactos";
$result = $link->query($query);
$row = mysqli_fetch_array($result);
$last_id_contactos = $row["LastID"];

$result->close();
$link->close();


// Cargamos el template del correo al asesor, luego tenemos que reemplazar los valores por las variables
// de la forma. Esto para el correo que se envía al asesor
$message_body = file_get_contents('includes/msg-asesor-contacto.html');

$message_body = str_replace('#id#', htmlentities($last_id_contactos), $message_body);
$message_body = str_replace('#contact_name#', htmlentities($contact_name), $message_body);
$message_body = str_replace('#empresa#', htmlentities($empresa), $message_body);
$message_body = str_replace('#telefono#', "(".$lada.") ".$telefono, $message_body);
$message_body = str_replace('#pais_texto#', htmlentities($pais_texto), $message_body);
$message_body = str_replace('#contact_email#', htmlentities($contact_email), $message_body);
$message_body = str_replace('#giro#', htmlentities($giro), $message_body);
$message_body = str_replace('#ext#', htmlentities($ext), $message_body);
$message_body = str_replace('#comentarios#', htmlentities($comentarios), $message_body);
$message_body = str_replace('#estado#', htmlentities($estado), $message_body);

if (smtpmailer($email_asesor, $contact_email, 'BORSE CONTACTO', 'BORSE CONTACTO', $message_body)) {
} else {
    if (!smtpmailer($email_asesor, $contact_email, 'BORSE CONTACTO', 'BORSE CONTACTO', $message_body, false)) {
        if (!empty($error)) echo $error;
    } else {
    }
}

// Cargamos el template del mail dirigido al usuario, luego tenemos que reemplazar los valores por las variables
// de la forma. Esto para el correo que se envía al usuario.
$message_body = "";
$message_body = file_get_contents('includes/msg-usuario-contacto.html');

$message_body = str_replace('#contact_name#', htmlentities($contact_name), $message_body);
$message_body = str_replace('#comentarios#', htmlentities($comentarios), $message_body);
$message_body = str_replace('#nombre_asesor#', htmlentities($nombre_asesor), $message_body);
$message_body = str_replace('#email_asesor#', htmlentities($email_asesor), $message_body);

if (smtpmailer($contact_email, $email_from, 'BORSE CONTACTO', 'BORSE CONTACTO', $message_body)) {
    header('Location: contacto-gracias.php');
} else {
    if (!smtpmailer($contact_email, $email_from, 'BORSE CONTACTO', 'BORSE CONTACTO', $message_body, false)) {
        if (!empty($error)) echo $error;
    } else {
        header('Location: contacto-gracias.php');
    }
}

function smtpmailer($to, $from, $from_name, $subject, $body, $is_gmail = true) {
    define('GUSER', 'contacto@borse.com.mx'); // GMail username
    define('GPWD', '4.%r*WzlbBx?'); // GMail password

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
    $mail->setFrom($from, $from_name);
    //$mail->addCC('emelnik@ametec.com.mx', 'Eduardo Melnik');     // Add a recipient
    $mail->addCC('ricardo.bc@brandingmix.com');                             // Add CC
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";
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