<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgotPassword'])) {
    
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    $email = $_POST['email']; 

    $sql = "UPDATE users SET reset_token_hash = :resetTokenHash, reset_token_expires_at = :resetTokenExpiresAt WHERE email = :email";

    $params = [
        ':resetTokenHash' => $token_hash,
        ':resetTokenExpiresAt' => $expiry,
        ':email' => $email
    ];

    $stmt = $db->query($sql, $params);

    if ($stmt && $stmt->rowCount() > 0) {
        $mail = require __DIR__ . '/../mail/mail_config.php';

        $mail->setFrom("noreply@example.com", 'Xpense Tracker');
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END

            Hello, click <a href="http://localhost/reset?token=$token">here</a> to reset your password. Link expires in 30 minutes.
        END;

        try {
            $mail->send();
            $message = "An email has been successfully sent to $email.";
        } catch (Exception $e) {
            $message = "An error has occurred. The email was not sent.";
        }
    } else {
        $message = "The email address you provided is not registered with us.";
    }
}

require('views/forgot.view.php');

?>
