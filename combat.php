<?php 
session_start();
include "fonction1.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Combat</title>
</head>
<body>
    
    <?php
    

    if($access){
        
        echo "BIENVENUE sur CE COMBAT ".$Joueur1->getPrenom();
        echo "TU COMBAT AVEC ".$Joueur1->getNomPersonnage();
        echo '<a href="index.php" >retour menu</a>';

    }else{
        echo $errorMessage;
    }
    ?>
</body>
</html>