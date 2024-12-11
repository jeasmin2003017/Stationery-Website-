<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_order_confirmation($user_id, $products, $total_price, $conn) {
    // Include configuration for email
    $config = include('config.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Fetch user email and name from the database
    $user_query = mysqli_query($conn, "SELECT email, name FROM `users` WHERE id = '$user_id' LIMIT 1");
    if (mysqli_num_rows($user_query) > 0) {
        $user_data = mysqli_fetch_assoc($user_query);
        $recipient_email = $user_data['email'];
        $recipient_name = $user_data['name'];
    } else {
        error_log("User with ID $user_id not found.");
        return;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $config['port'];

        // Email sender and recipient
        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($recipient_email, $recipient_name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Your Order Confirmation';
        $mail->Body = "<h1>Thank you for your order, $recipient_name!</h1>
            <p>Here are your order details:</p>
            <p>Products: $products</p>
            <p>Total Price: $$total_price</p>
            <p>We will deliver your items soon!</p>";
        $mail->AltBody = "Thank you for your order, $recipient_name! Products: $products. Total Price: $$total_price.";

        $mail->send();
    } catch (Exception $e) {
        error_log('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    }
}
?>
