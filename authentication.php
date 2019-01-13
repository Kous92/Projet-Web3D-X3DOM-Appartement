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

    function verifierUtilisateurExistant($email)
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
            // L'email existe
            if ($requete_preparee->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
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
            // echo "Erreur SQL";
            return false;
        }
        else
        {
            // Si l'email existe, on va vérifier le mot de passe
            if ($requete_preparee->rowCount() > 0)
            {
                // echo "Email existant...\n";

                // Récupération du résultat
                $ligne = $requete_preparee->fetch();
                // echo "Mot de passe à comparer: \"" . $ligne['password'] . "\"\n";

                // Mot de passe correct
                if (password_verify($password, $ligne['password']))
                {
                    try
                    {
                        session_start();

                        $_SESSION['user_id'] = $email;

                        // On va générer un token pour sécuriser la session, contre la faille CSRF
                        if (!isset($_SESSION['token']))
                        {
                            $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
                        }
                    }
                    catch (Exception $e)
                    {
                        die('Erreur : ' . $e->getMessage());
                    }

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
    // print_r($_POST);

    if (isset($_POST['email_ajax']) && isset($_POST['password_ajax']))
    {
        // $_POST['password_ajax'] = htmlspecialchars(password_hash($_POST['password_ajax'], PASSWORD_BCRYPT));
        $_POST['password_ajax'] = htmlspecialchars($_POST['password_ajax']);
        $password = $_POST['password_ajax'];
        $email = htmlspecialchars($_POST['email_ajax']);

        // echo "Email: \"" . $_POST['email_ajax'] . "\"\n";
        // echo "Mot de passe \"" . $_POST['password_ajax'] . "\"\n";

        // print_r($_POST);

        if (!verifierUtilisateurExistant($email))
        {
            echo "NoUserExists";
        }
        else
        {
            // echo "Vérification...\n";

            if (connexionUtilisateur($email, $password))
            {
                echo "Success";
            }
            else
            {
                echo "IncorrectPassword";
            }
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