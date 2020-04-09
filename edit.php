<?php

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($db, "SELECT * FROM events WHERE id=$id");

    if ($id > 0 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $details = $n['details'];
        $date = $n['date'];
        $time_start = $n['time_start'];
        $dtime_end = $n['time_end'];
        $place = $n['place'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $date = $_POST['date'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $place = $_POST['place'];

    mysqli_query($db, "UPDATE events SET name='$name', details='$details', date='$date', time_start='$time_start',
    time_end='$time_end', place='$place' WHERE id=$id");
    $_SESSION['message'] = "Address updated!"; 
    header('location: masuk.php');
}
?>
<!DOCTYPE html>  
<html>  
    <head>  
        <meta charset="utf-8">  
        <title>Edit Event</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
    </head>  
    <body>  
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">Event Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, User
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">My Events</a>
                <a class="dropdown-item" href="#">Log Out</a>
                </div>
        </li>
        </ul>
        </div>
        </nav>

    <br />
    <br />
    <br />
    <br />

        <div class="container">  
            <h2>Perubahan Event</h2><br />  

            <form method="post" action="">  
            <input name="_method" type="hidden" value="PATCH">  

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <label for="name">Nama Event:</label>  
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">  
                </div>  
            </div>  

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <label for="details">Deskripsi:</label>  
                    <input type="text" class="form-control" name="details" value="<?php echo $details; ?>">  
                </div>  
            </div>   

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <label for="date">Tanggal Pelaksanaan:</label>  
                    <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">  
                </div>
            </div>  

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <label for="time_start">Jam Mulai:</label>  
                    <input type="text" class="form-control" name="time_start" value="<?php echo $time_start; ?>">  
                </div>
            </div>  

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <label for="time_end">Jam Selesai:</label>  
                    <input type="text" class="form-control" name="time_end" value="<?php echo $time_end; ?>">  
                </div>
            </div>  

            <div class="row">  
                <label for="place">Ruang Pelaksanaan:</label>  
                <select class="form-control" name="place" value="<?php echo $place; ?>">
                    <option value="1">1101</option>
                    <option value="2">1102</option>
                    <option value="3">2103</option>
                    <option value="4">2208</option>
                    <option value="5">2209</option>
                    <option value="6">3101</option>
                    <option value="7">3102</option>
                    <option value="8">4101</option>
                    <option value="9">4102</option>
                    <option value="10">4201</option>
                    <option value="11">4202</option>
                </select>
            </div>  

            <div class="row">  
                <div class="col-md-4"></div>  
                <div class="form-group col-md-4">  
                    <button  type="submit"  class="btn  btn-success"  style="margin-  left:38px">Update Produk</button>  
                </div> 
            </div>  
            </form>  
        </div>  
        <nav class="navbar navbar-expand-sm fixed-bottom justify-content-center">
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