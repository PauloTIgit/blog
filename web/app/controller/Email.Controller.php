<?php
// Inclua a classe do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function enviarEmail($message){
    $subject = 'Nova Mensagem';
    $user_email = 'pauloferreiradevs@gmail.com' ;
    $user_nome = 'Paulo Ferreira';
    $host = 'smtp.hostinger.com ';
    $port = '465';
    $username = 'pauloferreira@paulodevelop.com';
    $password = '9BPCnV6Dz^Zg3&D';


    // Instancie o objeto do PHPMailera
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username; // Substitua pelo seu e-mail
        $mail->Password = $password; // Substitua pela sua senha
        $mail->SMTPSecure = 'ssl';
        $mail->Port = $port; 

        // Configurações do e-mail
        $mail->setFrom($username, 'Paulo Develop'); // Substitua pelo seu e-mail e nome
        $mail->addAddress($user_email, $user_nome); // Substitua pelo e-mail e nome do destinatário
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Envia o e-mail
        $mail->send();
        
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}

function Validador($input){
    if ($input == null || $input == '' || $input == '‎' || empty($input)) {
        return null;
    } else {
        return $input;
    }
}

function creatMessage($nome, $email, $celular, $assunto, $headerEmail){
    $nome = Validador(trim(strip_tags(filter_input(INPUT_POST, 'name', FILTER_DEFAULT))));
    $email = Validador(trim(strip_tags(filter_input(INPUT_POST, 'email', FILTER_DEFAULT))));
    $celular = Validador(trim(strip_tags(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT))));
    $assunto = Validador(trim(strip_tags(filter_input(INPUT_POST, 'subject', FILTER_DEFAULT))));
    $headerEmail = Validador(trim(strip_tags(filter_input(INPUT_POST, 'message', FILTER_DEFAULT))));

    return "<!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Email HTML</title>
            <style>
                body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                }
            
                .email-container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border: 1px solid #dddddd;
                }
            
                .header {
                background-color: #faaa2a;
                color: #ffffff;
                padding: 10px 0;
                text-align: center;
                }
            
                .content {
                padding: 20px;
                text-align: left;
                }
            
                .footer {
                background-color: #f4f4f4;
                color: #333333;
                padding: 10px 0;
                text-align: center;
                font-size: 12px;
                }
            
                .button {
                display: inline-block;
                padding: 10px 20px;
                color: #ffffff;
                background-color: #4e4caf;
                text-decoration: none;
                border-radius: 5px;
                }
            
                span {
                color: #333333;
                font-weight: 600;
                }
                
                p{
                color: #333333;
                }
            </style>
            </head>
            
            <body>
            <div class='email-container'>
                <div class='header'>
                <h1>Nova mensagem</h1>
                </div>
                <div class='content'>
                <p>Mensagem vinda do site <a href='https://paulodevelop.com/'>paulodevelop.com</a>!</p>
                <hr>
                <p><span>Nome: </span> " . $nome . "</p>
                <p><span>E-mail:</span> " . $email . "</p>
                <p><span>Celular:</span> " . $celular . "</p>
                <p><span>Assunto:</span> " . $assunto . "</p>
                <p><span>Mensagem:</span> " . $headerEmail . "</p>
                <hr>
                <div class='footer'>
                    <p>&copy; 2024 Paulo develop. Todos os direitos reservados.</p>
                </div>
                </div>
            </div>
            </body>
            </html>";
}
