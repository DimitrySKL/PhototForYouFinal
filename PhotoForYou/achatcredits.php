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
                
                <h2>Achat crédits</h2>

                <p>Vous pouvez acheter des credit sur cet page</p>   
               
            </div>


            <?php 
                include_once 'include/cotedroit.php'; 
                decoSession(); //On Fermeture de la connexion
            ?>
           
                      
        </div>


        <?php include_once 'include/pieddepage.php'; ?>
        
    </div>
</body>
</html>