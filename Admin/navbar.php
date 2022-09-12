<?php
include("../dbconnect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>
    <header>
      <div class="inner-width">
       <a href="" class="logo"> <img  src="../Images/logo.png" alt="DEIHS SHS Department"></a>
       <h4>STUDENT PORTAL</h4>
       <h5>Dasmarinas East Integrated High School <br> SHS Department</h5>
      </div>
          
      

        <i class="menu-toggle-btn fas fa-bars"></i>
        <nav class="navigation-menu">

        <a href="admindashboard.php"><i class="fas fa-qrcode"></i>Dashboard</a>
        <a href="studentslist.php"><i class="fas fa-user"></i>Students</a>
       	<a href="teacherslist.php"><i class="fas fa-user-tie"></i>Teachers</a>
       	<a href="sectionslist.php"><i class="fas fa-chalkboard"></i></i>Sections</a>
        <a href="curriculumpage.php"><i class="fas fa-book-open"></i>Tracks</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>

          
      </div>
    </header>


    <script type="text/javascript">
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
    </script>
  </body>
</html>

