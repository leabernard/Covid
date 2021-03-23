<?php 
//GESTION DE LA BASE -----------------------
$mabase = null;
$access = null;
$errorMessage="";

try{
            $user = "lapro_site";
            $pass = "TDataSource1234";
            $mabase =  new PDO('mysql:host=mysql-leabernard.alwaysdata.net; dbname=leabernard_virus; charset=utf8','230223_lea','Pastelle6169');


            
}catch(Exception $e){
    $errorMessage .= $e->getMessage();
}

//GESTION DES SESSION -----------------------
if(!is_null($mabase)){
    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
        $access = true;
        $access = afficheFormulaireLogout($mabase);
    }else{
        $access = false;
        $errorMessage.= "Vous devez vous connectez";
        // Affichage de formulaire si pas deconnexion
        $access = afficheFormulaireConnexion($mabase);
    }
   
}else{
    $errorMessage.= "Vous n'avez pas les bases";
}

function afficheFormulaireLogout($mabase){
    //traitement du formulaire
    $afficheForm = true;
    $access = true;
    if( isset($_POST["logout"]) && isset($_POST["logout"])){
        //si on se deco on raffiche le formulaire de co
        $_SESSION["Connected"]=false;
        session_unset();
        session_destroy();
        afficheFormulaireConnexion($mabase);
        $afficheForm = false;
        $access = false;
    }else{
        $afficheForm = true;
    }

    if($afficheForm){
    ?>
        <form action="" method="post" >
            <div >
                <input type="submit" value="Deco!" name="logout">
            </div>
        </form>

    <?php
    
    }

    return $access;
}

function afficheFormulaireConnexion($mabase){

    //traitement du formulaire
    $access = false;
    if( isset($_POST["login"]) && isset($_POST["password"])){
        //verif mdp en BDD

        $Result = $mabase->query("SELECT * FROM `user` WHERE `Nom`='".$_POST['login']."' AND `mdp` = '".$_POST['password']."'");
        if($tab = $Result->fetch()){ 
             //si mdp = ok
            $access = true;
            $_SESSION["Connected"]=true;
            $afficheForm = false;
            //si on est co on affiche le formulaire de deco
            afficheFormulaireLogout($mabase);
        }else{
            $afficheForm = true;
        }

                    

    }else{
        $afficheForm = true;
    }
    
    if($afficheForm){
    ?>
        <form action="" method="post" >
            <div>
                <label for="login">Enter your login: </label>
                <input type="text" name="login" id="login" >
            </div>
            <div >
                <label for="password">Enter your pass: </label>
                <input type="password" name="password" id="password" >
            </div>
            <div >
                <input type="submit" value="Go!" >
            </div>
        </form>

    <?php
    }

    return $access;
        
}





?>