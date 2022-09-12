<?php
include("../dbconnect.php");

$max = mysqli_query($conn, "SELECT MAX(teacher_ID) as max FROM tbl_teacher");
$num = mysqli_fetch_assoc($max);

$max1 = mysqli_query($conn, "SELECT MAX(teacheraccount_ID) as max1 FROM tbl_teacheraccount");
$num1 = mysqli_fetch_assoc($max1);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>GTCoding</title>
    <link rel="stylesheet" href="searchbox.css" />
  </head>
  <body>
    <div class="container">
      <h2>Video Category</h2>

      <div class="select-box">
        <div class="options-container">
          <div class="option">
            <input
              type="radio"
              class="radio"
              id="automobiles"
              name="category"
            />
            <label for="automobiles">Automobiles</label>
          </div>
          <select name="subject_name" >
          <?php
									$sec = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects ORDER BY es_ID ASC");
									while($list1 = mysqli_fetch_assoc($sec)){
								?>
								
								<option selected hidden><p class="desc">Choose Subject</p></option>
								<option><?php echo $list1['subject_name']; ?></option>
								<?php } 
								?>

          <div class="option">
            

        <div class="selected">
          Select Video Category
        </div>

        <div class="search-box">
          <input type="text" placeholder="Start Typing..." />
        </div>
      </div>
    </div>

    <script src="search.js"></script>
  </body>
</html>
