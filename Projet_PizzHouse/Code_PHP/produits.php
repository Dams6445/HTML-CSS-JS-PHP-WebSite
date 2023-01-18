<?php
    session_start();
    include('head.php');
    include('header.php');
    echo '<div class="flexitude">';
    include('nav.php');
    include('bddData.php');
    require("bdd.php");

    $link = Connexion($user,$pass,$db);

    $categorie = $_GET["cat"];
    $compteur = 0;
    
    if ($categorie == "Pizza")
    {
        $resultSelected = mysqli_query($link, "SELECT `Visuel`,`Nom`,`Reference`,`Prix`,`Stock`,`Ingredients` FROM Articles WHERE `Detail_Article` = 'Pizza'" );
    }
    else if ($categorie == "Panini")
    {
        $resultSelected = mysqli_query($link, "SELECT `Visuel`,`Nom`,`Reference`,`Prix`,`Stock`,`Ingredients` FROM Articles WHERE `Detail_Article` = 'Panini'" );
    }
    else
    {
        $resultSelected = mysqli_query($link, "SELECT `Visuel`,`Nom`,`Reference`,`Prix`,`Stock`,`Ingredients` FROM Articles WHERE `Detail_Article` = 'Boisson'" );
    }

    echo '
    <div class="leftMargin Fond_Nwar_Transparent">
    <table border="1">
    <thead>
        <tr>
            <th>Visuel</th>
            <th>Produit</th> 
            <th>Référence</th>
            <th>Prix</th>';
    if ($categorie != "Boisson")
    {
        echo'<th>Ingrédients</th>';
    }
    echo'   <th class="stocks">Stocks</th>
            <th>Acheter</th>
        </tr>
    </thead>
    <tbody>';
    while ( $uneLigne = mysqli_fetch_row( $resultSelected ) )
    {
        echo '
        <tr>
            
            <td>
                <img src="'.$uneLigne[0].'"alt="'.$uneLigne[1].'" height=160 width=200>
            </td>
            <td>'.$uneLigne[1].'</td>
            <td>'.$uneLigne[2].'</td>
            <td>'.$uneLigne[3].'€</td>';
            if ($categorie != "Boisson")
            {
                echo'<td>'.$uneLigne[5].'</td>';
            }
            echo'
            <td class="stocks">'.$uneLigne[4].'</td>
            <td>
            <div class="centrerDiv">
                <span name="afficheur" id="compt'.$compteur.'">0</span> 
            </div>
            <div>
                <button style= "width:50px; height:50px" onclick="modifVal('.$compteur.','.$uneLigne[4].',0)">+</button>
                <button style= "width:50px; height:50px" onclick="modifVal('.$compteur.','.$uneLigne[4].',1)">-</button>
            </div>
            <div><button type="submit" name="Panier" style= "width:150px; height:50px">Ajouter au Panier</button></div>;';
            /*if (isset( $_GET['Panier']) && $_GET['afficheur'] != 0)
                {
                    $nbProduits = $_GET['afficheur'];
                    $stockInit = $uneLigne[4];
                    $newStock = $stockInit - $nbProduits;
                    mysqli_query($link, "INSERT INTO `Panier`(`Nom_Client`) VALUES CommandeTest" );
                    mysqli_query($link, "UPDATE `Articles` SET `Stock`='{$newStock}' WHERE `Reference`= '{$uneLigne[2]}'" );
                    mysqli_query($link, "INSERT INTO `Appartenir`(`ID_Article`, `Quantite_Articles`) VALUES (A,B,c)" );
                    $articleUpdated = mysqli_query($link, "SELECT `ID_Article` FROM `Articles` WHERE `Nom` = Calzone" );
                    $panierUpdated = mysqli_query($link, "SELECT `ID_Panier` FROM `Panier` WHERE `Nom_Client` = CommandeTest" );
                    mysqli_query($link, "INSERT INTO `Appartenir`(`ID_Article`, `Quantite_Articles`) VALUES ('{$articleUpdated}','{$panierUpdated}')" );
                }*/
            echo'
            </td>
        </tr>';
        $compteur = $compteur + 1;
    }    
    echo '</tbody>
    </table>
    </div>
    </div>
    <button style= "width:150px; height:50px" onclick="gestionStocks()">Stocks</button>
    <div class="Fond_Nwar_Transparent">';
    echo $_SESSION["nbProduits"]; 
    echo'</div>';
    include('footer.php');
    Deconnexion($link);
?>