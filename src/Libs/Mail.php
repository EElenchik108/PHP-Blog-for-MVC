<?php
namespace Libs;
use PHPMailer\PHPMailer\PHPMailer; //вставляем классы из документации
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class Mail {
	public static function send($to, $subject, $message)
	{
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'eelenchik1@gmail.com';                     // SMTP username
		    $mail->Password   = '1232700ee';                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('EElenchik1@gmail.com', 'Еленская Елена');
		    $mail->addAddress($to);     // Add a recipient
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    
		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    
		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
			}
	public static function sendMail($to, $subject, $message)
	{
		$headers = 'Content-type: text/html; charset=utf-8';
		mail($to, $subject, $message, $headers);
	}
}
