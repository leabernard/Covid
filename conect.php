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
    <title>covid</title>
</head>
<body>
    
    <?
    include "fonction.php"; 

    if($access){
        
        echo "BIENVENUE sur MON SITE";

    }else{
        echo "c'est ouf";
        echo $errorMessage;
    }
    ?>
</body>
</html>