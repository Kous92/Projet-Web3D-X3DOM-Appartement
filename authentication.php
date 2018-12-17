<?php

    function initialisationMySQL()
    {
        // Connexion à la base de données (méthode 1 avec PDO)
        try
        {
            // Ouverture de la base de données "efrei_bank"
            $bdd = new PDO('mysql:host=localhost; dbname=web3d; charset=utf8', 'root', 'root');
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            return $bdd;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function connexionUtilisateur($email, $password)
    {
        $mysql = initialisationMySQL();
        /* Authentification avec une requête SQL préparée avec le code secret saisi (comparaison avec les hachages)
		   Requête SQL: SELECT * FROM users WHERE email =  '$email' */
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($email));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
            return false;
        }
        else
        {
            // Si l'email existe, on va vérifier le mot de passe
            if ($requete_preparee->rowCount() > 0)
            {
                // Récupération du résultat
                $ligne = $requete_preparee->fetch();

                // Mot de passe correct
                if ($password == $ligne['password'])
                {
                    return true;
                }
                else
                {
                    // Mot de passe incorrect
                    return false;
                }
            }
        }
    }

    // $username = "kous92@gmail.com";
    // $password = "PSGefrei2018";

    if (isset($_POST['email_ajax']) && isset($_POST['password_ajax']))
    {
        $_POST['password_ajax'] = htmlspecialchars(password_hash($_POST['password_ajax'], PASSWORD_BCRYPT));
        $password = $_POST['password_ajax'];
        $email = htmlspecialchars($_POST['email_ajax']);

        if (connexionUtilisateur($email, $password))
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }

        /*
        if ((($_POST['email_ajax']) == $username) && (($_POST['password_ajax']) == $password))
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
        */
    }
    else
    {
        echo "Failed";
    }
?>