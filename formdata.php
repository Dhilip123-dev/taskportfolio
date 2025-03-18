<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['error'] = "*Fill out all required fields.!!!";
        header("Location: contact.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.!!!";
        header("Location: contact.php");
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                               
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'dhilipdhilp27@gmail.com';
        $mail->Password = 'xxisnicuybqeleuz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        
        $mail->Port = 465;                                  

        $mail->setFrom('dhilipdhilp27@gmail.com', 'Dhilip');
        $mail->addReplyTo($email, $name);
        
        $mail->addAddress('dhilipdhilp27@gmail.com'); 

        $mail->isHTML(true);                             
        $mail->Subject = $subject;
        $mail->Body = "
            <h3>You have New Message</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        ";

        if ($mail->send()) {
            $_SESSION['success'] = "Message has been sent successfully!";
        } else {
            $_SESSION['error'] = "Failed to send message.";
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Mail Error: " . $mail->ErrorInfo;
    }

    header("Location: contact.php");
    exit();
}
?>
