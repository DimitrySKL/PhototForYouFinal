<?php session_start();

    include 'include/mysql.php';

    $connectSession=connectBdd();

    $_SESSION["ErreurAuthentification"]=FALSE; //variable pour le message d'erreur d'identification

    //transmet les variable des textbox au variable de session si existe dans la base
    if (htmlspecialchars(isset($_POST['login'])) and htmlspecialchars(isset($_POST['password'])))
    {
        $_POST['password']=md5($_POST['password']); //crypte le mot de passe

    	$reponse = $connectSession->query('SELECT email, motdepasse FROM users'); //Effectue la requete SQL pour verifier l'existance du compte

        //Verification de tous le mot de passe tant qu'il n'a pas trouver le bon il ne passe pas a true
    	while($donnee=$reponse->fetch())
        {
                //Si il existe alors on transmet les parametre dans les variable de session
                if((($donnee['email']) == ($_POST['login'])) and (($donnee['motdepasse']) == ($_POST['password'])))
                {
                    $_SESSION['login']=$_POST['login'];
                    $_SESSION['password']=$_POST['password'];
                    $_SESSION["ErreurAuthentification"]=TRUE;
                }
        }
    }
    header("location: index.php");

?>
