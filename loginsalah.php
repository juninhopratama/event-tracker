<?php
include "action.php";
if(isset($_SESSION['login_user'])){
    header('location: main.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Event Tracker: Login</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
        body{
            background-color:  #f89d13;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .centeredText{
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="row" style="height: 1024px;">
        <div class="col md-8" style="background-color: #f89d13;background-image:url('hmsilogin.png');">
        </div>
        <div class="col-md-4" style="background-color: white; padding:30px;">
            <div class="container">
                <h1 style="text-align: center;">Event Tracker</h1>
                <br>
                <div class="container">
                <form id="loginform" method="POST" action="action.php">
                    <p> Hi, <u>Fungsionaris HMSI!*</u><br>Please input the username and password as given by the admin below</p>

                    <div class="container bg-danger">
                        <p style="font-size:14px;color:white;">Invalid username/password!</p>
                    </div>
                        <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" placeholder="Enter Username" class="form-control" value="" required>
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control" value="" required>
                        </div>
                        <p style="font-size:10px">*only fungsionaris could access account.<br>if you forgot the password, contact admin immediately</p>
                        <br>
                        <div class="centeredText">
                        <button  type="submit"  class="btn  btn-primary" name="login">Login</button>
                        <a href="index.php"  class="btn  btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>