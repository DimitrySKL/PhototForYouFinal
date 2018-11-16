<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>PhotoForYou</title>
<link rel="stylesheet" href="CSS/styles.css" type="text/css" />
</head>
    
<body>
    <div id="container">
    
 
        <?php include_once 'include/entete.inc.php';?>
        
        <div id="body">
        
            <div id="content">
                
                <?php
                    if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['type']) AND !empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['re-password']))
                    {
                        if ($_POST['password']==$_POST['re-password']) //Verifie que les mot passe taper sont les mêmes
                        {
                            if (strlen($_POST['password'])>=6 and strlen($_POST['password'])<=20) //Verifie la longueur du mot de passe
                            {
                                if (!preg_match("#^[a-z0-9]+$#", $_POST['pseudo']))//Verfie les caracter du du nom utiliser
                                {
                                ?>
                                    <!--Si le nom souhaite n'est pas valide-->
                                    <h2>Nom d'utilisateur souhaité invalide</h2>
                                    <p>Le nom d'utilisateur souhaité que vous voulez rentrer est invalide</p>  
                                    <a href="inscription.php">Retour au formulaire</a>
                                <?php
                                }
                                else
                                {
                                  //Verfie si l'email n'existe pas déja dans la bdd
                                   $req = $Connexion->prepare('SELECT email FROM users WHERE email = :Verif_email');
                                   $req->execute(array('Verif_email' => $_POST['email']));
                            
                                   $email_Exist=FALSE;
                            
                                    while ($Verification = $req->fetch())
                                    {
                                        $email_Exist=true;
                                    }

                                    if ($email_Exist==true)
                                    {
                                     ?>
                                    <!--Si le mail existe déja alors il affiche ceci-->
                                         <h2>Votre email existe deja</h2>
                                         <p>Un compte a déja était crée avec cet email, veuillez vous inscrire avec un autre email</p>  
                                         <a href="inscription.php">Retour au formulaire</a>
                                     <?php
                                     }
                                     //Si le mail n'existe pas alors il l'ajoute dans la base de donnée en effectuant une requete préparer
                                     else if ($email_Exist==false)
                                     {
                                     $req_inscription = $Connexion->prepare('INSERT INTO USERS(prenom, nom, type, pseudo, email, motdepasse)
                                             VALUES(:prenom, :nom, :type, :pseudo, :email, :password)');

                                     $req_inscription->execute(array(
                                     'prenom' => htmlspecialchars($_POST['prenom']),
                                     'nom' => htmlspecialchars($_POST['nom']),
                                     'type' => htmlspecialchars($_POST['type']),
                                     'pseudo' => htmlspecialchars($_POST['pseudo']),
                                     'email' => htmlspecialchars($_POST['email']),
                                     'password' => htmlspecialchars(md5($_POST['password'])),

                                     ));
                                     ?>
                                         <!--Si tous c'est bien dérouler alors il affiche le message ci-dessous-->
                                         <h2>Enregistrement effectuer avec succès</h2>
                                         <p>Félicitation, vous êtes enregistrer avec succes. Vous allez être rediriger vers la page d'accueil</p>
                                         <META HTTP-EQUIV="Refresh" CONTENT="5;URL=index.php">
                                         <a href="index.php">Retour à l'accueil</a>
                                     <?php  

                                     }
                                     else
                                     {
                                         ?>  <!--Sinon il affiche un message d'erreur-->  
                                             <h2>Oups, une erreur lors de l'incription</h2>
                                             <p>Une erreur c'est produite lors de la procedure d'inscription. Veuillez recommencer si le probleme persite merci de contacter l'administrateur</p>  
                                             <a href="inscription.php">Retour au formulaire</a>
                                          <?php
                                     }
                                  }
                                }
                                else
                                {
                                  ?><!--Affiche ce message si la taille du mot de passe est trop long ou trop petit-->
                                      <h2>longueur du mot de passe incorrect</h2>
                                      <p>Veuillez verifier la taille de votre mot de passe qui doit être entre 6 et 20 caractère</p>  
                                      <a href="inscription.php">Retour au formulaire</a>
                                  <?php
                                 }
                             }
                             else
                             {
                                ?>
                                    <!--Affiche ce message si le premier mot de passe inscrit ne correspond pas au deuxieme mot de passe inscrit-->
                                    <h2>Mot de passe incorrect</h2>
                                    <p>Le deuxieme mot de passe ne correspond pas au premier mot de passe veuillez resaisir votre mot de passe</p>  
                                    <a href="inscription.php">Retour au formulaire</a>
                                <?php
                             }           
                        }
                        else
                        {
                            ?>
                                <!--Si il y a une autre erreur dans la saisie alors il affiche ceci-->
                                <h2>Erreur dans la saisie</h2>

                                <p>Veuillez indiquez votre prénom !</p>   

                                <p>Veuillez indiquez votre nom de famille !</p>

                                <p>Veuillez indiquez votre pseudo !</p>

                                <p>Veuillez indiquez votre e-mail correcte !</p>

                                <p>Veuillez entrez un mot de passe !</p>

                                <a href="inscription.php">Retour au formulaire</a>
                            <?php
                        }
                        ?>
                </div>

                <div class="clear"></div>
                      
            </div>

        <?php include 'include/pieddepage.inc.php'; ?>

    </div>
    
</body>
</html>