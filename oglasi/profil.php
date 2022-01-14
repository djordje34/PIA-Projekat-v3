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
?>
<section style='background-color:white;max-width:80%;margin:auto;height:auto;min-height:100%;background-repeat:repeat;'>
<div style="left:30px;margin:0px 25%;border:2px solid #ffC312;border-radius:15px;">
   <p style="font-size:15px;margin:0px;">Dobrodošli <?php echo $_SESSION["username"]?>! </p>
   <p style="font-size:15px;margin:0px;">Ovde možete uneti Vaše podatke. </p>
 <form method="post" style="margin:10px;padding:20px ;border:1px solid #212529;border-radius:15px 15px 15px 15px;background-color:rgba(33,37,41,0.85);">
<div class="input-group form-group" style="margin:10px 0 10px 0;border-radius:0 10px 10px 0;">
                            <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;" >
                                <span class="input-group-text"><i class="fas fa-user" style="margin:5px 5px 5px 5px;"></i></span>
                            </div>
                            <input style="border-radius:0 10px 10px 0; border:1px solid black;border-left:0;font-size:15px;text-align:center;max-width:350px;"type="text" name="ime" class="form-control" placeholder="Vaše ime" value="<?php echo $_SESSION['ime']?>"required>
                        </div> 
<div class="input-group form-group" style="margin:10px 0 10px 0;">
                            <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;">
                                <span class="input-group-text"><i class="fas fa-phone" style="margin:5px 5px 5px 5px;"></i></span>
                            </div> 
                            <input style="border:1px solid black;border-left:0; width:40px;border-radius:0 10px 10px 0;padding:0;outline:0;text-align:center;display:inline-block;" type="tel" id="phone" name="kontakt1r" pattern="[0-9]{3}" value="381"required>
                             <input style="border:1px solid black;border-left:0;margin-left:2px;border-radius:10px 10px 10px 10px;padding:0;outline:0;text-align:center;" type="tel" id="phone" name="kontakt2r" pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}" placeholder="Kontakt telefon" value="<?php echo $_SESSION['kontakt2r']?>" required>
                          </div> 
<div class="input-group form-group" style="margin:10px 0 10px 0;">
                            <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;">
                                <span class="input-group-text"><i class="fas fa-industry" style="margin:5px 5px 5px 5px;"></i></span>
                            </div> 
                            <select class="form-select" aria-label="Izbor" name="rstruka" style="border:1px solid black;border-left:0; width:40px;border-radius:0 10px 10px 0;text-align:center;max-width:250px;">
                            <option value="" disabled>Trenutni izbor:<?php echo $_SESSION['rstruka']?></option>
                            <option value="Mašinski inženjering">Mašinski inženjering</option>
                             <option value="Softverski inženjering">Softverski inženjering</option>
                             <option value="Elektrotehnički inženjering">Elektrotehnički inženjering</option>
                             <option value="Računarski inženjering">Računarski inženjering</option>
                             <option value="Urbani inženjering">Urbani inženjering</option>
                             <option value="Hemijski inženjering">Hemijski inženjering</option>   
                             <option value="Aeronautički inženjering">Aeronautički inženjering</option>  
                             <option value="Telekomunikacioni inženjering">Telekomunikacioni inženjering</option>  
                            </optgroup>
                        </select> </div>  
                        <div class="input-group form-group" style="margin:10px 0 10px 0;">
                            <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;">
                                <span class="input-group-text" style="align:center;"><i class="fas fa-school" style="margin:3px 3px" ></i></span>
                            </div> 
                            <select class="form-select" aria-label="Izbor" name="obrazovanje" style="border:1px solid black;border-left:0; width:40px;border-radius:0 10px 10px 0;text-align:center;max-width:250px;">
                            <option value="" disabled>Trenutni izbor:<?php echo $_SESSION['obrazovanje']?></option>
                             <option value="Osnovna škola">Osnovna škola</option>
                             <option value="Srednja škola">Srednja škola</option>
                             <option value="Više strukovne studije">Više strukovne studije</option>
                             <option value="Osnovne akademske studije">Osnovne akademske studije</option>
                             <option value="Master akademske studije">Master akademske studije</option>
                             <option value="Doktorske studije">Doktorske studije</option>  
                            </optgroup>
                        </select> </div>  

                        <div class="input-group form-group" style="margin:10px 0 10px 0;max-width:30%;">
                         <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;">
                                <span class="input-group-text" "><i class="fas fa-wrench" style="margin:5px"></i></span>
                            </div>
                            <input type="number" min="0" max="60" name="iskustvo" class="form-control" placeholder="Radno iskustvo" style="border:1px solid black;border-left:0;border-radius:0 10px 10px 0;text-align:left;font-size:15px;text-align:center" required value="<?php echo $_SESSION['iskustvo']?>">
                            </div>

                        <div class="input-group form-group" style="margin:10px 0 10px 0;">
                         <div class="input-group-prepend" style="background-color:#FFC312;border:1px solid black;border-right:0;">
                                <span class="input-group-text" "><i class="fas fa-briefcase" style="margin:30px 5px"></i></span>
                            </div>
                            <textarea rows="4" cols="50" name="informacije" class="form-control" placeholder="Nešto više o Vama" style="border:1px solid black;border-left:0; width:40px;border-radius:0 10px 10px 0;text-align:left;max-width:500px;max-height:200px;min-height:100px;font-size:15px;" required><?php echo $_SESSION['informacije']?></textarea>
                            </div>
                          <button type="submit" class="btn btn-danger" name="change_radnik" style="border:1px solid black;margin:40px 0 0 0;">Sačuvaj promene</button>
                          </div>
                        </form>
</section>
<body>
    </html>