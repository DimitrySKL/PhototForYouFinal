<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>PhotoForYou</title>
<link rel="stylesheet" href="CSS/styles.css" type="text/css" />
</head>
    
<body>
    <div id="container">
    
        <?php   include_once 'include/entete.inc.php';?>
        
        <div id="body">
        
            <div id="content">
                
                <h2>Incription</h2>

                <p>Veuillez vous incrire ci-dessous</p>   
               
                <!--Les textbox pour l'inscription-->
                <form method="post" action="resultatFormulaire.php">
                    <label>Prénom</label><br/>
                    <input type="text" name="prenom" />
                    
                    <br/>
                                        
                    <label>Nom</label><br/>
                    <input type="text" name="nom" />
                    
                    <br/>
                    
                    <label for="type">Type</label><br/>
                    <select name="type" id="type">
                        <option value="Client">Client</option>
                        <option value="Photographe">Photographe</option>
                    </select>
                    
                    <br/>
                    
                    <label>Nom d'utilisateur souhaité</label><br/>
                    <p><input type="text" name="pseudo" /> Uniquement des lettres et des chiffres</p>
                    
                    <br/>
                    
                    <label>Adresse e-mail</label><br/>
                    <input type="email" name="email" />
                    
                    <br/>
                    
                    <label>Mot de passe</label><br/>
                    <p><input type="password" name="password" /> Entre 6 et 20 caractere, avec au moins une minuscule, une majuscule et un chiffre</p>
                
                    <!--Bouton envoyer-->
                    <label>Confirmer mot de passe</label><br/>
                    <input type="password" name="re-password" />
                    
                    <br/>
                    
                    <input type="submit" value="Suite" />
                    
                </form>
                
            </div>
           
            <div class="clear"></div>
                      
        </div>


        <?php include_once 'include/pieddepage.inc.php'; ?>

    </div>
</body>
</html>