<?php
header("Access-Control-Allow-Origin: *");

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$total_amount = $_POST['total_amount'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email_cart = $_POST['email_cart'];

$mail = new PHPMailer(true);
$email = $email_cart;
try {
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'flavorfiest.info@gmail.com';
    $mail->Password = 'iape aztl uqjh wtue';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('flavorfiest.info@gmail.com', 'Flavour Fiest');
    $mail->addReplyTo('flavorfiest.info@gmail.com', 'Flavour Fiest');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Flavour Fiest Billing Details';

    // Embed the total_amount dynamically in the email body
    $bodyContent = "
    <div style=\"font-family: Arial, sans-serif; color: #333;\">
        <h1 style=\"color: #28a745;\">Thank You for Your Order!</h1>
        <p>Dear $f_name $l_name,</p>
        <p>We are excited to let you know that your order has been successfully placed. Here are the details of your order:</p>
        <p style=\"margin-top: 20px;\">Total Amount: <strong>$total_amount</strong></p>
        
        <p>Estimated Delivery Time: <strong>Within 1 hours</strong></p>
        <p>If you have any questions or need further assistance, feel free to contact us at <a href=\"mailto:flavorfiest.info@gmail.com\">flavorfiestmatara@gmail.com</a>.</p>
        <p>Thank you for choosing Flavour Fiest! We hope you enjoy your meal.</p>
        <p>Best regards,<br>Flavour Fiest Team</p>
        <hr style=\"margin-top: 20px;\">
        <p style=\"font-size: 12px; color: #777;\">This is an automated message, please do not reply directly to this email.</p>
    </div>";

    $mail->Body = $bodyContent;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// <table style=\"width: 100%; border-collapse: collapse; margin-top: 20px;\">
// <thead>
//     <tr>
//         <th style=\"border: 1px solid #ddd; padding: 8px;\">Item</th>
//         <th style=\"border: 1px solid #ddd; padding: 8px;\">Quantity</th>
//         <th style=\"border: 1px solid #ddd; padding: 8px;\">Price</th>
//     </tr>
// </thead>
// <tbody>
//     <tr>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Item 1]</td>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Quantity 1]</td>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Price 1]</td>
//     </tr>
//     <tr>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Item 2]</td>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Quantity 2]</td>
//         <td style=\"border: 1px solid #ddd; padding: 8px;\">[Price 2]</td>
//     </tr>
//     <!-- Add more items as necessary -->
// </tbody>
// </table>