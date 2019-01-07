<?php session_start() ?>
<div id="header">
    <h1><a href="index.php">PhotoForYou</a></h1>
    <h2>Vente de photo en ligne</h2>
    <div class="clear"></div>
</div>

<div id="nav">
    <ul>

      <?php        
        include_once 'mysql.php'; //Appelle les fonction de connexion

        $Connexion=connectBdd(); //Effectue une connexion à la base de donnée

        creeMenu($Connexion); //Permet de cree le menu en fonction du compte utiliser
        
      ?>


    </ul>
</div>