<?php  
include("../dbconnect.php");
      //export.php  
 
 if(isset($_POST["export"]))  
 {  
      
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=masterListDeihsSHS.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name','LRN', 'Email Address','Sex','Birthday','Guardian','Number', 'Section','Status'));  
      $sql =  mysqli_query($conn, "SELECT stud_name, stud_lrn, email_address, sex,bday,student_guardian,guardian_contact_number,section_name, student_status FROM tbl_student ");
      while($row = mysqli_fetch_assoc($sql))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>