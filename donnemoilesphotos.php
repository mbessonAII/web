<?php include("connexionbdd.php");?>


<?php
  $select = $_POST['yearinput'];
  if(is_numeric($select) && $select>0)//verif si c'est un nombre et si il est strictement positif
  $reponse = $bddGalerie -> query('SELECT * FROM galerie01 WHERE YEAR(debut) ='.$select);
?>


<!-- Affichage images -->
<?php
  /*echo'<div class="container">
        <div class="row">
		      <div class="list-group gallery">';*/

  $unseulpassage = true;
  while ($donnees = $reponse->fetch())
  {
    if($unseulpassage == true)
    {
      $unseulpassage = false;
    }
    //<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
    echo'
    <article>
      <figure>
      <a class="fancybox fancybox.iframe" href="images/galerie/'.$donnees['id_im'].'jpeg"><img class="videoThumb" src="images/galerie/'.$donnees['id_im'].'_min.jpeg">
      </figure>
      <h2 class="videoTitle">'.$donnees['legende'].'</h2>
    </article>';
    //</div> <!-- col-6 / end -->
  }

  if(($donnees == false) && ($unseulpassage == true))//si on enleve $unseulpassage, on passe tout le temps ici
  {
    echo 'Pas d\'images';
  }
  $reponse->closeCursor();//termine le traitement de la requête*/

  /*echo'</div> <!-- list-group / end -->
      </div> <!-- row / end -->
    </div> <!-- container / end -->'*/
?>
