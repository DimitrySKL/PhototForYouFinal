<?php

    function connectBdd()//Crée une connexion à la base de donnée
    {
       try{
            define("SERVEUR", 'mysql:host=localhost;dbname=photoforyou');
            define("USER", 'root');
            define("PASSWORD", '');


            $ResultConnect = new PDO(SERVEUR, USER, PASSWORD);

            return $ResultConnect;
        }
        catch (Exception $e)
	{
		echo 'Problème de connexion à la base de donnée réassayer plus tard';
		?><br/><?php
		die('Erreur : ' . $e->getMessage());
	}
    }
    
    function decoSession()//Creation du bouton deconnexion
    {
        if (empty($_SESSION['login'])==FALSE)//Si la variable Session est cre et pas vide
        {
            echo '<p><a href="deconnexion.php">Déconnexion</a></p>';
        }
    }
    
    function creeMenu($uneConnexion)
    {
        foreach ($uneConnexion->query('SELECT * from Menu') as $elements)
        {
            if (empty($_SESSION['login'])==FALSE)
            {
                if (($elements['Lien']=='inscription.php') or ($elements['Lien']=='connexion.php'))
                {
                    //on n'affiche rien car connecter
                }
                else
                {
                    //alors on affiche le reste
                   ?><li <?php if($_SERVER['REQUEST_URI'] == "/PhotoForYou/".$elements['Lien']) { echo 'class="pageActuel"';} ?> ><a href="<?php echo $elements['Lien']?>"><?php echo $elements['NomMenu'] ?></a></li><?php
                   
                   }
            }
            else //Si la session n'est pas activer
            {
             ?><li <?php if($_SERVER['REQUEST_URI'] == "/PhotoForYou/".$elements['Lien']) { echo 'class="pageActuel"';} ?> ><a href="<?php echo $elements['Lien']?>"><?php echo $elements['NomMenu'] ?></a></li><?php
            }
        }
    }
 ?>