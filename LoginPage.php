<?php
include "action.php";
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
                /* margin: 0px;
                padding: 0px;
                background-color: #f89d13;
                background: url("https://wallpapercave.com/wp/wp4955602.jpg");
                background-position: center;
                background-size: auto;
                background-repeat: repeat; */
            }

            .loginbox {
            background-color: #1b120f;
            padding:20px;
            width: max-content;
            height: fit-content;
            border-color: #e6dedd;
            border-width: 0.1cm;
            border-style: solid;
            border-radius: 10px;
            color: white;
            position: absolute;
            top: 50%;
            
        }
        </style>
    </head>

    <body>

        <div class="row">
            <div class="col-4">
            </div>

            <div class="col-4">
                <div class="loginbox">
                    <h1 style="text-align: center;">Event Tracker</h1>
                    <br>
                    
                    <form id="loginform" method="POST" action="action.php">
                        <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" placeholder="Enter Username" class="form-control" value="" required>
                        <br>
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control" value="" required>
                        </div>
                        <br>
                        <button  type="submit"  class="btn  btn-primary" name="login">Login</button>
                </div>
            </div>

            <div class="col-4">   
            </div>
        </div>

        <nav class="navbar navbar-expand-sm fixed-bottom justify-content-center">
        <span class="navbar-text">
          Made with ❤️ by Bayu Inho Ucha Nada
        </span>
        </nav>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>