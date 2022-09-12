<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        background-color: #104a8e;
    }
    .container{
        margin-top:200px;
        width: 40%;
    }
   .text-center{
       font-weight: 700;
       font-size: 1.5rem;
       text-transform: uppercase;
       color: #104a8e;
       background: none;
   }
   .form-control{
        width: 400px;
        border-radius: 20px;
        line-height: 2;
        margin: 2rem 0;
   }
   .logo{
        background: none;
   }
   .logo img{
        height: 40px;
        width: 0 auto;
        float: left;
        margin-top: 2px;
   }
   .row input[type="email"]{
        width: 350px;
    }
   .btn{
        margin: 2rem 0;
        line-height: 2;
        border-radius: 15px;
        padding: .3rem 2rem;
        color: #f6f7fb;
        text-transform: uppercase;
        background-color: #009879;
        border:  1px solid transparent;
        font-weight: 600;
   }
   .btn:hover{
        color: #333;
   }
   @media screen and (max-width: 1400px){
        .row input[type="email"]{
        width: 250px;
    }
   }
   @media screen and (max-width: 800px){
        .btn{
            margin: .5rem 0;
        }
   }
</style>
</head>

<body>
    <div class="container p-3 border border-5 rounded-3">
        <div class="logo">
            <img src="../Images/logo.png" alt="DEIHS Logo">
            <h1 class="display-6 text-center p-2 bg-light">Password Reset</h1>
        </div>
        <form action="forgot_password_process.php" method="post">
            <div class="row mb-3 justify-content-md-center">
                <div class="col-auto">
                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-warning" name="reset">Proceed</button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>