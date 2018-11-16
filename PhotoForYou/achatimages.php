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
        include_once 'include/entete.inc.php';
        ?>
        
        <div id="body">
        
            <div id="content">
                
                <h2>Achat d'image</h2>

                <p>Vous pouvez acheter des images ici</p>   
               
            </div>


            <?php 
                include_once 'include/cotedroit.inc.php'; 
                decoSession(); //On Fermeture de la connexion
            ?>
           
                      
        </div>


        <?php include_once 'include/pieddepage.inc.php'; ?>
        
    </div>
</body>
</html>