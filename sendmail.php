<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                require 'path/to/PHPMailer/src/Exception.php';
                require 'path/to/PHPMailer/src/PHPMailer.php';
                require 'path/to/PHPMailer/src/SMTP.php';

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'mail.nic.ru';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'postmaster1@h405996452.nichost.ru';
                    $mail->Password = 'Zurich1291';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('postmaster1@h405996452.nichost.ru', 'Your Name');
                    $mail->addAddress('recipient@example.com', 'Recipient Name');

                    $mail->Subject = 'New Order';
                    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

                    $mail->addAttachment($uploadFile);

                    $mail->send();
                    echo 'Your order has been submitted successfully!';
                } catch (Exception $e) {
                    echo "Error sending email: {$mail->ErrorInfo}";
                }
            } else {
                echo 'Error uploading file';
            }
        } else {
            echo 'No file uploaded';
        }
    } else {
        echo 'Please fill in all required fields';
    }
} else {
    echo 'Form submission method not allowed';
}
