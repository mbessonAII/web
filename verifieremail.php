<?php include("connexionbdd.php");?>
<?php

$mail = $_POST ['email'];

/*try {
  $bddMembres2 = new PDO('mysql:host=localhost;dbname=membres', 'root', '');
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}*/

/* On s'assure que l'utilisateur n'est pas enregistré */
$dejainscrit = FALSE;

$reponse = $bddGalerie -> query('SELECT COUNT(*) AS nb_users FROM membres01 WHERE mail=\''.$mail.'\'');

while ($donnees = $reponse->fetch(PDO::FETCH_OBJ))
{
  if($donnees->nb_users>0)
  {
      $dejainscrit = TRUE;
  }
}

$reponse->closeCursor();
echo !$dejainscrit;
//echo '<input id ="validEmail" name ="validEmail" value="'.!$dejainscrit.'">';


?>
