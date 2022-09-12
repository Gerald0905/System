<?php include 'resetpass.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
            margin-top: 110px;
            border: 1px solid red;
            width: 40%;
        }
        .container h1{
            text-transform: uppercase;
        }
        .logo{
        background: none;
        margin-bottom: 2rem;
        }
       .logo img{
            height: 40px;
            width: 0 auto;
            float: left;
            margin-top: 2px;
       }
       .text-center{
           font-weight: 700;
           font-size: 1.5rem;
           text-transform: uppercase;
           color: #104a8e;
           background: none;
       }
       .row label{
            font-size: .9rem;
            color: #fff;
       }
       .btn{
            width: 150px;
            float: right;
            margin: 2rem -20px;
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
       input[type="number"], input[type="password"], input[type="text"]{
            border-radius: 10px;
       }
        @media screen and (max-width:990px) {
            .container{
                width:1000px;
                text-align: center;
                position: fixed;
                margin-left: 18rem;
            }
            .container h1{
             font-size:18px;
            }
            .logo img{
                height: 35px;
                width: 0 auto;
                float: left;
                margin-top: 2px;
           }
        }
        @media screen and (max-width:800px) {
            .container{
                text-align: center;
                width:800px;
            }
            .container h1{
                font-size: 14px;
            }
            .logo img{
                height: 30px;
                width: 0 auto;
                float: left;
                margin-top: 2px;
           }
           .row label{
                position: fixed;
           }
           .btn{
                width: 150px;
                float: right;
                margin: 1.5rem -10px;
                line-height: 1.3;
                border-radius: 15px;
                padding: .3rem 2rem;
                color: #f6f7fb;
                text-transform: uppercase;
                background-color: #009879;
                border:  1px solid transparent;
                font-weight: 600;
           }
        }
    </style>

</head>
<body>
    <div class="container p-3 border border-5 rounded-3" style="width: 40%">
        <div class="logo">
            <img src="../Images/logo.png" alt="DEIHS Logo">
            <h1 class="display-6 text-center p-2 bg-light">Password Reset</h1>
        </div>
        <form action="" method="post">
            <div class="row mb-3 justify-content-md-center">
                <label for="stud_lrn" class="col-4 col-form-label">LRN</label>
                <div class="col-lg-auto">
                    <input type="number" name="stud_lrn" id="stud_lrn" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <label for="code" class="col-4 col-form-label">Code</label>
                <div class="col-lg-auto">
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <label for="inputPassword" class="col-4 col-form-label">New Password</label>
                <div class="col-lg-auto">
                    <input type="password" name="new_password" id="inputPassword" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <label for="confirm_newPass" class="col-4 col-form-label">Confirm Password</label>
                <div class="col-lg-auto">
                    <input type="password" name="confirm_newPass" id="confirm_newPass" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <div class="col-8">
                    <button type="submit" class="btn btn-warning" name="change">Change</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>