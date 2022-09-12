<?php
    if(isset($_POST['submit'])) {
        $email = $_POST['teacher_email_address'];
        $teacherPassword = $_POST['teacher_password'];
        $teacherUsername = $_POST['teacher_username'];
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
        $mail->Body    = '<h3>Dear Maam/Sir,</h3>
        <h4>Greetings!</h4>
        <p>You can now access the student portal system with your account.<br><br>
        Username: ' .$teacherUsername .'<br>Password: ' .$teacherPassword .'<br><br>Have a good day Eastiano!'
        .'<br><br>- DEIHS SHS - Student Portal Admin</p>';

        $mail->send();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


?>