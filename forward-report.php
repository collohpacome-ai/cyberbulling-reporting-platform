<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $platform = $_POST['platform'];
    $reporter = $_POST['reporter'];
    $title = $_POST['title'];
    $details = $_POST['details'];

    $emails = [
        'Facebook' => 'kiremacollins@zetech.ac.ke',
        'Instagram' => 'instagram@example.com',
        'Twitter' => 'twitter@example.com',
        'TikTok' => 'tiktok@example.com'
    ];

    if (!isset($emails[$platform])) {
        echo "❌ Invalid platform selected.";
        exit;
    }

    $mail = new PHPMailer(true);
try {
        // SMTP configuration
     $mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'collohpacome@gmail.com';
$mail->Password   = 'utzvazpkuacruuvc'; // Remove spaces
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;
$mail->setFrom('collohpacome@gmail.com', 'CyberSafety Admin');
        $mail->addAddress($emails[$platform]); // To the platform email

        $mail->Subject = "Forwarded Cyberbullying Report - $platform";
        $mail->Body    = "A report was filed:\n\n" .
                         "Reporter: $reporter\n" .
                         "Title: $title\n" .
                         "Details:\n$details\n\n" .
                         "Please take necessary action.";   $mail->send();
        echo "✅ Report successfully forwarded to $platform.";
    } catch (Exception $e) {
        echo "❌ Failed to send the report. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
