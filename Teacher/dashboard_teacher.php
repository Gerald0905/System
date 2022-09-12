<?php
include("../dbconnect.php");

session_start();
$tid = $_SESSION['tid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name WHERE teacher_ID = '$tid'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Teacher</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <style>
        


*, *::before, *::after {
    box-sizing: border-box;
}


.hero {
    padding: 100px 0;
    background-color:#23424A;
    margin: 100px 100px 20px 100px;
    border-radius:20px;
    
    
}
.view {
    font-size: 13px;
    display: inline-block;
    margin-top:-100px;
    margin-left:70px;
    margin-bottom:20px;
    padding-left: 20px;
    padding-bottom:5px;
    color: #73DFA1;
    border-radius: 5px;
    
    
}
.three-col{
   padding: 100px 0;
   background-color:#23424A;;
    margin: 20px 100px 20px 100px;
    border-radius:20px;
}

.hero__text {
    color: white;
    
}

.hero p {
    margin-bottom: 3em;
    padding-left: 10px;
    margin-left:100px;
    margin-right:15px;
   
  
}


.three-col{
    padding: 3em 0;

}
.hero h2{
    padding-left: 10px;
    margin:10px 100px;
   
}

.row {
    display: flex;
}

.col {
    width: 100%;

}
.col h2{
    font-size:30px;
    color: white;
    text-align:center;
    
}
.col p{
    text-align:justify;
    margin-left:40px;
    color: white;
    margin-right:15px;
	
	
}



.btn {
    display: inline-block;
    text-decoration: none;
    text-transform: uppercase; 
    color: #23424A;
    font-weight: 900;
    margin-left:100px;
    background-color: #38CFD9;
    padding: .75em 2em;
    border-radius: 10px;
    margin-top:20px;
}

.btn:hover,
.btn:focus {
    opacity: .75; 
}



@media screen  and (max-width:800px){
    .hero{
        margin: 100px 20px 20px 20px;
    }
    .view{
        margin-left:0;
        width:350px;
        font-size:12px;
    }
    .hero h2, .hero p,.btn{
        margin-left:20px;

    }
    .hero h2{
        font-size:18px;
    }
    .hero p{
        padding-right:10px;
    }
    .three-col{
        margin: 20px 20px 20px 20px;
    }
    .row {
    display: block;
}

.col {
    width: 95%;

}
.col h2{
    font-size:20px;
    text-align:center;
    margin-top:20px;
}
.col p{
    font-size:15px;
    margin-left:15px;
    margin-right:15px;
}

}
@media screen  and (max-width:400px){

    .hero h2, .hero p{
        margin-left:20px;

    }
    .view{
        margin-left:0;
        width:250px;
        font-size:9px;
    }
    .hero h2{
        
        font-size:15px;
        width:100%;
       padding-right:20px;
    }
    .hero p{
        padding-right:10px;
        font-size:12px;
    }
    .btn{
       font-weight:800;
       width:130px;
       font-size:14px;
       margin-left:60px;
       padding: 10px;
    }
    .row {
    display: block;
}

.col {
    width: 93%;

}
.col h2{
    font-size:15px;
    text-align:center;
    margin-top:20px;
}
.col p{
    font-size:12px;
    margin-left:15px;
    margin-right:15px;
}
}

    </style>
</head>
<body>
    <div>
        <?php 
        include 'nav.php'
        ?>
    </div>
    <div>
   
    <div class="hero">
        <div class="container">
        <?php
        while($list = mysqli_fetch_assoc($sql)){
    ?>  
                 
                        
  <div class='view' ><h1>Hi, <?php echo $list['teacher_fname']. '  '.' '.$list['teacher_lname']; ?>!</h1></div>
            <div class="hero__text">  
                
               
                <h2> EASTalino, EASTiyaga, EAStgaling, EASTudent-Centered.</h2>
                <p>Welcome to the Student Portal System of the Senior High School Department of Dasmariñas East Integrated High School.</p>
                 <div class="time" ></div><?php include 'time.php' ?></div>
                <a href="teacheradvisees.php" class="btn">My Class Advisees</a>
            </div>
        </div>
      
       
   
    </div>
    <div class="three-col">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Deped Mission</h2>
                <p>We dream of Filipinos who passionately love their countryand whose values and competenciesenable them to realize their full potentialand contribute meaningfully to building the nation.As a learner-centered public institution,the Department of Educationcontinuously improves itselfto better serve its stakeholders.</p>
            </div>
            <div class="col">
                <h2>Deped Vision</h2>
                <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.Teachers facilitate learning and constantly nurture every learner.Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.<p>

</p>
            </div>
            <div class="col">
                <h2>Deped Core Values </h2>
                <p>Maka-Diyos, Maka-tao, Makakalikasan, at Makabansa</p>
            </div>
        </div>
        

   <div>
   <?php include 'scroll-up.php' ?>
    </div>

    <?php } 
    ?>

   
</div>
</div>


</body>
</html>