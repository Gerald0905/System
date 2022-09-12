
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/nav1.css">
<style>
@media screen and (max-width:5000px) {
        
    
        .nav{
            position:fixed;
            width:100%;
            margin-top:-100px;
            
        }
    }
    @media screen and (max-width:800px) {
        
    
        .nav{
            position:fixed;
            width:100%;
            margin-top:-100px;
            margin-bottom:20px;

        }
    }
    @media screen and (max-width:480px) {
        
    
        .nav{
            position:fixed;
            width:100%;
            margin-top:-300px;
            
        }
    }

    </style>
</head>
<div class="nav">

    <?php
    include("navbar.php")
    
    ?>
</div>