<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet"> 
<style>
  @media screen and (max-width:5000px){
    #myBtn {
    display: none; 
    position: fixed; 
    bottom: 20px; 
    right: 50px; 
    z-index: 99; 
    border: none; 
    outline: none; 
    color:white;
    background-color: #485461;
    background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
    cursor: pointer;
    border-radius:50%;
    padding:2px 5px;
    opacity:.9;
    font-size: 40px; 
  }  
  }
  @media screen and (max-width:800px ) {
    #myBtn {
    display: none; 
    position: fixed;
    bottom: 20px;
    
    right: 20px; 
   
    border: none;
    outline: none; 
    background-color: #485461;
    background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
    cursor: pointer; 
    font-size: 40px; 
  }  
  }
  @media screen and (max-width:400px){
    #myBtn {
        display: none; 
        position: fixed; 
        bottom: 20px;
        right: 1.5px;
        z-index: 99;
        border: none; 
        outline: none;     
        background-color: #485461;
        background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
        cursor: pointer; 
        
       
        font-size: 40px; 
      #myBtn {
        display: none; 
        position: fixed; 
        bottom: 20px; 
        right: 1.5px; 
        z-index: 99; 
        border: none; 
        outline: none;
        color: green; 
        cursor: pointer;
        font-size: 40px; 
      }
    }
</style>
</head>   
    <div >
    <i onclick="topFunction()" id="myBtn" title="Go to top"class="fas fa-angle-up" aria-hidden="true"></i>
    </div>
    </div>
</div>

<script type="text/javascript">
//Get the button:
mybutton = document.getElementById("myBtn");


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 15 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

</script>
</body>
</html>