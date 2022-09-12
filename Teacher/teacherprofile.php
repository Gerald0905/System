<?php
include("../dbconnect.php");

session_start();
$tid = $_SESSION['tid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name WHERE t1.teacher_ID = '$tid'");
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_teacheraccount as t2 on t1.teacher_ID = t2.teacher_ID WHERE t1.teacher_ID = '$tid'");
$rec = mysqli_fetch_assoc($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Profile | Teacher</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
	<link rel="stylesheet" type="text/css" href="css/nav2.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<style>
		
		.profile{
			margin-left:200px;
			margin-top:120px;
			background-color:#23424A;
			width: 70%;
			border-radius:10px;
		}
		.card-header{
			margin:20px 50px;
			padding:10px;
		}
		.card-header i{
			margin:10px;
			
		}
		.card-body{
			margin-left:90px;
			margin-top:-20px;
			color:white;
		}
		
		.card-header h3{
			color:white;
		}
		hr{
			color:blue;
		}
		th{
			text-align:justify;
		}
		.col{
			font-weight:bold;
			margin-left:50px;
			padding-bottom:20px;
		}
		.col a{
			margin-left:10px;
			text-decoration:underline;
			font-size:13px;
			color:orange;
			background-color:grey;
			padding:5px;
			border-radius:5px;
		}
		.col i{
			margin-left:37px;
			font-size:15px;
		}
		.icon{
			color:orange;
		}
		@media screen and (max-width:800px) {
			.profile{
				margin-left:20px;
				width: 90%;
			}
			.col{
			margin-left:20px;
		}
		.card-body{
			margin-left:20px;
		}
			
		.card-header{
			margin-left:20px;
		}
		}
		@media screen and (max-width:480px) {
		.card-body{
			margin-left:10px;
			font-size:13px;
		}
		.card-header {
			margin-left:10px;
		}
		.card-header h3{
			color:white;
			font-size:15px;
		}
	}
	</style>
</head>
<body>
	<div>
	<?php include ('nav_profile.php') ?>
	</div>

 
           <?php
      while($list = mysqli_fetch_assoc($sql)){
    ?>
  
     


<section class='profile'>
<div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header ">
		  
            <h3 class="mb-0"><i class="far fa-clone icon pr-1"></i>Teacher School Info</h3>
          </div>
          
            <table class="card-body ">
		 
			<tr>
                <th width="30%">Teacher Name</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_fname']. '  '.$list['teacher_mname'].' '.$list['teacher_lname']; ?></td>
              </tr>
              
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_email_address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Section</th>
                <td width="2%">:</td>
                <td><?php echo $list['section_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Strands</th>
                <td width="2%">:</td>
                <td><?php echo $list['strands_desc']; ?></td>
              </tr>
              <tr>
                <th width="30%">Subject Assigned</th>
                <td width="2%">:</td>
                <td><?php echo $list['subject_teaching']; ?></td>
              </tr>
            
          </table>
       
    	</div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header ">
		  <hr>
            <h3 class="mb-0"><i class="fas fa-info icon pr-1"></i>General Information</h3>
          </div>
          
            <table class="card-body ">
              <tr>
                <th width="30%">Sex</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_sex']; ?></td>
              </tr>
              <tr>
                <th width="30%">Birthday	</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_bday']; ?></td>
              </tr>
              <tr>
                <th width="30%">Address</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Contact Number</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_contact_number']; ?></td>
              </tr>
			  			<tr>
                <th width="30%">Status</th>
                <td width="2%">:</td>
                <td><?php echo $list['teacher_status']; ?></td>
              </tr>
            </table>
			
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
			  <hr>
            <h3 class="mb-0"><i class="fas fa-key icon pr-1"></i>Account Credentials</h3>
          </div>
          <div class="card-body ">
              <div class="col">
                
                <p>Username: <?php echo $rec['teacher_username'];?></p>
				<p>Password:<a class="change" href="teacherPassword.php?tid=<?php echo $rec['teacher_ID']; ?>">Change Password</a></p>
            </div>
           
          </div>
        </div>
      
</div>
<?php } 
    ?>
           
    		</div>
		</div>
    </div>
</section>
     
<?php 
        include 'scroll-up.php'
        ?>

	</body>
</html>