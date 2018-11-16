<?php session_start(); ?><!--Laisse la session ouvert-->

<!--Ceci sert a supprimmer la session et rediriger vers l'acceuil-->
<?php
	session_destroy();
	header('location: index.php');
?>