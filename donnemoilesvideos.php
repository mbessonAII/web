<?php include("connexionbdd.php");?>


<?php
  $select = $_POST['yearinput'];
  if(is_numeric($select) && $select>0)//verif si c'est un nombre et si il est strictement positif
  $reponse = $bddGalerie -> query('SELECT * FROM videos01 WHERE year ='.$select);
?>

<?php

  $unseulpassage = true;
  while ($donnees = $reponse->fetch())
  {
    if($unseulpassage == true)
    {
      $unseulpassage = false;
    }

//<img class="videoThumb" src="images/galerie/'.$donnees['min'].'.jpeg">
    echo '
    <article class="video">
      <figure>
      <a class="fancybox fancybox.iframe" href="'.$donnees['lien'].'"><img class="videoThumb" src="images/videos/'.$donnees['min'].'_min.jpg">
      </figure>
      <h2 class="videoTitle">'.$donnees['titre'].'</h2>
    </article>';

  }

  if(($donnees == false) && ($unseulpassage == true))//si on enleve $unseulpassage, on passe tout le temps ici
  {
    echo 'Pas de vidéos';
  }
  $reponse->closeCursor();//termine le traitement de la requête*/

?>
