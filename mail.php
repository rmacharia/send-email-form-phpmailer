<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Mail From Localhost</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send Message</h2>
                <p class="text-center">Send mail to specific recipients</p>
                <!-- starting php code -->
                <?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

                    //first we leave this input field blank
                    $recipient = "";
                    //if user click the send button
                    if(isset($_POST['send'])){
                        //access user entered data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                         //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail->SMTPDebug  = false;  
                //$mail->do_debug = 1;                   // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';               // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'r.macharia254@gmail.com';                     // SMTP username
                $mail->Password   = 'xxxxxx';                             
               $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom('r.macharia254@gmail.com', 'Roy');
                $mail->addAddress($recipient);     // Add a recipient
                
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Email Information';
                $mail ->Body =  ' 
                <html> 
                <body> 
                     
                     <b>Your message has been sent successfully  </b>
                </body> 
                </html>';
    
                
                $mail->send();
                    
                    exit();
    }
  
                    
                ?> <!-- end of php code -->
                <form action="mail.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $recipient ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>