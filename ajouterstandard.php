<?php include("connexionbdd.php");?>
<?php
  if(isset($_POST['titre']))
  {
    /* On s'assure que le titre n'est pas enregistré */
    $dejainscrit = FALSE;
    $titre = $_POST['titre'];
    $reponse = $bddGalerie -> query('SELECT COUNT(*) AS nb_titres FROM jamsession WHERE titre=\''.$titre.'\'');

    while ($donnees = $reponse->fetch(PDO::FETCH_OBJ))
    {
      if($donnees->nb_titres>0)
      {
          $dejainscrit = TRUE;
      }
    }
    $reponse->closeCursor();

    if(!$dejainscrit)
    {

      $chant = $_POST['chant'];
      $piano = $_POST['piano'];
      $guitare = $_POST['guitare'];
      $cuivre = $_POST['cuivre'];
      $contrebasse = $_POST['contrebasse'];
      $batterie = $_POST['batterie'];
      $datetitre = "000/00/00";


      $req = $bddGalerie->prepare('INSERT INTO `jamsession`(`titre`, `chant`, `piano`, `guitare`, `cuivre`, `contrebasse`, `batterie`, `date`) VALUES (:titre, :chant, :piano, :guitare, :cuivre, :contrebasse, :batterie, :datetitre)');
        $req->execute(array(
          "titre" => $titre,
          "chant" => $chant,
          "piano" => $piano,
          "guitare" => $guitare,
          "cuivre" => $cuivre,
          "contrebasse" => $contrebasse,
          "batterie" => $batterie,
          "datetitre" => $date
          ));

      $unseulpassage = true;

      while ($donnees = $reponse->fetch())
      {
        if($unseulpassage == true)
        {
          $unseulpassage = false;
        }
      }
    }


  }//fin isset (post[titre])


?>
