<?php
//CONNEXION
var_dump($_GET);
try{
    $bdd = new PDO('mysql:host=localhost;dbname=vapfactory;charset=utf8', 'root','');
    echo "success";

 } catch(Exception $e) {

    die('Erreur : ' .$e->getmessage());

    
 }

 

 
//SUPPRIMER UN PRODUIT

$bdd->query('DELETE FROM produits WHERE id = '.$_GET['id']);
header('Location: formulaire.php');



?>