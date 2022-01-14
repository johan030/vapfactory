<?php
 // HOTE : Localhost
 // NOM DE LA BASE :    vapfactory
 // LOGIN : root
 // MDP : ''

//CONNEXION
try{
    $bdd = new PDO('mysql:host=localhost;dbname=vapfactory;charset=utf8', 'root','');
    echo "success";

 } catch(Exception $e) {

    die('Erreur : ' .$e->getmessage());
 }


 //AJOUTER UN NOUVAU PRODUIT

if(isset($_POST['name']) && isset($_POST['reference']) && isset($_POST['descriptions']) && isset($_POST['buyingPrice']) && isset($_POST['sellingPrice']) && isset($_POST['quantite'])){

    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $descriptions = $_POST['descriptions'];
    $buyingPrice = $_POST['buyingPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $quantite = $_POST['quantite'];
 
    $requete = $bdd->prepare('INSERT INTO produits (reference, nom, descriptions, buyingPrice, sellingPrice, quantite) VALUES (?,?,?,?,?,?)')
     or die(print_r($bdd->errorInfo())); // affiche une erreur s'il y a une erreur dans le tableau
    $requete->execute(array($reference, $name, $descriptions, $buyingPrice, $sellingPrice, $quantite));

    
    header('Location: formulaire.php');
 
}


?>










