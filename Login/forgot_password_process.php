<?php
    include('../dbconnect.php');
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
        $qry = mysqli_query($conn, "SELECT * FROM tbl_studentaccount WHERE email_address = '$email'");
        $rec = mysqli_fetch_assoc($qry);

        if ($rec > 0) {
            // code...
        }
        else{   ?>
            <script type="text/javascript">
                alert("Your email does not exist in the database. Please try again.");
                window.location = "forgot_password.php";
            </script>   <?php
        }
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

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
        if($code){
            
        }
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'DEIHS Student Portal Password Reset';
        $mail->Body    = '<h3>Dear Student</h3>
        <h4>Greetings!</h4>
        <p>To reset your password, click  the button <a href="http://localhost/Capstone_Project/System/Login/change_password.php?code='.$code.'"><button style="background-color: #104a8e; color: #fff;  border: none;  border-radius: 15px; padding:2px 4px;cursor: pointer;">Click Me</button>.</a>
        <br>
        Make sure to copy the code indicated as it is part of the password rest process.
        <br><br>Your code is <b>'.$code .'.</b>
        <br><br>Thank you and have a good day!
        <br><br><b>-DEIHS Student Portal Admin';

        $conn = new mySqli('localhost', 'root', '', 'portal_db');

        if($conn->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $conn->query("SELECT * FROM  tbl_studentaccount WHERE email_address = '$email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE tbl_studentaccount SET code = '$code' WHERE email_address = '$email'");
                
            $mail->send();
            ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Student Portal | DEIHS SHS</title>
                    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Kaushan+Script&family=Poppins:ital,wght@0,100;0,200;0,300;1,400;1,500&family=Roboto:ital,wght@0,300;1,400&display=swap" rel="stylesheet">
                    <style type="text/css">
                        *{
                            padding: 0;
                            margin: 0;
                            box-sizing: border-box;
                        }
                        body{
                            font-family: 'Poppins', sans-serif;
                        }
                        img {
                          width: 100%;
                        }
                        .container {
                          position: relative;
                          z-index: 5;
                          max-width: 90rem;
                          margin: 0 auto;
                          padding: 0 4rem;
                        }
                        header {
                          width: 100%;
                          background: var(--main--color);
                          overflow: hidden;
                          padding-bottom: 5rem;
                        }
                        nav {
                          width: 100%;
                          position: relative;
                          z-index: 50;
                        }
                        nav .container {
                          display: flex;
                          justify-content: space-between;
                          height: 6rem;
                          align-items: center;
                        }
                        .logo {
                          width: 95px;
                          display: flex;
                          align-items: center;
                        }
                        .logo-text,
                        .logo-text-1 {
                          font-family: "Kalam", cursive;
                          font-size: 3.7rem;
                          padding-top: 0.75rem;
                        }
                        .logo-text {
                          color: #104a8e;
                          padding-left: 0.45rem;
                          text-transform: uppercase;
                        }
                        .logo-text-1 {
                          color: #ffcd01;
                        }
                        .section-header {
                          text-align: center;
                          margin-bottom: 2.6rem;
                        }
                        .title {
                          position: relative;
                          display: inline-block;
                          padding-bottom: 0.8rem;
                          line-height: 1.2;
                          font-size: 2.3rem;
                          color: #104a8e;
                          text-transform: uppercase;
                          margin-bottom: 0.9rem;
                        }
                        .title:before {
                          content: attr(data-title);
                          display: block;
                          margin-bottom: 0.4rem;
                          color: #ffcd01;
                          font-size: 1.2rem;
                          font-weight: 500;
                          letter-spacing: 3px;
                          text-transform: none;
                        }
                        .title:after {
                          content: "";
                          position: absolute;
                          width: 300px;
                          height: 5px;
                          border-radius: 5px;
                          background-color: #104a8e;
                          bottom: 0;
                          left: 50%;
                          transform: translateX(-50%);
                        }
                        .section-header .text {
                          text-align: justify;
                          text-indent: 5%;
                          padding-top: 3rem;
                        }
                        .card:before {
                          content: attr(data-card);
                        }
                        .icon {
                          width: 400px;
                          height: 290px;
                          margin-bottom: 0.9rem;
                          margin-top: -30px;
                        }
                        .cards {
                          display: flex;
                          justify-content: space-around;
                          flex-wrap: wrap;
                          width: 100%;
                        }
                        .card-wrap {
                          margin: 1.4rem 0.8rem;
                        }
                        .card {
                          position: relative;
                          background-color: #f6f7fb;
                          max-width: 400px;
                          min-height: 450px;
                          width: 100%;
                          display: flex;
                          text-align: center;
                          align-items: center;
                          justify-content: center;
                          padding: 0 3rem;
                          overflow: hidden;
                          transition: 0.25s;
                        }
                        .card-wrap:hover .card {
                          transform: translateY(-15px);
                        }
                        .card:after {
                          content: "";
                          position: absolute;
                          width: 100%;
                          height: 0;
                          border-radius: 7px 7px 0 0;
                          background-color: #104a8e;
                          bottom: 0;
                          left: 0;
                          transition: 0.25s;
                        }
                        .card-wrap:hover .card:after {
                          height: 5px;
                        }
                        .title-sm {
                          color: #104a8e;
                          text-transform: uppercase;
                          font-size: 1rem;
                          text-align: center;
                          font-weight: 700;
                          margin-left: 0.9rem;
                          margin-right: 0.9rem;
                          margin-bottom: 1.1rem;
                        }
                        .card .text {
                          font-size: 0.9rem;
                          text-align: justify;
                          text-indent: 10%;
                          margin: 1.5rem 0.9rem;
                        }
                        .card .title-sm {
                          line-height: 1.1;
                        }
                        .small {
                          border-radius: 5px;
                          padding: 0.6rem 2.2rem;
                        }   
                        .footer-remarks{
                            margin-top: 4rem;
                            margin-bottom: 2rem;
                            color: #104a8e;
                            text-align: center;
                            font-size: .9rem;
                        }               
                    </style>
                </head>
                <body>
                    <script type="text/javascript">
                        alert("The message has been sent to - <?php echo $email; ?>. Kindly check your email now.");
                    </script>
                    <header>
                        <nav>
                            <div class="container">
                                <div class="logo">
                                    <img src="../Images/logo.png" alt="DEIHS Logo">
                                    <h1 class="logo-text">
                                        East
                                    </h1>
                                    <h1 class="logo-text-1">
                                        iano
                                    </h1>
                                </div>
                            </div>
                        </nav>
                    </header>
                    <section class="about section">
                        <div class="container">
                            <div class="section-header">
                                <h3 class="title" data-title="Proud EASTiano">DEIHS - Senior High School Department</h3>
                                <p class="text">The Dasmariñas East Integrated High School (DEIHS) – Senior High School Department is the research locale of the capstone project. As cited, the academe is the second public secondary school in the municipality and was established on a one-hectare plot of land in barangay San Simon, Dasmariñas Bagong Bayan and was first named as Dasmariñas Relocation Center High School Annex-C. It initially started its operation in June 1986 with a total of six hundred and eleven enrollees in the freshman and sophomore levels, with a maximum of thirty teachers. For years, the institute’s name changed until it became Dasmariñas East Integrated High School in 2017 as the integration of senior high school came to existence in the institution. As the integration took place, the department has been able to offer tracks named as: Technical Vocational Livelihood (TVL) - with three more specific strands such as Computer System Servicing (CSS), Technical Drafting, and Contact Center Services (CCS), and the Academic Track that offers Accountancy, Business and Management (ABM), Humanities and Social Sciences (HUMSS), and General Academic Strand (GAS). In addition, there were currently twenty-eight teachers and six hundred and thirty-four students in the department for the present school year 2021–2022.</p>
                            </div>

                            <div class="cards">
                                <div class="card-wrap">
                                    <div class="card" data-card="">
                                        <div class="card-content">
                                            <img src="../Images/shs-students.jpg" class="icon">
                                            <h3 class="title-sm">
                                                Senior High School Students Batch 2017-2018
                                            </h3>
                                            <p class="text">
                                                The students in the photo were the first batch of K to 12 Program as senior high school was first introduced in the institution.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrap">
                                    <div class="card" data-card="">
                                        <div class="card-content">
                                            <img src="../Images/2.jpg" class="icon">
                                            <h3 class="title-sm">
                                                Classrooms
                                            </h3>
                                            <p class="text">
                                                The classrooms in the SHS department are all well-organized and been managing by our cleaning management staffs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrap">
                                    <div class="card" data-card="">
                                        <div class="card-content">
                                            <img src="../Images/1.jpg" class="icon">
                                            <h3 class="title-sm">
                                                Senior High School Buildings
                                            </h3>
                                            <p class="text">
                                                The newly built buildings were designed for the senior high school students, teachers, and faculty staffs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer>
                        <div class="footer-remarks">
                            <p class="text">
                                <b><i>All Rights Reserved, 2021-2022.</i></b><br>
                                DEIHS-SHS Department
                            </p>
                        </div>
                    </footer>
                </body>
                </html>
            <?php
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
?>
