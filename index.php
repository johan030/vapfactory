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
        
}


//AFFICHE DES INFORMATIONS DANS UN TABLAU
$requete = $bdd->query('SELECT * 
                        FROM produits
                        ');


echo'<table border>
<tr>
<th>id</th>
<th>Nom</th>
<th>reference</th>
<th>descriptions</th>
<th>prix dachat</th>
<th>prix de vente</th>
<th>quantite</th>
</tr>';

while($donnees = $requete->fetch()){  //test s'il y a une nouvelle entrée à lire: fetch = récupérer une entrée
  // affichage des données dans un tableau
   echo '<tr> 
            <td>'.$donnees['id'].'</td> 
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['reference'].'</td>
            <td>'.$donnees['descriptions'].'</td>
            <td>'.$donnees['buyingPrice'].'</td>
            <td>'.$donnees['sellingPrice'].'</td>
            <td>'.$donnees['quantite'].'</td>
            <td><a href="#">effacer</a></td>
            <td><a href="#">modifier</a></td>
         </tr>';
}

$requete->closeCursor();
echo '</tr>
</table>';




//MODIFIER UN PRODUIT

$requete = $bdd->exec('UPDATE produits SET quantite = "" WHERE id = "?"');


//SUPPRIMER UN PRODUIT

$requete = $bdd->query('DELETE FROM produits WHERE id = "?"');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <h1>FORMULAIRE</h1>
   <form method="post" action="index.php">
      <table>
  
         <td>Nom</td>
            <td><input type="text" name="name"></td>
         </tr>
         <td>reference</td>
            <td><input type="text" name="reference"></td>
         </tr>
         <td>descriptions</td>
            <td><input type="text" name="descriptions"></td>
         </tr>
         <td>buyingPrice</td>
            <td><input type="number" name="buyingPrice"></td>
         </tr>
         <td>sellingPrice</td>
            <td><input type="number" name="sellingPrice"></td>
         </tr>
         <td>quantite</td>
            <td><input type="number" name="quantite"></td>
         </tr>
      </table>
      <button type="submit" class="btn">ENVOYER</button>
   </form>
</body>
</html>