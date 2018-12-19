<?php
/**
 * Created by PhpStorm.
 * User: Kous92
 * Date: 2018-12-17
 * Time: 17:25
 */
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

    function inscriptionUtilisateur($email, $password)
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
            // Si l'email existe, l'inscription ne peut pas se faire
            if ($requete_preparee->rowCount() > 0)
            {
                // Mot de passe incorrect
                return false;
            }
            else
            {
                // echo "Requête SQL en cours...\n";

                // Création du compte
                // INSERT INTO users(id, email, password, nom, prenom, visited) VALUES (NULL, 'kous92@gmail.com', 'PSGefrei2018', '', '', 0)
                $requeteSQL2 = "INSERT INTO users(id, email, password, nom, prenom, visited) VALUES (:id, :email, :password, :nom, :prenom, 0)";

                // Requête d'ajout préparée pour plus de sécurité dans la base de données MySQL
                $requete_preparee2 = $mysql->prepare($requeteSQL2);
                $requete_preparee2->bindValue(':id', NULL); // ID: clé primaire de la table MySQL.
                $requete_preparee2->bindValue(':email', $email);
                $requete_preparee2->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
                $requete_preparee2->bindValue(':nom', '');
                $requete_preparee2->bindValue(':prenom', '');
                // $requete_preparee2->bindValue(':visited', 0);
                $resultat2 = $requete_preparee2->execute();

                // Pas de résultat: requête invalide
                if (!$resultat2)
                {
                    // print_r($resultat2);
                    die("<p>Erreur: Échec de la requête avec " .$requeteSQL2. "</p>");
                    return false;
                }
                else
                {
                    return true;
                }
            }
        }
    }

    // $username = "kous92@gmail.com";
    // $password = "PSGefrei2018";
    // print_r($_POST);

    if (isset($_POST['email_ajax']) && isset($_POST['password_ajax']) && isset($_POST['password_confirm_ajax']))
    {
        // $_POST['password_ajax'] = htmlspecialchars(password_hash($_POST['password_ajax'], PASSWORD_BCRYPT));
        $_POST['password_ajax'] = htmlspecialchars($_POST['password_ajax']);
        $password = $_POST['password_ajax'];
        // $password = $_POST['password_ajax'];
        $email = htmlspecialchars($_POST['email_ajax']);

        // echo "Email: \"" . $_POST['email_ajax'] . "\"\n";
        // echo "Mot de passe \"" . $_POST['password_ajax'] . "\"\n";

        // print_r($_POST);

        if (verifierUtilisateurExistant($email))
        {
            echo "UserExists";
        }
        else
        {
            // echo "Vérification...\n";

            if (inscriptionUtilisateur($email, $password))
            {
                echo "Success";
            }
            else
            {
                echo "Failed";
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