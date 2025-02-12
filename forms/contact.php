<?php
use PHPMailer\PHPMailer\src\PHPMailer;
use PHPMailer\PHPMailer\src\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@gmail.com';
    $mail->Password   = 'your-email-password'; // Use App Password if 2FA enabled
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email Headers
    $mail->setFrom('your-email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com'); // Change this

    // Email Content
    $mail->isHTML(false);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent via PHPMailer.';

    $mail->send();
    echo '✅ Email sent successfully!';
} catch (Exception $e) {
    echo "❌ Email sending failed: {$mail->ErrorInfo}";
}
?>