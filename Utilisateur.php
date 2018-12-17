<?php
/**
 * Created by PhpStorm.
 * User: Kous92
 * Date: 2018-12-17
 * Time: 15:02
 */

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
        $this->mysql = null;
        $this->id = null;
        $this->email = null;
        $this->password = null;
    }

    public function constructor($email, $password)
    {
        $instance = new self();

        $instance->mysql = $this->initialisationMySQL();
        $instance->email = $email;
        $instance->password = $password;
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

    public function authentification()
    {
        $requeteSQL = "SELECT * FROM ";
    }
}