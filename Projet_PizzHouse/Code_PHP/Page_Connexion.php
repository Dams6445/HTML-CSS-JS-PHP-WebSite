<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<script type="text/javascript" src="../Code_JS/fonction.js"></script>
<script src="../Code_JS/zooming.min.js"></script>

<!--- ------------------------------------------------------------------------------------------------- --->
<!---											HEAD	                                              	--->
<!--- ------------------------------------------------------------------------------------------------- --->
	
<?php session_start(); ?>
<?php include('head.php')?>

<!--- ------------------------------------------------------------------------------------------------- --->
<!---											HEADER                                              	--->
<!--- ------------------------------------------------------------------------------------------------- --->


<?php include('header.php');
 include('bddData.php');
 require("bdd.php");?>

<!--- ------------------------------------------------------------------------------------------------- --->
<!---											BODY                                            	  	--->
<!--- ------------------------------------------------------------------------------------------------- --->

    <div class="flexitude">
        <?php include('nav.php')?>
        <div>
            <h2 class="Fond_Nwar_Transparent"> Connexion  </h2>
            <div class="flexitude Fond_Nwar_Transparent">
                <form>
                    <table border="0">
                        <tbody>
                            <tr>
                                <td> Login</td>
                                <td> <input type= "text" name= "Login"> </td>
                            </tr>
                            <tr>
                                <td> Mot de Passe </td>
                                <td> <input type= "password" name= "MotDePasse"> </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" name="Connexion" style= "width:150px; height:50px">Connexion</button>
                    <button type="submit" name="Deconnexion" style= "width:150px; height:50px">Deconnexion</button>
                </form>               
                <?php

                $link = Connexion($user,$pass,$db);
                if(isset( $_GET['Connexion']))
                {
                    $login = $_GET['Login'];
                    $motDePasse = $_GET['MotDePasse'];
                    $boolLog = 0;

                    $resultSelected = mysqli_query($link, "SELECT `Nom_Client`,`Login`,`MdP` FROM `Client`" );

                    while ( $uneLigne = mysqli_fetch_row( $resultSelected ) )
                    {
                        if($login === $uneLigne[1] && $motDePasse === $uneLigne[2])
                        {
                            $_SESSION["boolLog"] = 1;
                            $boolLog = $_SESSION["boolLog"];
                        }
                    }
                    if ($boolLog == 1)
                    {
                        $resultSelected = mysqli_query($link, "SELECT `Nom_Client` FROM `Client` WHERE `Login` = '{$login}' AND `MdP` = '{$motDePasse}'" );
                        $uneLigne = mysqli_fetch_row( $resultSelected);
                        echo " $uneLigne[0] est Connecté";
                    }
                }
                ?>
                <?php
                    if(isset( $_GET['Deconnexion']))
                    {
                        $boolLog = $_SESSION["boolLog"];
                        if ($boolLog == 1)
                        {
                            $boolLog = 0;
                            $_SESSION["boolLog"] = 0;
                            echo 'Déconnecté';
                        }
                        
                    }
                ?>
            </div>
        </div>
    </div>
	
<!--- ------------------------------------------------------------------------------------------------- --->
<!---											FOOTER                                            	  	--->
<!--- ------------------------------------------------------------------------------------------------- --->
    
    <?php include('footer.php')?>

<!--- ------------------------------------------------------------------------------------------------- --->
<!---											FIN        	                                    	  	--->
<!--- ------------------------------------------------------------------------------------------------- --->

<script>
    new Zooming().listen('img')
</script>

</html>