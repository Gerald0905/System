<?php
    if(isset($_POST['updateStudentAccount'])) {
        $email = $_POST['email_address'];
        $studentPassword = $_POST['stud_password'];
        $stud_lrn = $_POST['stud_lrn'];
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './mail/Exception.php';
    require './mail/PHPMailer.php';
    require './mail/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'deihsstudentportal@gmail.com';                     // SMTP username
        $mail->Password   = 'deihsSHS2021';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('deihsstudentportal@gmail.com', 'DEIHS-SHS Student Portal Admin');
        $mail->addAddress($email);     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'DEIHS SHS Department Student Portal';
        $mail->Body    = '<h3>Dear Student,</h3>
        <h4>Greetings!</h4>
        <p>Your student portal account has been reset by the system admin.<br><br>
        LRN: ' .$stud_lrn .'<br>Password: ' .$studentPassword .'<br><br>Have a good day Eastiano!'
        .'<br><br>- DEIHS SHS - Student Portal Admin</p>';

        $mail->send();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


?>