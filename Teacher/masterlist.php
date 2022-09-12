<?php
include("../dbconnect.php");

@session_start();
$tid = $_SESSION['tid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name inner join tbl_strands as t3 on t1.strands_name = t3.strands_name inner join tbl_yearlevel as t4 on t1.yearlevel_name = t4.yearlevel_name ORDER BY t1.stud_lastname ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Masterlist | Teacher</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	p{
    		margin-top: 8px;
    		font-size: 13px;
    	}
    	table{
    		margin-top: 40px;
    		border-collapse: collapse;
    		border-bottom: 1px solid black;
    	}
    	table .head{
    		border-top: 1px solid black;
    	}
    	.back-btn{
    		margin-top: 20px;
    	}
    	.back-btn a{
    		color: black;
    		text-decoration: underline;
    	}
    	.bck{
    		margin-right: 6px;
    		color: black;
    	}
    	.reg{
    		text-decoration: none;
    		padding: 7px 7px;
    		border: none;
    		border-radius: 8px;
    		background: #EE4B2B;
    		color: white;
    		font-size: 17px;
    		width: 200px;
    		transition: .9s ease;
    	}
    	.reg:hover{
    		background: crimson;
    	}
    	.fa-sort-down{
    		border: none;
    		font-size: 14px;
    		padding: 4px 4px;
    		border-radius: 3px;
    		color: #4c4c4c;
    		background: white;
    		cursor: pointer;
    	}
    	.fa-sort-down:hover{
    		color: white;
    		background: #4c4c4c;
    	}
    	.filter{
    		border: none;
    		background: none;
    		margin-left: -25px;
    	}
		.btns{
			background:#00BFFF;
			border: none;
			border-radius:8px;
			font-size:17px;
			padding: 7px 7px;
			color:white;
			width: 208px;
		}
		.btns:hover{
			background: #009ACD;
		}
		.fa-cloud-download-alt{
			margin-right: 8px;
		}
	    .fa-user-plus{
	    	margin-right: 8px;
	    }
	    .btn{
	    	border: none;
	    	padding: 5px 5px;
	    	background: none;
	    	margin-left: 5px;
	    	text-decoration: none;
	    	font-weight: bold;
	    	color: #FF971A;
	    	cursor: pointer;
	    	width: 60px;
	    	border-radius: 8px;
	    }
	    .btn:hover{
	    	font-weight: bold;
	    	text-decoration: none;
	    	background: #ff971a;
	    	color: white;
	    }
	    .lbl{
	    	text-transform: uppercase;
	    	font-weight: bold;
	    	margin-right: 10px;
	    }
    </style>
</head>
<body>
	<?php
		include('nav.php')
	?>

	<div class="container">
		<div class="header">
			<h4>Masterlist</h4>
			<p>This page allows the verified teachers to register enrolled students in to the system, and also view their list.</p>
		</div>
		<div class="content">
			
				<table>
					<tr>
					</td>
						<td align="right" colspan="6">
							<a class="reg" href="studentRegister.php"><i class="fas fa-user-plus"></i>Register New Student</a>
						</td>
					</tr>

					<tr>
						<td colspan="5" align="left" class="filt">
                  
							<form method="post" >
							    <label for="filter" class="lbl">Choose section here</label>
							    <select name="section_name" id="filter">
								    <option selected hidden>Click here</option>
								    <option>See All</option>
									<?php 
										
										$sql1 = mysqli_query($conn,"SELECT * FROM tbl_section WHERE section_ID > 0");
										while($list1 = mysqli_fetch_assoc($sql1)){ ?>
										
										<option><?php echo $list1['section_name'];?></option>
									<?php
										}
									?>
								 </select>
								 <button class="btn" name="submit1">Search</button>
								 	<?php 
											if (isset($_POST['submit1'])) {
												$var = $_POST['section_name'];

												if(($var == 'See All')OR($var == 'Click here...')){
													$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name inner join tbl_strands as t3 on t1.strands_name = t3.strands_name inner join tbl_yearlevel as t4 on t1.yearlevel_name = t4.yearlevel_name");
												}
												else{
													$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name inner join tbl_strands as t3 on t1.strands_name = t3.strands_name inner join tbl_yearlevel as t4 on t1.yearlevel_name = t4.yearlevel_name WHERE t1.section_name = '$var'");
												}
				
											}	
									?>
							</form>
						<td align="right">
							<form method="post" action="excel.php">
								<button name="export" class="btns">
									<i class="fas fa-cloud-download-alt"></i>Download CSV File
								</button> 
							</form>	
						</td>
					</tr>

					<tr class="head">
						<form method="post">
							<td>Student Name
								<button class="filter" name="btn">
									<i class="fas fa-sort-down"></i>
								</button>
							</td>
								<?php
								if (isset($_POST['btn'])) {
									$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name inner join tbl_strands as t3 on t1.strands_name = t3.strands_name inner join tbl_yearlevel as t4 on t1.yearlevel_name = t4.yearlevel_name ORDER BY t1.stud_lastname ASC");
								}
								?>
						</form>

						<td align="center">LRN</td>
						<td align="center">Year Level</td>
						<td>Strand</td>
						<td align="center">Section</td>
						<td align="right">Adviser</td>
					</tr>
					<?php
						while ($list = mysqli_fetch_assoc($sql)) {
							?>

					<tr class="content1">
						<td><?php echo $list['stud_lastname'].' , '.$list['stud_firstname'].' '. $list['stud_middleinitial'].'.'; ?></td>
						<td align="center"><?php echo $list['stud_lrn']; ?></td>
						<td align="center"><?php echo $list['yearlevel_name']; ?></td>
						<td><?php echo $list['strands_desc']; ?></td>
						<td align="center"><?php echo $list['section_name']; ?></td>
						<td align="right"><?php echo $list['teacher_lname'].' , '.$list['teacher_fname'].' '.$list['teacher_mname'].'.'; ?></td>
					</tr>

							<?php
						}
					?>
				</table>
				</form>
				
				<div class="back-btn">
					<a href="myclass.php?tid=<?php echo $tid; ?>"><i class="fas fa-chevron-circle-left bck"></i>Go Back</a>
				</div>
			 
      </body>  
 </html>  
 
		</div>
	</div>
</body>
</html>
