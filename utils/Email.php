<?php

require_once __DIR__ . '/../lib/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../lib/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/../lib/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public static function enviar($destinatario, $nome, $atividade)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'joicedejesusjjs@gmail.com';
        $mail->Password = 'psok lbvz jjmi pzcq';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('joicedejesusjjs@gmail.com', 'Sistema SAMP');

        $mail->addAddress($destinatario, $nome);

        $mail->Subject = "Nova atividade cadastrada";

        $mail->Body = "
Olá $nome,

Uma nova atividade foi cadastrada no sistema SAMP.

Atividade: $atividade

Acesse o sistema para visualizar.
";

        $mail->send();
    }
}