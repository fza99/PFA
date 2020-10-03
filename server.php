<?php 

   session_start();
   $prenom="";
   $nom="";
   $email="";
   $errors=array();
   $tel="";
   $adresse="";
   $PrenomBebe="";
  //connect to data base 
  /*$connect = mysqli_connect("localhost", "root", "", "testing");
  $query = "SELECT * FROM account";
  $result = mysqli_query($connect, $query);*/
 
  $db = mysqli_connect("localhost","root","","smartcreche");

// Check connectionsss
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
   //if the regester button is clicked 
  if(isset($_POST['Register'])){

  	$prenom=$_POST['Prenom'];
  	$nom=$_POST['nom'];
  	$email=$_POST['email'];
  	$password_1=$_POST['password_1'];
  	$password_2=$_POST['password_2'];
  	
  	//ensure that form fileds are filled properly
  	if(empty($nom)){
  		array_push($errors,"nom est oblegatoire ");
  	}
  	if(empty($prenom)){
  		array_push($errors,"prenom est oblegatoire ");
  	}
  	if(empty($email)){
  		array_push($errors,"email est oblegatoire ");
  	}
  	if(empty($password_1)){
  		array_push($errors,"password est oblegatoire ");
  	}
  	if($password_1 != $password_2){
  		array_push($errors,"le mot de passe enter ne marche pas avec le premier  ");
  	}
  	//if there is are no errors , save user to database
  	if(count($errors)==0){
  		$password=md5($password_1);//encrypt password before storing in database (security)
      echo("INSERT INTO utilisateurs (prenom,nom,email,password) VALUES ('$prenom', '$nom', '$email', '$password')");
  		$sql= "INSERT INTO utilisateurs (prenom,nom,email,password) VALUES ('$prenom', '$nom', '$email', '$password')"; 
      $done = mysqli_query($db, $sql);
  		$_SESSION['prenom'] = $prenom;
  		$_SESSION['success'] ="vous  enregister ";
  		header('location: formula.php');
  	}
  }
  //log user in from login page 
  if (isset($_POST['login'])) {
  	$prenom=mysql_real_escape_string($_POST['prenom']);
  	$nom=mysql_real_escape_string($_POST['nom']);
  	$password=mysql_real_escape_string($_POST['password']);
  	if(empty($nom)){
  		array_push($errors,"nom est oblegatoire ");
  	}
  	if(empty($prenom)){
  		array_push($errors,"prenom est oblegatoire ");
  	}
  	if(empty($password)){
  		array_push($errors,"password est oblegatoire ");
  	}
  	if (count($errors)==0){
  		//$password=md5($password);
  		$query="SELECT*FROM utilisateurs WHERE password='$password' AND nom='$nom' AND prenom='$prenom'; ";
      $result=mysqli_query($db,$query);
  		if(mysqli_num_rows($result)==1){
  			//log user in 
  			$_SESSION['nom']=$nom;
  			$_SESSION['success']='vous êtes connecté ';
  			header('location: formula.php');
  		}
  		else{
  			array_push($errors,"le mot de pass ou bien le nom ou bien le prenom tappé est faut ");
  			header('location: login.php');
  		}
  	}
  }
  //logout&
  if(isset($_GET['logout'])){
  	session_destroy();
  	unset($_SESION['nom']);
  	header('location : login.php');
  }
  //inscerption
  if(isset($_POST['ok'])){

    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $adresse=$_POST['adresse'];
    $PrenomBebe=$_POST['PrenomBebe'];
    
    //ensure that form fileds are filled properly
    if(empty($nom)){
      array_push($errors,"nom est oblegatoire ");
    }
    if(empty($prenom)){
      array_push($errors,"prenom est oblegatoire ");
    }
    if(empty($tel)){
      array_push($errors,"tel est oblegatoire ");
    }
    if(empty($emai)){
      array_push($errors,"email est oblegatoire ");
    }
    if(empty($adresse)){
      array_push($errors,"adresse est oblegatoire ");
    }
    if(empty($prenomBebe)){
      array_push($errors,"prenom de bebe  est oblégatoire ");
    }
    if(empty($gender)){
      array_push($errors,"gender de bebe  est oblégatoire ");
    }
    //if there is are no errors , save user to database
    if(count($errors)==0){
      echo("INSERT INTO parant (prenom,nom,email,tel,adresse,nom_bebe) VALUES ('$prenom', '$nom','$email','$tel','$adresse' ,'$PrenomBebe' );");
      $sql = "INSERT INTO parant (prenom,nom,email,tel,adresse,nom_bebe) VALUES ('".$prenom."', '".$nom."','".$email."','".$tel."','".$adress."' ,'".$prenom_bebe."')"; 
        //$sql= "INSERT INTO parant (prenom,nom,email,tel,adresse,nom_bebe) VALUES ('$prenom', '$nom','$email','$tel','$adresse' ,'$PrenomBebe')"; 
      $done = mysqli_query($db, $sql);
      $_SESSION['prenom'] = $prenom;
      $_SESSION['success'] ="vous aver inscrir votre enfant par succé ";
      header('location: index.html');
    }
  } 
  
?>ss