<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$choice="";
// connect to the database
$db = mysqli_connect('localhost', 'djordje','karisic34', 'user_table');


// REGISTER USER
if (isset($_POST['reg_user'])) { 
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $choice=mysqli_real_escape_string($db, $_POST['choice']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if(empty($choice)) { array_push($errors, "Morate da izaberete"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,choice) 
  			  VALUES('$username', '$email', '$password', '$choice')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['choice'] = $choice;
    if($choice=='employer'){
      $query = "INSERT INTO poslodavac (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
          mysqli_query($db, $query);
    }
    else if($choice=='employee'){
      $query = "INSERT INTO radnik (username, email, password) 
      VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
    }
  	header('location: login.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  //$choice = mysqli_real_escape_string($db, $_POST['choice']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['choice'] = $row['choice'];
      $_SESSION['password']=  $password;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['loggedin']= true;
      $checker=1;
      if($_SESSION['choice']=="employer"){
        $sndquery="SELECT * FROM poslodavac WHERE username='$username'";
        $sndresults = mysqli_query($db, $sndquery);
         $sndrow = mysqli_fetch_array($sndresults);
        $_SESSION['naziv'] = $sndrow['naziv'];
        $_SESSION['struka'] = $sndrow['struka'];
        $_SESSION['kontakt']=  $sndrow['kontakt'];
        $_SESSION['kontakt2']=explode("-",$_SESSION['kontakt'],2)[1];
      }
      else if($choice='employee'){
        $sndquery="SELECT * FROM radnik WHERE username='$username'";
        $sndresults = mysqli_query($db, $sndquery);
         $sndrow = mysqli_fetch_array($sndresults);
        $_SESSION['ime'] = $sndrow['ime'];
        $_SESSION['iskustvo']=$sndrow['iskustvo'];
        $_SESSION['obrazovanje'] = $sndrow['obrazovanje'];      //dodaj ostale
        $_SESSION['rstruka'] = $sndrow['polozaj'];
        $_SESSION['kontaktr'] = $sndrow['kontaktRadnika'];
        $_SESSION['kontakt2r']=explode("-",$_SESSION['kontaktr'],2)[1];
        $_SESSION['informacije'] = $sndrow['informacije'];
      }
  	  header('location: index.php');
  	} else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['change_radnik'])) {
  $username=$_SESSION['username'];
  $ime = mysqli_real_escape_string($db, $_POST['ime']);
  $obrazovanje=mysqli_real_escape_string($db, $_POST['obrazovanje']);
  $rstruka=mysqli_real_escape_string($db, $_POST['rstruka']);
  $kontakt1r=mysqli_real_escape_string($db, $_POST['kontakt1r']);
  $kontakt2r=mysqli_real_escape_string($db, $_POST['kontakt2r']);
  $iskustvo=mysqli_real_escape_string($db, $_POST['iskustvo']);
  $kontaktr='+'.$kontakt1r."-".$kontakt2r;
  $informacije=mysqli_real_escape_string($db, $_POST['informacije']);
  if (empty($ime)) {
  	array_push($errors, "Unesite ime");
  }
  if (count($errors) == 0) {
    $query = "UPDATE radnik SET ime = '$ime',obrazovanje='$obrazovanje',polozaj = '$rstruka',informacije = '$informacije',kontaktRadnika = '$kontaktr', iskustvo='$iskustvo' WHERE username = '$username'";
     mysqli_query($db, $query);
          $_SESSION['ime'] = $ime;
          $_SESSION['skola'] = $obrazovanje;
          $_SESSION['rstruka'] = $rstruka;
          $_SESSION['kontaktr'] = $kontaktr;
          $_SESSION['kontakt2r']=$kontakt2r;
          $_SESSION['informacije'] = $informacije;
          $_SESSION['iskustvo'] = $iskustvo;
  }
}

  if (isset($_POST['add_new'])) {
    $firma=$_SESSION['naziv'];
    $struka=$_SESSION['struka'];
    $kontakt=$_SESSION['kontakt'];
    $username=$_SESSION['username'];
    $lokacija=mysqli_real_escape_string($db, $_POST['lokacija']);
    $sprema=mysqli_real_escape_string($db, $_POST['sprema']);
    $opis=mysqli_real_escape_string($db, $_POST['opis']);
    $date=date('Y-m-d', strtotime($_POST['rok']));
    if (empty($lokacija) || empty($sprema) || empty($opis) || empty($struka) || empty($firma)){
      array_push($errors, "Unesite podatke");
    }
    if (count($errors) == 0) {
      $query = "INSERT INTO oglas (firma, lokacija, opis,sprema,rok,struka,kontakt,izdavac) 
      VALUES('$firma', '$lokacija', '$opis', '$sprema','$date','$struka','$kontakt','$username')";
      mysqli_query($db, $query);
    }
  }
  if (isset($_POST['obrisi'])) {
      $id3=mysqli_real_escape_string($db,$_POST['obrisi']);
      $query = "DELETE FROM oglas WHERE id='$id3'";
      $result = mysqli_query($db,$query);
  }

  if (isset($_POST['change_poslodavac'])) {
    $username=$_SESSION['username'];
    $naziv=mysqli_real_escape_string($db, $_POST['naziv']);
    $kontakt1=mysqli_real_escape_string($db, $_POST['kontakt1']);
    $kontakt2=mysqli_real_escape_string($db, $_POST['kontakt2']);
    $kontakt="+".$kontakt1."-".$kontakt2;
    $struka=mysqli_real_escape_string($db, $_POST['struka']);
    if (empty($naziv) || empty($kontakt) || empty($struka)) {
      array_push($errors, "Unesite podatke");
    }
    if(count($errors)==0){
      $query = "UPDATE poslodavac SET naziv = '$naziv',kontakt='$kontakt',struka='$struka' WHERE username = '$username'";
     mysqli_query($db, $query);
     $_SESSION['naziv']=$naziv;
     $_SESSION['struka']=$struka;     //unset!
     $_SESSION['kontakt']=$kontakt;
     $_SESSION['kontakt2']=$kontakt2;

    }

    //dodajemo u ocene table


    
  }

if(!isset($_SESSION['username']))
{
  $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
  if($curPageName=='index.php'){
    header('location:login.php');
    die();
  }
}
if(isset($_POST['prikazi'])){               //nepotrebno, samo za proveru da li radi 
  $query = "SELECT id,naziv,lokacija FROM oglas";
  $result = mysqli_query($db,$query);
  echo "MOZDA";
if ($result->num_rows > 0) {
  // output data of each row
  echo "DA";
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firma"]. " " . $row["lokacija"]. "<br>";
  }
} else {
  echo "Nema rezultata";
}
$result->free();
}
//proveri opet ovo dole da l ti treba
//$value= $_SERVER['REQUEST_URI']; 
//$pattern="index.php?";
//if(strpos($value,$pattern)==true){
//    $check=explode("?",$value);
  //  $check=explode("=",$check[1]);
    //$cid=$check[0];
    //$query="SELECT * from oglas WHERE id='$cid'";
    //$result=mysqli_query($db,$query);
    //$row = $result->fetch_assoc();            //dinamicki napravi sajt!!!!!!!
    // echo "<script> var nekidiv=document.getElementById('vise');nekidiv.style.display='inline-block'; </script>";
  
//}
if(isset($_POST['leaveacomment'])){  
$imeKompanije=$_GET['ime'];
$comment=mysqli_real_escape_string($db,$_POST['comment']);
$korisnik=$_SESSION['username'];
$ocena=mysqli_real_escape_string($db,$_POST['rating1']);
$query="INSERT INTO komentari (imeKompanije,komentar,korisnik,ocena) VALUES ('$imeKompanije','$comment','$korisnik','$ocena')";
mysqli_query($db,$query);
}
?>