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

    <?php include('header.php')?>

<!--- ------------------------------------------------------------------------------------------------- --->
<!---											BODY                                            	  	--->
<!--- ------------------------------------------------------------------------------------------------- --->

<h2 class="Fond_Nwar_Transparent"> Demande de contact</h2>
<div class="flexitude">
    <?php include('nav.php')?>
    <div class="leftMargin Fond_Nwar_Transparent">
        <form>
            <table border="0">
                <tbody>
                    <tr>
                        <td> Date de contact</td>
                        <td> <input type="date" id="start" name="dateFormulaire" min="2022-01-25" required> </td>
                    </tr>
                    <tr>
                        <td> Nom </td>
                        <td> <input id="contenuContact" type= "text" name= "Nom" required> </td>
                    </tr>
                    <tr>
                        <td> Prenom </td>
                        <td> <input id="contenuContact" type= "text" name= "Prenom" required> </td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td> 
                            <input id="contenuContact" type= "text" name= "Mail" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Genre </td>
                        <td> 
                            <p> <input type="radio" name="Groupe1" required>
                                <label for="case1">Homme</label>
                                <input type="radio" name="Groupe1" required>
                                <label for="case2">Femme</label> 
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td> Date de naissance </td>
                        <td> <input type="date" name="DateNaissance" max="2022-04-12" required></td>
                    </tr>
                    <tr>
                        <td> Fonction </td>
                        <td> 
                            <select name ="Fonction" required>
                                <option valeur=""></option>
                                <option valeur="Ad">Administration</option>
                                <option valeur="En">Enseignant</option>
                                <option valeur="Et">Etudiant</option>
                                <option valeur="Pe">Personnel</option>
                                <option valeur="other">Autre</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Sujet </td>
                        <td> <input id="contenuContact" type= "text" name= "Sujet" required> </td>
                    </tr>
                    <tr>
                        <td> Contenu du message</td>
                        <td> 
                            <textarea id="contenuContact" class="TextArea" name="Message" rows="5" cols="33" required></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        <button type="submit" name="submit" style= "width:150px; height:50px" class="PosEnvoyerContact">Envoyer</button>
        </form>

        <?php
            if (isset( $_GET['submit']))
            {
                //////////////////////////////////
                //  Récupération des valeurs    //
                //////////////////////////////////

                $dateFormulaire = $_GET['dateFormulaire'];
                $nom = $_GET['Nom'];
                $prenom = $_GET['Prenom'];
                $mail = $_GET['Mail'];
                if ($_GET['Groupe1'] == "case 1")
                {
                    $genre = "Homme";
                }
                else
                {
                    $genre = "Femme";
                }
                $dateNaissance = $_GET['DateNaissance'];
                $fonction = $_GET['Fonction'];
                $sujet = $_GET['Sujet'];
                $contenuMessage = $_GET['Message'];

                //////////////////////////////////
                //  Vérification des valeurs    //
                //////////////////////////////////


                if (preg_match('/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/', $dateFormulaire )) {

                    if (preg_match('/^[a-zA-Z]{1,}$/', $nom )) {

                        if (preg_match('/^[a-zA-Z]{1,}$/', $prenom )) {

                            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                                if (preg_match('/^[a-zA-Z]{1,}$/', $genre )) {

                                    if (preg_match('/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/', $dateNaissance )) {

                                        if (preg_match('/^[a-zA-Z]{1,}$/', $fonction )) {

                                            echo'formulaire valide';
                                            echo '<br />';
                                            
                                            //////////////////////
                                            //  Envoie du mail  //
                                            //////////////////////

                                            $destinataire      = 'briolduhal@cy-tech.fr';
                                            $sujetMail = $sujet;
                                            $messageMail = $contenuMessage;
                                            $enTete = array(
                                                'DateDeContact' => $dateFormulaire,
                                                'Nom' => $nom,
                                                'Prenom' => $prenom,
                                                'EmailExpediteur' => $mail,
                                                'Genre' => $genre,
                                                'DateDeNaissance' => $dateNaissance,
                                                'Fonction' => $fonction
                                            );
                                            mail($destinataire, $sujetMail, $messageMail, $headers);

                                            if (mail($destinataire, $sujetMail, $messageMail, $headers))
                                            {
                                                echo'mail envoyé';
                                            }
                                            else
                                            {
                                                echo'mail : erreur envoi';
                                            }
                                        }
                                        else
                                        {
                                            echo "Le string fonction est considéré comme invalide .\n";
                                            echo '<br />';
                                        }
                                    }
                                    else
                                    {
                                        echo "Le string dateNaissance est considéré comme invalide .\n";
                                        echo '<br />';
                                    }
                                }
                                else
                                {
                                    echo "Le string genre est considéré comme invalide .\n";
                                    echo '<br />';
                                }
                            } else {
                                echo "L'adresse email '$mail' est considérée comme invalide.";
                                echo '<br />';
                            }
                        }
                        else
                        {
                            echo "Le string prenom est considéré comme invalide .\n";
                            echo '<br />';
                        }
                    }
                    else
                    {
                        echo "Le string nom est considéré comme invalide .\n";
                        //$_SESSION["nom"] = $nom;
                        echo '<br />';
                    }
                }
                else
                {
                    echo "Le string dateFormulaire est considéré comme invalide .\n";
                    echo '<br />';
                }
            }
        ?>
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