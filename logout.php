<?php

    session_start();

    if (isset($_SESSION['user_id']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['token']);
        unset($_SESSION['user_id']);

        if (session_destroy())
        {
            header("Location: index.php");
            exit();
        }
    }
    else
    {
        header("Location: index.php");
        exit();
    }
?>