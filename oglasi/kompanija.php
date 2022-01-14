<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!--Bootsrap 4 CDN-->
         <!--Fontawesome CDN-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <link rel="stylesheet" href="pocetna.css">
   <link rel="stylesheet" href="style.css">
   <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <title>Document</title>
</head>
<body onload="    var ocena=document.getElementById('ocenaFirme').textContent;var gde=document.getElementById('prosecnaOcena');ocena=Math.round(ocena * 100) / 100;gde.innerHTML+='<b>'+ocena+'/5</b>'">
<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Oglasi!
              <img src="colour.jpg" alt="logo" style="width:30px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Početna</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profil.php">Podešavanja profila</a>
              </li>
              <li class="nav-item" style="position:absolute; right:20px;">
              <a style="color:#DC3545;" class="nav-link active aria-current="page" href="logout.php" class="btn btn-danger ml-3"><b>Izloguj me</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION['choice']=='employer'){
    header("location: index.php");
    exit;
}

if(isset($_GET['ime'])){
}
?>

<section style='background-color:white;max-width:80%;margin:auto;height:auto;min-height:100%;margin-bottom:0%;margin-top:-5%;padding:20px;'>
<div style="margin:10% 25%;">
   <p style="font-size:15px;margin:5%;"><b><?php echo $_SESSION["username"]?></b>, na ovoj stranici možete oceniti <b><?php echo $_GET['ime'] ?></b><a href="#komentarisi" style="text-decoration:none;color:red;"> i ostaviti komentar<a>! </p>
  <p id='prosecnaOcena'>Prosečna ocena ove kompanije je </p>
 <?php 
  $imeKompanije=mysqli_real_escape_string($db,$_GET['ime']);
    $query="SELECT * FROM komentari WHERE imeKompanije='$imeKompanije'";
    $result = mysqli_query($db,$query);
    if ($result->num_rows > 0) {
      $sum=0;
      while($row = $result->fetch_assoc()) {
        $sum+=$row['ocena'];
      echo  "<div class='input-group form-group' style='margin:0 0 10px 0;'><div class='input-group-prepend'><span class='input-group-text' style='border-left:1px solid black;border-radius:10px 0 0 10px;'><p style='color:black;font-size:12px;text-align:center;margin:auto;'>".$row['korisnik']."</p></span>";
      echo "</div><textarea rows='4' cols='50' style='min-height:100px;border:4px solid #FFC312;border-radius:0 12px 12px 0;' class='form-control' disabled required>".$row['komentar']."</textarea>"."</div>";
     echo $row['ocena'];
    }
     $socena=$sum/$result->num_rows;
     echo "<p id='ocenaFirme' style='display:none;'>".$socena."</p>";
    }

    ?>
    <form method='post'>
        <div class="rating-css">
    <div class="star-icon" style=''>
    <span style="color:black;font-size:15px;text-decoration:none;text-shadow:none;font-weight:600;text-transform:none;">Vaša ocena:</span>
      <input type="radio" name="rating1" id="rating1" value='1'> 
      <label for="rating1" class="fa fa-star"></label>
      <input type="radio" name="rating1" id="rating2" value='2'>
      <label for="rating2" class="fa fa-star"></label>
      <input type="radio" name="rating1" id="rating3" value='3' checked>
      <label for="rating3" class="fa fa-star"></label>
      <input type="radio" name="rating1" id="rating4" value='4'>
      <label for="rating4" class="fa fa-star"></label>
      <input type="radio" name="rating1" id="rating5" value='5'> 
      <label for="rating5" class="fa fa-star"></label>
    </div>
  </div>
    <div class="input-group form-group" style="background-color:#FFC312;margin:0 0 10px 0; border:1px solid black;">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-briefcase" style='margin:35px 5px'></i></span>
    </div>
    <textarea rows="4" cols="50" style='min-height:100px;' name="comment" class="form-control" placeholder="Ostavi komentar" required></textarea>
    </div>
    <button type="submit" id="komentarisi"class="btn btn-danger" name="leaveacomment" style="border:2px solid black;margin:30px 0 0 0;">Ostavi komentar</button>

    </form>
</div>
</section>
</body>
</html>