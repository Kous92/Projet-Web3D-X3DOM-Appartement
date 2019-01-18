<?php


class Utilisateur
{
    private $nom;
    private $prenom;
    private $mysql;
    private $id;
    private $email;
    private $password;
    private $nom_utilisateur;

    public function __construct()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->mysql = $this->initialisationMySQL();
        $this->id = null;
        $this->email = null;
        $this->password = null;
        $this->nom_utilisateur = null;
        $this->token = null;
    }

    public function constructor($email)
    {
        $instance = new self();

        $instance->mysql = $this->initialisationMySQL();
        $instance->nom_utilisateur = $email;
        $instance->getIdentite();

        return $instance;
    }

    private function initialisationMySQL()
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

    private function getIdentite()
    {
        // echo "Récupération des données du compte, email: $this->email\n";
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->nom_utilisateur));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
        }
        else
        {
            // L'email existe, on récupère les données
            if ($requete_preparee->rowCount() > 0)
            {
                $ligne = $requete_preparee->fetch();
                $this->nom = $ligne['nom'];
                $this->prenom = $ligne['prenom'];

                return $ligne;
            }
        }
    }

    public function miseAJourNomUtilisateur()
    {
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->nom_utilisateur));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
        }
        else
        {
            // L'email existe, on récupère les données
            if ($requete_preparee->rowCount() > 0)
            {
                $ligne = $requete_preparee->fetch();

                // On vérifie que le contenu est différent
                if (($ligne['nom']) == ($this->nom))
                {
                    // echo "Les noms sont les mêmes\n";
                    return false;
                }
                else
                {
                    // echo "Les noms sont différents\n";
                    $SQLCommand = "UPDATE users SET nom = ? WHERE email = ?";
                    $requete = $this->mysql->prepare($SQLCommand);
                    $resultat2 = $requete->execute(array($this->nom, $this->nom_utilisateur));

                    if (!$resultat2)
                    {
                        // die("<p>Erreur: Échec de la requête avec " .$SQLCommand. "</p>");
                        return false;
                    }
                    else
                    {
                        if (!isset($_SESSION))
                        {
                            session_start();
                            $_SESSION['nom'] = $this->nom;
                        }
                        else
                        {
                            $_SESSION['nom'] = $this->nom;
                        }

                        return true;
                    }
                }
            }
            else
            {
                return false;
            }
        }
    }

    public function miseAJourPrenomUtilisateur()
    {
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->nom_utilisateur));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            // die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
            return false;
        }
        else
        {
            $ligne = $requete_preparee->fetch();

            // On vérifie que le contenu est différent
            if (($ligne['prenom']) == ($this->prenom))
            {
                // echo "Les prénoms sont les mêmes\n";
                return false;
            }
            else
            {
                // echo "Les prénoms sont différents\n";
                // L'email existe, on récupère les données
                if ($requete_preparee->rowCount() > 0)
                {
                    $SQLCommand = "UPDATE users SET prenom = ? WHERE email = ?";
                    $requete = $this->mysql->prepare($SQLCommand);
                    $resultat2 = $requete->execute(array($this->prenom, $this->nom_utilisateur));

                    if (!$resultat2)
                    {
                        // die("<p>Erreur: Échec de la requête avec " .$SQLCommand. "</p>");
                        return false;
                    }
                    else
                    {
                        if (!isset($_SESSION))
                        {
                            session_start();
                            $_SESSION['prenom'] = $this->prenom;
                        }
                        else
                        {
                            $_SESSION['prenom'] = $this->prenom;
                        }

                        return true;
                    }
                }
                else
                {
                    return false;
                }
            }
        }
    }

    public function miseAJourEmailUtilisateur()
    {
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->email));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            // die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
            return false;
        }
        else
        {
            $ligne = $requete_preparee->fetch();

            // On vérifie que le contenu est différent
            if (($ligne['email']) == ($this->email))
            {
                // echo "Les adresses email sont les mêmes\n";
                return false;
            }
            else
            {
                // echo "Les adresses email sont différentes\n";
                $SQLCommand = "UPDATE users SET email = ? WHERE email = ?";
                $requete = $this->mysql->prepare($SQLCommand);
                $resultat2 = $requete->execute(array($this->email, $this->nom_utilisateur));

                if (!$resultat2)
                {
                    // die("<p>Erreur: Échec de la requête avec " .$SQLCommand. "</p>");
                    return false;
                }
                else
                {
                    if (!isset($_SESSION))
                    {
                        session_start();
                        $_SESSION['user_id'] = $this->email;
                    }
                    else
                    {
                        $_SESSION['user_id'] = $this->email;
                    }

                    return true;
                }
            }

        }
    }

    public function getAccountData()
    {
        // echo "Récupération des données du compte, email: $this->email\n";

        /* Authentification avec une requête SQL préparée avec le code secret saisi (comparaison avec les hachages)
		   Requête SQL: SELECT * FROM users WHERE email =  '$email' */
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->email));

        // Pas de résultat: requête invalide
        if (!$resultat)
        {
            // die("<p>Erreur: Échec de la requête avec " .$requeteSQL. "</p>");
            return null;
        }
        else
        {
            // L'email existe, on récupère les données
            if ($requete_preparee->rowCount() > 0)
            {
                $ligne = $requete_preparee->fetch();
                $this->nom = $ligne['nom'];
                $this->prenom = $ligne['prenom'];
                $this->email = $ligne['email'];

                $informations[] = array("nom" => $this->nom,
                    "prenom" => $this->prenom,
                    "email" => $this->email,
                    "token" => $_SESSION['token']);

                return $informations;
            }
            else
            {
                return null;
            }
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}

session_start();

/*
echo "On va vérifier\n";
print_r($_POST);
print_r($_SESSION);
*/

if (isset($_POST['ajax_account']) && isset($_POST['ajax_update']))
{
    // echo "MAJ ?\n";

    if ($_POST['ajax_update'] == true)
    {
        // Authentification de la transaction
        if (isset($_POST['token']) && ($_POST['token'] == $_SESSION['token']))
        {
            $nom = null;
            $prenom = null;
            $email = null;

            // echo "Test de mise à jour\n";

            if (isset($_POST['user_id']) || (isset($_SESSION['user_id'])))
            {
                if (isset($_POST['user_id']))
                {
                    $utilisateur = new Utilisateur();
                    $utilisateur = $utilisateur->constructor($_POST['user_id']);
                }
                else
                {
                    $utilisateur = new Utilisateur();
                    $utilisateur = $utilisateur->constructor($_SESSION['user_id']);
                }


                if (isset($_POST['nom']))
                {
                    $nom = htmlspecialchars($_POST['nom']);
                    // echo "Nom défini sur: " . $nom . "\n";
                    $utilisateur->setNom(htmlspecialchars($_POST['nom']));
                }

                if (isset($_POST['prenom']))
                {
                    $prenom = htmlspecialchars($_POST['prenom']);
                    // echo "Prénom défini sur: " . $prenom . "\n";
                    $utilisateur->setPrenom(htmlspecialchars($_POST['prenom']));
                }

                if (isset($_POST['email']))
                {
                    $email = htmlspecialchars($_POST['email']);
                    // echo "Email défini sur: " . $email . "\n";
                    $utilisateur->setEmail(htmlspecialchars($_POST['email']));
                }

                $email_modifie = 0;
                $prenom_modifie = 0;
                $nom_modifie = 0;

                // echo "email: " . $email_modifie . "\nnom: " . $nom_modifie . "\nprenom:" . $prenom_modifie . "\n";

                if (strlen($email) > 0)
                {
                    // echo "MAJ1\n";

                    if ($utilisateur->miseAJourEmailUtilisateur())
                    {
                        $email_modifie = 1;
                    }
                    else
                    {
                        $email_modifie = 0;
                    }
                }

                if (strlen($prenom) > 0)
                {
                    // echo "MAJ2\n";

                    if ($utilisateur->miseAJourPrenomUtilisateur())
                    {
                        $prenom_modifie = 1;
                    }
                    else
                    {
                        $prenom_modifie = 0;
                    }
                }

                if (strlen($nom) > 0)
                {
                    // echo "MAJ3\n\n";

                    if ($utilisateur->miseAJourNomUtilisateur())
                    {
                        $nom_modifie = 1;
                    }
                    else
                    {
                        $nom_modifie = 0;
                    }
                }

                // echo "email: " . $email_modifie . "\nnom: " . $nom_modifie . "\nprenom:" . $prenom_modifie . "\n";

                if (($email_modifie == 1) && ($nom_modifie == 1) && ($prenom_modifie == 1))
                {
                    echo "UpdatedAll";
                }
                else if (($email_modifie == 1) && ($nom_modifie == 1))
                {
                    echo "UpdatedNomEmail";
                }
                else if (($email_modifie == 1) && ($prenom_modifie == 1))
                {
                    echo "UpdatedPrenomEmail";
                }
                else if (($prenom_modifie == 1) && ($nom_modifie == 1))
                {
                    echo "UpdatedNomPrenom";
                }
                else if ($email_modifie == 1)
                {
                    echo "UpdatedEmail";
                }
                else if ($nom_modifie == 1)
                {
                    echo "UpdatedNom";
                }
                else if ($prenom_modifie == 1)
                {
                    echo "UpdatedPrenom";
                }
                else
                {
                    echo "NoUpdate";
                }
            }
            else
            {
                echo "Erreur MAJ\n";
            }
        }
        else
        {
            echo "TokenError\n";
        }
    }
}
else if (isset($_POST['ajax_account']))
{
    if ($_POST['ajax_account'] == true)
    {
        // echo "Test\n";
        $utilisateur = new Utilisateur();

        if (isset($_POST['user_id']))
        {
            $utilisateur = $utilisateur->constructor($_POST['user_id']);
        }

        if (isset($_SESSION))
        {
            if (isset($_SESSION['user_id']))
            {
                $utilisateur->setEmail($_SESSION['user_id']);
            }

            if (isset($_SESSION['nom']))
            {
                $utilisateur->setNom($_SESSION['nom']);
            }

            if (isset($_SESSION['prenom']))
            {
                $utilisateur->setPrenom($_SESSION['prenom']);
            }

            if (isset($_SESSION['token']))
            {
                $utilisateur->setToken($_SESSION['token']);
            }
        }


        // $utilisateur->setEmail($_SESSION['user_id']);
        $donnees = $utilisateur->getAccountData();

        if ($donnees != null)
        {
            // print_r($donnees);
            echo json_encode($donnees);
        }
        else
        {
            echo "RIEN À DÉCLARER !!!";
        }
    }
}