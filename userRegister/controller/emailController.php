<?php 

require_once '../userRegister/vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('studentcommunity0@gmail.com')//emai
  ->setPassword('virtual_training_t4')//password
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);




function sendVerificationEmail($userEmail, $token){

    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Thank you for signing up on our website. click the link below to verify your email.
            </p>
            <a href="http://localhost/student_community-master/CompaniesEvaluation/HomePage.php?token=' . $token . '">
                Verify your email address
            </a>
        </div>
        
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Email verification'))
    ->setFrom(['iimksgamer@gmail.com' => 'Student community'])
    ->setTo($userEmail)
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}








?>