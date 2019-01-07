<div class="sidebar">
    
    <?php
    
        //Si la variable session existe on cree le menu
        if (isset($_SESSION['login']) && isset ($_SESSION['password']))
        {
            ?>
                <ul>	
                   <li>
                        <h3>Navigate</h3>
                        <ul class="blocklist">
                            <?php   creeMenu($Connexion); //Permet de crée le menu en fonction du compte utiliser ?> 
                        </ul>
                    </li>
                </ul> 
            <?php
       
        }   
        else
        {
    ?>
    
    <div><!--Cree le formulaire si il y a pas de connexion active-->
        <form method="post" action='<?php echo "traitementConnexion.php"; ?>' ><!--Envoie le formulaire dans le traitement-->
            
            <?php //on active un texte si il y a une erreur sur l'identification
                if (isset($_SESSION["ErreurAuthentification"]) and $_SESSION["ErreurAuthentification"]==FALSE)
                {
                    echo '<p class="erreurIdentification">l\'email ou le mot de passe est incorrecte</p>'; 
                }
            ?>
            
            <!--Si il pas de session alors on met le formulaire de connexion-->
            <label>Adresse e-mail</label>
            <input type="text" name="login" />

            <label>Mot de passe</label>
            <input type="password" name="password" />
            <br/>
            <input type="submit" value="Se connecter" />
        </form>
    </div>
    
    <?php
        }
    ?>
    
</div>

<div class="clear"></div>
