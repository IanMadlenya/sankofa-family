<?php
    session_start();
    require_once('DBConnect.php');

    if(isset($_SESSION['esuserid'])) {
        $changeoldpw = hash('sha256',$_REQUEST['changeoldpw']);
        $changenewpw = hash('sha256',$_REQUEST['changenewpw']);
        //$changecnewpw = hash('sha256',$_REQUEST['changecnewpw']);

        $query = "select * from cs_users where Id=" . $_SESSION['esuserid'] . " and Password='" . $changeoldpw . "';";
        $result = $mysqli->query($query);
        if(($result) && ($result->num_rows !== 0)) {
            $query = "UPDATE cs_users SET Password='" . $changenewpw . "' WHERE Id=" . $_SESSION['esuserid'];
            $mysqli->query($query);
            header( 'Location: /estore?successchangepw' );
        } else {
            header( 'Location: /estore?failchangepw' );
        }
    } else {
        header( 'Location: /estore' );
    }

?>