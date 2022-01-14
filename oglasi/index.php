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
   <script type="text/javascript" src="skripta.js">   </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <style>
        body{ font: 14px sans-serif; text-align: center; overflow:auto;min-height:100%;}
    </style>
    <title>Document</title>
</head>
<body style="background-repeat:repeat;">
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
    header("location: indexp.php");
    exit;
}
?>
    <section>
    <form method="post" style="width:80%">
    <div class="input-group form-group" style="margin:0 0 10px 0;max-width:400px;">
                            <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;border-radius:20px 0 0 20px;">
                                <span class="input-group-text"><i class="fas fa-search "style="margin:5px 5px 5px 5px;" ></i></span>
                            </div>
                            <input style="border-radius:0 0 0px 0; border:1px solid black;border-left:0;border-right:0;font-size:15px;text-align:center;max-width:350px;" type="text" name="pretraga" class="form-control" placeholder="Pretraga">
                            <button type="submit" name="pretrazi" class="btn btn-warning" style="border:1px solid black;border-radius:0 15px 15px 0">Pretraži</button>
                          </div> 
</div>
</form>
    </section>
    
    <?php
    $username=$_SESSION['username'];
      $query = "SELECT * FROM oglas";
      if(isset($_POST['pretrazi'])){ 
        $kriterijum=mysqli_real_escape_string($db,$_POST['pretraga']);
        if(!empty($kriterijum)){
          $query.=" WHERE (firma LIKE '%".$kriterijum."%') OR (lokacija LIKE '%".$kriterijum."%') OR (opis LIKE '%".$kriterijum."%') OR (sprema LIKE '%".$kriterijum."%') OR (struka LIKE '%".$kriterijum."%') OR (kontakt LIKE '%".$kriterijum."%') OR (rok LIKE '%".$kriterijum."%')";
        }
      }
      $result = mysqli_query($db,$query);
    if ($result->num_rows >= 0) {
      
      // output data of each row
      echo "<section style='background-color:white;max-width:90%;margin:0 15% 0 15%;height:auto;position:absolute;'>";
      echo "<div id='vise' style='position:fixed;display:none;z-index:100;background: rgba(128,128,128, 0.7);margin:auto ;min-width:70%;min-height:80%;width:80%;right:10%;left:10%;top:auto;bottom:10%;border:3px solid #FFC312;border-radius:60px;' >";
      echo "<button class='btn btn-dark btn-sm' style='right:0;position:absolute;margin:2%;' onclick='return ugasi()' name='ugasi'>x</button>";
      echo "<div id='contents' style='font-size:17px ;border:3px solid #FFC312;margin:5% 20% 0 20%;background-color:grey;border-radius:20px;'></div>";
      echo "<button class='btn btn-danger ' style='margin:10% 0 10px 0;border:1px solid black;' onclick='return prijaviMe()' name='prijavi'>Prijavi me</button>";
      echo "</div>";
      
     while($row = $result->fetch_assoc()) {
        $id1=$row['id'];
        echo "<div id='$id1' style='position:relative;background-color:#212529;display:inline-block;width:auto;max-width:300px;height:auto;border:1px solid #212529;margin:10px;border-radius:20px;'\><img style='border:1px solid #212529;border-radius:15px;' src='randomlogo2.png' alt='neka slika'\>" ."<p style='font-size:15px;margin:10px;padding:5px;background-color:#FFC312;opacity:0.85;border:1px solid #FFC312;border-radius:20px;'\>"."Ime kompanije:<b>" .$row["firma"]. "  </b><br>Lokacija:<b>" . $row["lokacija"]. "  </b><br>Minimal nivo obrazovanja:<b>" .$row["sprema"]."  </b><br>Tip inženjerstva:<b>".$row["struka"]."  </b>"."</b><br>Prijava moguća do:<b>".date("d.m.Y.", strtotime($row["rok"]))."  </b><br>Kontakt:<b>".$row['kontakt'] ."</b>"."<br><p style='display:none'>".$row['opis']."</p>"."<p style='display:none'>".$row['izdavac']."<p style='display:none'>".$row['id']."</p>"."</p></p><br><form method='post'> <button onclick='return prikaziVise($id1)' class='btn btn-danger' name='prikaz' value='$id1' style='border:2px solid black;margin:-10px 0 10px 0;'>Pogledaj više </button></form></div>";
    }
    echo "</div>";
    echo "</section>";
    } else {
      echo "0 results";
    }
    $result->free();
  ?>

    

</body>
</html>