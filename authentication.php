<?php

    $username = "kous92@gmail.com";
    $password = "PSGefrei2018";

    if (isset($_POST['email_ajax']) && isset($_POST['password_ajax']))
    {
        if ((($_POST['email_ajax']) == $username) && (($_POST['password_ajax']) == $password))
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
    }
    else
    {
        echo "Failed";
    }
?>