

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

<?php
//CONNEXION
try{
    $bdd = new PDO('mysql:host=localhost;dbname=vapfactory;charset=utf8', 'root','');
    echo "success";

 } catch(Exception $e) {

    die('Erreur : ' .$e->getmessage());
 }


//AFFICHE DES INFORMATIONS DANS UN TABLEAU
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
            <td><a href="delete.php?id='.$donnees['id'].'">effacer</a></td>
            <td><a href="#">modifier</a></td>
         </tr>';
}

$requete->closeCursor();
echo '</tr>
</table>';


$sql = 'DELETE FROM produits WHERE id = 51';
$bdd->exec($sql);
?>