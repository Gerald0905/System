<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        $conn = new mySqli('localhost', 'root', '', 'portal_db');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM tbl_studentaccount WHERE code = '$code'");

        if($verifyQuery->num_rows == 0) {
            header("Location: studentlogin.php");
            exit();
        }

        if(isset($_POST['change'])) {
            $inputCode = $_POST['code'];
            $lrn = $_POST['stud_lrn'];
            $getNewPassword = $_POST['new_password'];
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_newPass']);

            $letter = preg_match('@[A-Za-z]@', $getNewPassword);
            $num = preg_match('@[0-9]@', $getNewPassword);
            $special = preg_match('@[^\w]@', $getNewPassword);
            $count = strlen($getNewPassword);

            $lrnQry = $conn->query("SELECT * FROM tbl_studentaccount WHERE code = '$code'");
            $lrnRec = mysqli_fetch_assoc($lrnQry);

            if($lrnRec['stud_lrn'] == $lrn AND $new_password == $confirm_password AND $inputCode == $lrnRec['code'] AND $letter AND $num AND $special AND $count >= 10){
                $changeQuery = $conn->query("UPDATE tbl_studentaccount SET stud_password = '$confirm_password' WHERE stud_lrn = '$lrn' and code = '$code'");

                if($changeQuery) {
                    header("Location: success.html");
                }
            }
            elseif($lrnRec['stud_lrn'] != $lrn AND $new_password == $confirm_password AND $inputCode == $lrnRec['code']){    ?>
                <script type="text/javascript">
                    alert("Invalid action. Either you entered an LRN that does not exist in the database or you are trying to gain access of another student account. Please try again.");     
                </script>   <?php
            }
            elseif($lrnRec['stud_lrn'] == $lrn AND $new_password != $confirm_password AND $inputCode == $lrnRec['code']){
                ?>
                <script type="text/javascript">
                    alert("The passwords you entered does not match. Please try again.");     
                </script>   <?php
            }
            elseif($lrnRec['stud_lrn'] == $lrn AND $new_password == $confirm_password AND $inputCode != $lrnRec['code']){
                ?>
                <script type="text/javascript">
                    alert("The code you entered is incorrect. Please check your email again before trying. Thank you.");     
                </script>   <?php
            }
            elseif($lrnRec['stud_lrn'] != $lrn AND $new_password != $confirm_password AND $inputCode != $lrnRec['code']){
                ?>
                <script type="text/javascript">
                    alert("The entered data are all invalid. Please try again.");     
                </script>   <?php
            }
            elseif(!$letter){
                ?>
                <script type="text/javascript">
                    alert("Your password must contain any letters. Please try again.");     
                </script>   <?php
            }
            elseif(!$special){
                ?>
                <script type="text/javascript">
                    alert("Your password must contain any special characters. Please try again.");     
                </script>   <?php
            }
            elseif($count < 10){
                ?>
                <script type="text/javascript">
                    alert("Your password must at least ten (10) alphanumeric characters. Please try again.");     
                </script>   <?php
            }
            elseif(!$num){
                ?>
                <script type="text/javascript">
                    alert("Your password must contain any number. Please try again.");     
                </script>   <?php
            }   
        }
        $conn->close();
    }
    else {
        header("Location: studentlogin.php");
        exit();
    }
?>
