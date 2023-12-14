<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../composer/vendor/autoload.php';

// Retrieve emails from the database (replace with your SQL query)
$result = mysqli_query($conn, "SELECT email FROM accounts");

$subject = "News from REviewed";
$message = "A reviewer has just posted a new song. Check it out and rate it!";
$fromEmail = "youngboypriest@gmail.com";
$fromName = "REviewed";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'example@gmail.com';
    $mail->Password   = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom($fromEmail, $fromName);

    // Loop through the results and add recipients
    while ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $mail->addAddress($to);
    }

    // Content
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Send email
    $mail->send();

} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>