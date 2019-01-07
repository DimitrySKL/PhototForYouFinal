<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>PhotoForYou</title>
<link rel="stylesheet" href="CSS/styles.css" type="text/css" />
</head>
    
<body>
    <div id="container">
    
        <?php 
        include_once 'include/entete.php';
        ?>
        
        <div id="body">
        
            <div id="content">
                
                <h2>Connexion</h2>

                <p>Pour acheter ou envoyer vos oeuvre veuiller vous connecter ci-dessous</p>   
               
            </div>
              <div class="clear"></div>
              
                 <form method="post" action="traitementConnexion.php" >
                       <label>Adresse e-mail</label>
                       <input type="text" name="login" />

                       <label>Mot de passe</label>
                       <input type="password" name="password" />
                       <input type="submit" value="Se connecter" />
                       <p>            
                           <?php //on active un texte si il y a une erreur sur l'identification
                            if (isset($_SESSION["ErreurAuthentification"]) and $_SESSION["ErreurAuthentification"]==FALSE)
                            {
                                echo '<p class="erreurIdentification">l\'email ou le mot de passe est incorrecte</p>'; 
                            }
                           ?>
                       </p>
                 </form>
            
            <div class="clear"></div>

            <?php 
                decoSession(); //On Fermeture de la connexion
            ?>
           
                      
        </div>


        <?php include_once 'include/pieddepage.php'; ?>
        
    </div>
</body>
</html>