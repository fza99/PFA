<?php 
if(isset($_POST) && isset($_POST['prenom'] ) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])){
	extract($_POST);
	if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($sujet) && !empty($message)) {
		$destinataire="fatimazahraeelamrani199@gmail.com";
		$sujet="formulaire de contact ";
		$message="une nouvlle question arrive";
		Nom:"$nom" ;
		Email:"$email ";
		Message:"$message";
		$entete="From : $nom \n Reply_To: $email";
		mail($destinataire, $subjet, $message,$entete);
		echo" Merci de nous contacter nou vous reppendre au plus tos possible";

		# code...
	}
	else{

		echo"Vous n'aver pas emplier tous les chmps ";
	}
}
?>