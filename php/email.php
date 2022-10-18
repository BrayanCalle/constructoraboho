<?php

if (empty($_POST)) {
    http_response_code(400);
}

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";


$EmailTo = "infonueva@constructoraboho.com"; 
$Title = "Nuevo mensaje del formulario de contacto";

// prepare email body text
$Fields = "Nombre: ";
$Fields .= $name;
$Fields .= "\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields.= "Telefono: ";
$Fields .= $phone;
$Fields .= "\n";

$Fields .= "Mensaje: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Title,  $Fields, $header);

if (!$success) {
    http_response_code(500);
    exit("Error");
}

http_response_code(200);
exit("Ok");
