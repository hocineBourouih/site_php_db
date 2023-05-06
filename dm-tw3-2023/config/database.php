<?php

$dbhost = 'votre_serveur';
$dbname = 'nom_de_votre_base';
$dbuser = 'nom_utilisateur';
$dbpassword = 'mdp';

try
{
    // Créer une connexion PDO
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>
