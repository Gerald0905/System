<html>
<?php
include("../dbconnect.php");


$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS num1 FROM tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active'");
$IDcount = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT COUNT(*) AS num2 FROM tbl_teacher");
$IDcount1 = mysqli_fetch_assoc($sql2);

$sqql = mysqli_query($conn, "SELECT COUNT(*) AS num2 FROM tbl_subjectteacher");
$subCount = mysqli_fetch_assoc($sqql);

$totalTeachers = $IDcount1['num2'] + $subCount['num2'];

$sql3 = mysqli_query($conn, "SELECT COUNT(*) AS num3 FROM tbl_tracks WHERE track_ID != 0");
$IDcount2 = mysqli_fetch_assoc($sql3);

$sql4 = mysqli_query($conn, "SELECT COUNT(*) AS num4 FROM tbl_section");
$IDcount3 = mysqli_fetch_assoc($sql4);

$sql5 = mysqli_query($conn, "SELECT COUNT(*) AS num5 FROM tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'ABM' ");
$IDcount4 = mysqli_fetch_assoc($sql5);

$sql6 = mysqli_query($conn, "SELECT COUNT(*) AS num6 FROM  tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'HUMSS'");
$IDcount5 = mysqli_fetch_assoc($sql6);

$sql7 = mysqli_query($conn, "SELECT COUNT(*) AS num7 FROM  tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'GAS'");
$IDcount6 = mysqli_fetch_assoc($sql7);

$sql8 = mysqli_query($conn, "SELECT COUNT(*) AS num8 FROM  tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'CSS'");
$IDcount7 = mysqli_fetch_assoc($sql8);

$sql9 = mysqli_query($conn, "SELECT COUNT(*) AS num9 FROM  tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'CCS'");
$IDcount8 = mysqli_fetch_assoc($sql9);

$sql10 = mysqli_query($conn, "SELECT COUNT(*) AS num10 FROM tbl_strands");
$IDcount9 = mysqli_fetch_assoc($sql10);

$sql11 = mysqli_query($conn, "SELECT COUNT(*) AS num11 FROM  tbl_student as t1 inner join tbl_schoolyear as t2 on t1.schoolyear = t2.schoolyear_desc WHERE t2.schoolyear_status = 'Active' AND strands_name = 'Technical Drafting'");
$IDcount10 = mysqli_fetch_assoc($sql11);

$schoolyearActive = mysqli_query($conn, "SELECT * FROM tbl_schoolyear WHERE schoolyear_status = 'Active'");
$syActive = mysqli_fetch_assoc($schoolyearActive);

$semActive = mysqli_query($conn, "SELECT * FROM tbl_semester WHERE sem_status = 'Active'");
$semActiveResult = mysqli_fetch_assoc($semActive);

?>



<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | System Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <link rel="stylesheet" type="text/css" href="css/table_design.css">
    <link rel="stylesheet" type="text/css" href="css/dahboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style type="text/css">
        .schoolyear{
            display: flex;
            justify-content: center;
            font-size: 4rem;
            color: #104a8e;
        }
        .schoolyear label{
            padding-right: 2rem;
            padding-bottom: 2rem;
        }
        .semester{
            display: flex;
            justify-content: center;
            font-size: 1.5rem;
            color: #104a8e;
        }
        .semester label{
            padding-right: 2rem;
            padding-bottom: 2rem;
        }
        .semester ion-icon{
            margin-left: 5px;
            font-size: .9rem;
            color: #104a8e;
            transition: .3s ease;
        }
        .semester ion-icon:hover{
            font-size: 1.1rem;
        }
        .schoolyear ion-icon{
            font-size: 1.4rem;
            color: #104a8e;
            transition: .3s ease;
        }
        .schoolyear ion-icon:hover{
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <?php
		include('navbar.php')
	?>
    <div class="container">
        <div class="schoolyear">
            <label for="sy" class="sy_label">School Year</label>
            <p><?php echo $syActive['schoolyear_desc']; ?></p>
            <a href="schoolyearpage.php?syid=<?php echo $syActive['schoolyear_id']; ?>"><ion-icon name="settings-outline"></ion-icon></a>
        </div>
        <div class="semester">
            <p><?php echo $semActiveResult['sem_desc']; ?></p>
            <a href="semesterpage.php?semid=<?php echo $semActiveResult['sem_ID']; ?>"><ion-icon name="settings-outline"></ion-icon></a>
        </div>
        <div class="board">
            <div class="count">
                <label for="count">Registered Students: </label>
                <input type="number" id="count" align="right" name="count" value="<?php echo $IDcount['num1']; ?>"
                    disabled>
            </div>
            <div class="count2">
                <label for="count">Registered Teachers: </label>
                <input type="number" id="count" align="right" name="count" value="<?php echo $totalTeachers; ?>"
                    disabled>
            </div>
            <div class="count4">
                <label for="count">Sections: </label>
                <input type="number" id="count" align="right" name="count" value="<?php echo $IDcount3['num4']; ?>"
                    disabled>
            </div>
            <div class="count5">
                <label for="count">Strands:</label>
                <input type="number" id="count" align="right" name="count" value="<?php echo $IDcount9['num10']; ?>"
                    disabled>
            </div>
            <div class="count3">
                <label for="count">Tracks:</label>
                <input type="number" id="count" align="right" name="count" value="<?php echo $IDcount2['num3']; ?>" disabled>
            </div>
        </div>
    </div>

    <div class="chart">
        
        <canvas id="myChart"></canvas>
        <script>
        var xValues = ["ABM <?php echo $IDcount4['num5']; ?>", "HUMSS <?php echo $IDcount5['num6']; ?>",
            "GAS <?php echo $IDcount6['num7']; ?>", "CSS <?php echo $IDcount7['num8']; ?>",
            "CCS <?php echo $IDcount8['num9']; ?>",
            "Technical Drafting <?php echo $IDcount10['num11']; ?>"
        ];

        var yValues = [<?php echo $IDcount4['num5']; ?>, <?php echo $IDcount5['num6']; ?>,
            <?php echo $IDcount6['num7']; ?>, <?php echo $IDcount7['num8']; ?>, <?php echo $IDcount8['num9']; ?>,
            <?php echo $IDcount10['num11']; ?>
        ];

        var barColors = ["", "#003f5c", "#58508d", "#bc5090", "#ff6361", "#ffa600", "#00c698"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: " DEIHS Senior High School Enrolled Students"
                }
            }
        });
        </script>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>