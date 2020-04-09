<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Event</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
  </head>

<body>
<!-- AWAL  -->
<nav class="navbar navbar-expand-lg text-uppercase sticky-top" style='background-color:black'>
  <div class="container"></div>
    <h1 class="navbar-brand js-scroll-trigger text-white"><a href="">Home</a></h1>
    </nav>

    <div class="row text-center pt-5">

    <div class="col-sm-1 pt-5"></div>

  
    <div class="col-sm-10">
<h5> <b> Detail Event</b></h5>

<div class="h-divider"></div> 

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tanggal Event</th>
          <th>Nama</th>
          <th>Lokasi</th> 
          <th>Penyelenggara</th> 
          <th>Deskripsi</th>
          <th>Jam mulai</th>
          <th>Jam selesai</th>
        </tr>
      </thead>
      <tbody>

       <?php 
       session_start();
       $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');

       
      if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        echo
                          "<tr>
                          <td>" . $row["ID"] . "</td>
                          <td>" . $row["date"] . "</td>
                          <td>" . $row["name"] . "</td>
                          <td>" . $row["place"] . "</td>
                          <td>" . $row["organizer"] . "</td>
                          <td>" . $row["description"] . "</td>
                          <td>" . $row["start"] . "</td>
                          <td>" . $row["end"] . "</td>
                          </tr>";
                      }
                    }
                  
                    ?>
      </tbody>
    </table>
  

  <div class="col-sm-1"></div>

  </div>

<!-- AKHIR  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>