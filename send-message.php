<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Very useful for finding errors!

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$formMessage = $_POST['message'];

if ($name != null && $email != null && $number != null && $formMessage != null) {
$mail = new PHPMailer(true);
    
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@spiffysoft.com';
        $mail->Password   = 'Mukh@1313';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        // Email settings
        $mail->setFrom('info@spiffysoft.com', 'SpiffySoft Team');
        $mail->addAddress('spiffysoftinc@gmail.com');
        $mail->Subject = 'Contact - spiffysoftinc.com';
        
        //Set message 
        $message = "Name: ".$name.", <br> 
        Email: ".$email.", <br>
        Phone Number: ".$number.", <br>
        Messgae: ".$formMessage;

        $mail->msgHTML($message);
        $mail->send();
        echo "<script>
                alert('Message Sent!');
                window.location.replace('contact.html');
            </script>";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }	
    
}
else{
    echo "<script>
				alert('Sorry! something went wrong.');
				window.location.replace('contact.html');
			</script>";
}
?>