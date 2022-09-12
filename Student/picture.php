<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet"> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/w3chool.css">
    <style>
       

.mySlides{
    border-radius:10px;
}
    .w3-content,.w3-auto{
        margin-left:700px;
        margin-top:-270px;
        
    }  
    .w3-content .w3-button-right{
       margin-right:-300px;
        
    }

  </style>

</head>
    <div class="w3-content w3-display-container">
                <img class="mySlides" src="../Images/1.jpg" width="300" height="300">
                <img class="mySlides" src="../Images/school2.jpg" width="300" height="300">
                <img class="mySlides" src="../Images/school3.jpg" width="300" height="300">
                <img class="mySlides" src="../Images/school4.jpg" width="300" height="300">
                <img class="mySlides" src="../Images/school5.jpg" width="300" height="300">

                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button-right w3-black w3-display-right" onclick="plusDivs(1)"> &#10095; </button>
            </div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
            </div>
        </div>
      
       
   