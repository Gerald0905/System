<?php  
include("../dbconnect.php");
      //export.php  
 
 if(isset($_POST["export"]))  
 {  
      
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=masterListDeihsSHS.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name','LRN', 'Year Level','Strands', 'Section','Adviser'));  
      $sql =  mysqli_query($conn, "SELECT stud_name, stud_lrn, yearlevel_name, strands_desc, t1.section_name, teacher_name FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name inner join tbl_strands as t3 on t1.strands_ID = t3.strands_ID inner join tbl_yearlevel as t4 on t1.yearlevel_ID = t4.yearlevel_ID");
      while($row = mysqli_fetch_assoc($sql))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>