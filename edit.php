<?php

include "action.php";
if(!isset($_SESSION['login_user'])){
    header('location: index.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}

    $id = 0;
    $name = "";
    $details = "";
    $datetime_start = "";
    $datetime_end = "";
    $place = "";
    
    $db = mysqli_connect('host', 'user', 'pass', 'db');

    if(mysqli_connect_errno()){
        echo "Failed to connect to database: " . mysqli_connect_errno();
    }

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($db, "SELECT * FROM events WHERE id='$id'");

    if ($id > 0 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $details = $n['details'];
        $datetime_start = $n['datetime_start'];
        $datetime_end = $n['datetime_end'];
        $place = $n['place'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $datetime_start = $_POST['datetime_start'];
    $datetime_end = $_POST['datetime_end'];
    $place = $_POST['place'];

    mysqli_query($db, "UPDATE events SET `name`='$name', details='$details', datetime_start='$datetime_start',
    datetime_end='$datetime_end', place='$place' WHERE id='$id'");
    $_SESSION['message'] = "Address updated!"; 
    header('location: myEvents.php');
}
?>
<!DOCTYPE html>  
<html>  
    <head>  
        <meta charset="utf-8">  
        <title>Edit Event:Edit Event</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <script type="text/javascript" src="//code.jquery.com/jquery-compat-git.js"></script>

        <script>
        function toggleField(hideObj,showObj){
        hideObj.disabled=true;        
        hideObj.style.display='none';
        showObj.disabled=false;   
        showObj.style.display='inline';
        showObj.focus();
        }
        </script>

        <style>
        </style> 

    </head>  
    <body>
    <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="main.php">Event Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
      
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="main.php">Main</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="input.php">Input Events</a>
                </li>
            </ul>
            
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Welcome, <?php echo $_SESSION['login_user'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="myEvents.php?logout='1">Log Out</a>
                </div>
                </li>
                </ul>
              </div>
            </nav>
    <!-- ISI -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                <img src="https://obs.line-scdn.net/0m0190949972518a97ef6ee3d2f7a80755fc2cf5decc43/preview" alt="logohmsi" class="img-thumbnail" style="border:0px;">
                </div>
                <div class="col-11">
                    <h3>Himpunan Mahasiswa Sistem Informasi</h3>
                    <h6>Institut Teknologi Sepuluh Nopember Surabaya</h6>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-2">
                </div>

                <div class="col-8">
                   
                <div class="formbox">
                <h4 style="text-align: center;"> Edit Event Forms</h4>
                <p style="font-size: 14px;">Please fill in the form with the right information of your events. make sure to fill everything before submitting.<br></p>
                <form method="post" action="">  
                    <input name="_method" type="hidden" value="PATCH">  
        
                    <div class="form-group row">    
                        <label for="name">Nama Event:</label>  
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">  
                            <input type="hidden" name="id"  value="<?php echo $id; ?>">
                    </div>  
        
        
                    <div class="form-group row">  
                        <label for="details">Deskripsi:</label>  
                        <textarea class="form-control" rows="5" name="details" value="<?php echo $details; ?>"><?php echo $details; ?></textarea>  
                    </div>   
        
                    <div class="form-group row">  
                        <label for="time_start">Tanggal & Jam Mulai:</label>  
                            <input type="text" class="form-control" name="datetime_start" value="<?php echo $datetime_start; ?>">  
                    </div>  
        
                    <div class="form-group row">  
                        <label for="time_end">Tanggal & Jam Selesai:</label>  
                            <input type="text" class="form-control" name="datetime_end" value="<?php echo $datetime_end; ?>">  
                    </div>  
        
                    <div class="form-group row">  
                    <div id="billdesc">
                    <label for="place">Ruang Pelaksanaan:</label>  
                    <select id="test" class="form-control" name="place" value="<?php echo $place; ?>">
                    <option class="editable" value="<?php echo $place; ?>"><?php echo $place; ?></option>
                        <option value="1101">1101</option>
                        <option value="1102">1102</option>
                        <option value="2103">2103</option>
                        <option value="2208">2208</option>
                        <option value="2209">2209</option>
                        <option value="3101">3101</option>
                        <option value="3102">3102</option>
                        <option value="4101">4101</option>
                        <option value="4102">4102</option>
                        <option value="4201">4201</option>
                        <option value="4202">4202</option>
                    </select>
                    <input class="editOption" style="display:none;"></input>
                    </div> 
                    
                    </div>  
     
                    <script type="text/javascript"> var initialText = $('.editable').val();
                    $('.editOption').val(initialText);

                    $('#test').change(function(){
                    var selected = $('option:selected', this).attr('class');
                    var optionText = $('.editable').text();

                    if(selected == "editable"){
                    $('.editOption').show();

                    
                    $('.editOption').keyup(function(){
                        var editText = $('.editOption').val();
                        $('.editable').val(editText);
                        $('.editable').html(editText);
                    });

                    }else{
                    $('.editOption').hide();
                    }
                    });
                    </script>
        
                    <div class="text-center">  
                            <button  type="submit"  class="btn btn-success" name="update">Update Event</button>
                            <a href="myEvents.php"  class="btn btn-danger">Batal</a> 
                        </div> 
                    </div>  
                    </form>    
            </div>
            </div>

            <div class="col-2">

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <nav class="navbar navbar-expand-sm bottom justify-content-center">
        <span class="navbar-text">
            Made with ❤️ by Bayu Inho Ucha Nada
        </span>
    </nav>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>  
</html> 
