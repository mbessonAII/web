<?php
  if(isset($_POST['email'],$_POST['password']))//RAJOUTER VERIF DE TOUS LES CHAMPS
  {
    if(!empty($_POST['email']))//RAJOUTER VERIF DE TOUS LES CHAMPS
    {
      $nom = $_POST ['nom'];
      $prenom = $_POST ['prenom'];
      $adr = $_POST ['adresse'];
      $tel = $_POST ['tel'];
      $mail = $_POST ['email'];
      $password = $_POST ['password'];
      $vpassword = $_POST ['vpassword'];
      $instru = $_POST ['instrument'];
      $lvl =   $_POST ['niveau'];
      $navette = $_POST ['navette'];
      $accomp = $_POST ['accompagne'];


      /* relation BDD */
      /*try {
        $bddMembres = new PDO('mysql:host=localhost;dbname=bdd', 'root', '');
      }
      catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }*/
      include("connexionbdd.php");

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

      if(!$dejainscrit)
      {

        $req = $bddGalerie->prepare('INSERT INTO membres01 (mail, mdp, nom, prenom, adr, tel, instru, accomp, navette, lvl, dinscri) VALUES (:mail, :mdp, :nom, :prenom, :adr, :tel, :instru, :accomp, :navette, :lvl, CURDATE())');
          $req->execute(array(
            "mail" => $mail,
            "mdp" => sha1($password),
            "nom" => $nom,
            "adr" => $adr,
            "prenom" => $prenom,
            "tel" => $tel,
            "instru" => $instru,
            "accomp" => $accomp,
            "navette" => $navette,
            "lvl" => $lvl
            ));

        echo 'inscription terminée !';
        session_start();
        //$_SESSION['instru'] = $instru;
        //$_SESSION['connected'] = true;
        //$_SESSION['email'] = $mail;
      }
      else {
        echo "adresse email déjà utilisée";
        //echo '<br>Login ou mot de passe invalide';
      }
    }
    else{
      echo 'veuillez entrer un email';/* NORMALEMENT ON Y PASSE JAMAIS LA VERIF EST DEJA FAITE */
    }
  }
  else /* si on a un pb de connexion*/
  {
    echo 'vous devez essayer de nouveau <br><a href="forminscri.php"> ici </a>';
    //header('Location: test.php');
  }
?>
