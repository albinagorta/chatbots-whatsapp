<?php 
require 'vendor/autoload.php';
use Twilio\Rest\Client;

$from = $_POST['From'];
$body = $_POST['Body'];


$twilio_whatsapp_number = "+14155238886";

$account_sid    = "AC0a80f4fc415fcbc106f362ae876591d9";
$auth_token     = "ae185a2c718ae8fbde815d1cfe64f386";

$client = new Client($account_sid, $auth_token);

$message = "";

switch ($body) {
    case 1:
            $message = "Hola Buenas tardes \n";
            $message .= "La Fecha es: ".date('d/m/Y');
    break;
    
    case 2:
           $message = "Hola Buenas tardes \n";
           $message .= "La Hora es: ".date('H:i:s');
    break;

    case 3:
            $message = "Hola Buenas tardes \n";
            $message .= "La Fecha y Hora es: ".date('d/m/Y H:i:s');
    break;

    default:
        $message = "Elige una opción: \n";
        $message .= "1: Quiero saber la fecha \n";
        $message .= "2: Quiero saber la Hora \n";
        $message .= "3: Quiero saber fecha y hora \n";
    break;
}


$client->messages->create(
    $from,
    [
        'from' => "whatsapp:".$twilio_whatsapp_number,
        'body' => $message
    ]
);

print($client->sid);
                  
