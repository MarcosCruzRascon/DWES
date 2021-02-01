<?php
 use PHPMailer\PHPMailer\PHPMailer;
function enviar($mensaje, $direccion){
    require "vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 587;                 
    // introducir usuario de google
    $mail->Username   = "veterinariacuidaditos1997@gmail.com"; 
    // introducir clave
    $mail->Password   = "VeteCuid1997";       
    $mail->SetFrom('veterinariacuidaditos1997@gmail.com');
    // asunto
    $mail->Subject    = "Veterinaria Cuidaditos";
    // cuerpo
    $mail->MsgHTML($mensaje);
    // adjuntos
    //$mail->addAttachment("adjunto.txt");
    // destinatario
    //$address = "HPM@ejercito.com";
    $mail->AddAddress($direccion);
    // enviar
    $resul = $mail->Send();
    /*if(!$resul) {
      echo "Error" . $mail->ErrorInfo;
    } else {
      echo "Enviado";
    }*/
}
    
