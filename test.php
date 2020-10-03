<?php 

if(isset( $_POST['ok'])){
	$prenom=$_POST['prenom'];
  	$nom=$_POST['nom'];
  	$email=$_POST['email'];
  	$tel=$_POST['tel'];
  	$adress=$_POST['adresse'];
  	$prenom_bebe=$_POST['PrenomBebe'];
  	//echo $nom.'<br>';
  	//echo $prenom.'<br>';
  	//echo $email.'<br>';
  	//echo $adress.'<br>';
  	//echo $prenom_bebe.'<br>';

  	$db = mysqli_connect("localhost","root","","smartcreche");

 	$sql = "INSERT INTO parant (prenom,nom,email,tel,adresse,nom_bebe) VALUES ('".$prenom."', '".$nom."','".$email."','".$tel."','".$adress."' ,'".$prenom_bebe."')"; 
    $done = mysqli_query($db, $sql);
    if (empty($done)) {
    	echo "empty";
    }else{
      echo $_SESSION['prenom'] = $prenom;
      $_SESSION['success'] ="vous aver inscrir votre enfant par succé ";
      header('location: index.html');;
    }

  }else{
  	echo 'fail';
  }
	

?>


	