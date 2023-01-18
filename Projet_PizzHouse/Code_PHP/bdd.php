<?php
    function Connexion($user,$pass,$db) {
        $linkSQL = mysqli_connect( "localhost", $user, $pass ); 
        if ( ! $linkSQL ) {
            die( "Impossible de se connecter à MySQL" ); 
            return FALSE;
        }
        $linkBDD = mysqli_select_db($linkSQL, $db );
        if ( ! $linkBDD ) {
            die ( "Impossible d'ouvrir $db: ".mysql_error());
            return FALSE;
        }
        return $linkSQL;
    }

    function Deconnexion($link) {
        $closeSQL = mysqli_close($link);
        if ( ! $closeSQL ) {
            die( "Impossible de fermer MySQL" ); 
        }
    }
?>