<?php include("connexionbdd.php");?>
<?php
  if(isset($_POST['id']))
  {
    /* On s'assure que le titre n'est pas enregistré */
    $dejainscrit = FALSE;
    $id = intval($_POST['id']);
    $reponse = $bddGalerie -> query('SELECT COUNT(*) AS nb_titres FROM jamsession WHERE id=\''.$id.'\'');

    while ($donnees = $reponse->fetch(PDO::FETCH_OBJ))
    {
      if($donnees->nb_titres>0)
      {
          $dejainscrit = TRUE;
      }
    }
    //$reponse->closeCursor();

    if($dejainscrit)
    {

      $strInstru = $_POST['strInstru'];
      //$vide = "";
      $email = $_POST['email'];

      //if(!empty($strInstru))
      //{
        //echo 'UPDATE `jamsession` SET `'.$strInstru.'`= `` WHERE `jamsession`.`id` = '.$id;
        $reponse = $bddGalerie -> query('UPDATE jamsession SET '.$strInstru.'=\''.$email.'\' WHERE id =\''.$id.'\'');
        /*$stmt = $bddGalerie->prepare("UPDATE jamsession
                                      SET ?=?
                                      WHERE id=?");*/
        //$stmt->bindParam(':einstru', "", PDO::PARAM_STR);
        //$stmt->bindParam(':eid', "Mr Sandman", PDO::PARAM_STR);
        //$stmt->execute(array($strInstru, $email, $id));
      //}
      //UPDATE `jamsession` SET `cuivre` = '', `contrebasse` = 'exampe@domain.com' WHERE `jamsession`.`id` = 2;
      echo 'participation ok';
    }


  }//fin isset (post[titre])


?>
