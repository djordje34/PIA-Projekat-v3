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
    <script type="text/javascript" src="skripta.js">   </script>
   <style>
        body{ font: 14px sans-serif; text-align: center;}
    </style>
    <title>Document</title>
</head>
<body>
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
              <a class="nav-link active" aria-current="page" href="dodajoglas.php">Dodajte oglas</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="mojioglasi.php">Pogledajte Vaše oglase</a>
              </li>
              <li class="nav-item" style="position:absolute; right:20px;">
              <a style="color:#DC3545;" class="nav-link active aria-current="page" href="logout.php" class="btn btn-danger ml-3"><b>Izloguj me</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION['choice']=='employee'){
    header("location: index.php");
    exit;
}
?>
    <?php
    $username=$_SESSION['username'];
      $query = "SELECT * FROM oglas WHERE izdavac='$username'";
      $result = mysqli_query($db,$query);
    if ($result->num_rows >= 0) {
      // output data of each row
      echo "<section style='background-color:white;max-width:90%;margin:0 15% 0 15% ;height:auto;min-height:100%;position:absolute;'>";

     while($row = $result->fetch_assoc()) {
       $id1=$row['id'];
        echo "<div id='$id1' style='position:relative;background-color:#212529;display:inline-block;width:auto;max-width:300px;height:auto;border:1px solid #212529;margin:10px;border-radius:20px;'\><img style='border:1px solid #212529;border-radius:15px;' src='randomlogo2.png' alt='neka slika'\>" ."<p style='font-size:15px;margin:10px;padding:5px;background-color:#FFC312;opacity:0.85;border:1px solid #FFC312;border-radius:20px;'\>"."Ime kompanije:<b>" .$row["firma"]. "  </b><br>Lokacija:<b>" . $row["lokacija"]. "  </b><br>Minimal nivo obrazovanja:<b>" .$row["sprema"]."  </b><br>Tip inženjerstva:<b>".$row["struka"]."  </b>"."</b><br>Prijava moguća do:<b>".date("d.m.Y.", strtotime($row["rok"]))."  </b><br>Kontakt:<b>".$row['kontakt'] ."</b>"."<br><p style='display:none'>".$row['opis']."</p>"."<p style='display:none'>".$row['izdavac']."</p></p><br>;<button onclick='window.location.href=\"promenioglas.php?id=\"+$id1;' class='btn btn-danger' name='promeni' value='$id1'style='border:2px solid black;margin:-10px 0 10px 0;'>Izmeni</button>";
       echo "<button class='btn btn-warning' name='prijave' value='$id1' style='border:2px solid black;margin:-10px 0 10px 0;'>Prikaži prijave</button>";
        echo "<form method='post'><button class='btn btn-dark' name='obrisi' value='$id1' style='border:2px solid black;margin:-5px 0 10px 0px;'>Obriši oglas</button></form></div>";
      
    }
    #echo "</div>";
    echo "</section>";
    } else {
      echo "0 results";
    }
    $result->free();
  ?>
</body>
</html>