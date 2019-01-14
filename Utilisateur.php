<?php


class Utilisateur
{
    private $nom;
    private $prenom;
    private $mysql;
    private $id;
    private $email;
    private $password;

    public function __construct()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->mysql = $this->initialisationMySQL();
        $this->id = null;
        $this->email = null;
        $this->password = null;
    }

    public function constructor($email)
    {
        $instance = new self();

        $instance->mysql = $this->initialisationMySQL();
        $instance->email = $email;
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

    public function getAccountData()
    {
        echo "Récupération des données du compte, email: $this->email\n";

        /* Authentification avec une requête SQL préparée avec le code secret saisi (comparaison avec les hachages)
		   Requête SQL: SELECT * FROM users WHERE email =  '$email' */
        $requeteSQL = "SELECT * FROM users WHERE email = ?";
        $requete_preparee = $this->mysql->prepare($requeteSQL);
        $resultat = $requete_preparee->execute(array($this->email));

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
                $this->email = $ligne['email'];

                $informations[] = array("nom" => $this->nom,
                    "prenom" => $this->prenom,
                    "email" => $this->email,
                    "token" => $_SESSION['token']);

                return $informations;
            }
            else
            {
                echo "RAS !";
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
        echo "L'objet contient l'email: " . $this->email . "\n";
    }
}

session_start();

echo "On va vérifier\n";
print_r($_POST);
print_r($_SESSION);

if (isset($_POST['ajax_account']))
{
    if ($_POST['ajax_account'] == true)
    {
        echo "Test\n";
        $utilisateur = new Utilisateur();
        $utilisateur->constructor($_SESSION['user_id']);
        // $utilisateur->setEmail($_SESSION['user_id']);
        $donnees = $utilisateur->getAccountData();

        if ($donnees != null)
        {
            print_r($donnees);
            echo json_encode($donnees);
        }
        else
        {
            echo "RIEN À DÉCLARER !!!";
        }
    }


    /*
    if (isset($_SESSION['token']) == $_POST['token'])
    {
        $utilisateur = new Utilisateur();
        $donnees = $utilisateur->getAccountData();

        echo json_encode($donnees);
    }
    */
}

if (isset($_POST['ajax_account']) && isset($_POST['ajax_update']))
{
    if (($_POST['ajax_account'] == false) && ($_POST['ajax_update'] == true))
    {
        echo "Test\n";
        $utilisateur = new Utilisateur();
        $utilisateur->constructor($_POST['email']);
        // $utilisateur->setEmail($_SESSION['user_id']);
        $donnees = $utilisateur->getAccountData();

        if ($donnees != null)
        {
            print_r($donnees);
            echo json_encode($donnees);
        }
        else
        {
            echo "RIEN À DÉCLARER !!!";
        }
    }
}