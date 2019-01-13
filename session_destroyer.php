<?php

    session_start();

    if (isset($_SESSION))
    {
        print_r($_SESSION);
        unset($_SESSION['auth']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['token']);
        unset($_SESSION['user_id']);
        session_destroy();
    }
    else
    {
        echo "Rien à déclarer";
    }
?>