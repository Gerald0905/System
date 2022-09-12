

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>

<div class="navbar">
 <img class="img"  src="../Images/logo.png" alt="DEIHS SHS Department"  width='60px' height= '60px'></a>
    <div class="inner-width">
      <h4>Teacher Profile</h4> 
      <h5 >Dasmariñas East Integrated High School <br> SHS Department</h5>
    </div>
  
  <i class="menu-toggle-btn fas fa-bars"></i>
  <nav class="navigation-menu">
  <a href="subteacherdashboard.php "><i class="fas fa-qrcode btn1"></i>Dashboard</a>
  <a href="teacherprofile.php"><i class="fas fa-user-circle btn1"></i>My Profile</a>
  <a href="teacheradvisees.php"><i class="fas fa-users btn1"></i>My Students</a>
  <a href="../logout.php"><i class="fas fa-sign-out-alt btn1 "></i>Logout</a>
  </div>
</nav> 
  
</div>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

</script>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("menu");
var btns = header.getElementsByClassName("btn1");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>

<script type="text/javascript">
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
    </script>

</body>
</html>
