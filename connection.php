<?php
  if(isset($_POST['email'],$_POST['password']))
  {
    if(!empty($_POST['email']))
    {
      $email = $_POST ['email'];
      $password = $_POST ['password'];
      echo $email;
      echo '<br/>'.$password;

      /* relation BDD */
      /*try {
        $bddMembres = new PDO('mysql:host=localhost;dbname=bdd', 'root', '');
      }
      catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }*/
      include("connexionbdd.php");


      /* Requete : on s'assure que l'utilisateur est enregistré */
      $inscrit = FALSE;
      $correctpassword = FALSE;

      //donnees utilisateur
      $intrument = 0;

      $reponse = $bddGalerie -> query('SELECT * FROM membres01 WHERE mail=\''.$email.'\'');
      while ($donnees = $reponse->fetch())
      {
        if(sha1($password) == $donnees['mdp'])
        {
            //echo 'MDP OK';
            $instrument = $donnees['instru'];
            //echo 'instru : '.$instrument;
            $correctpassword = TRUE;
        }
        $inscrit = TRUE;
      }
      $reponse->closeCursor();

      if($inscrit && $correctpassword)
      {
        echo 'connection ok';

        /*UNE FOIS QU'ON S'EST CONNECTE*/
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['connected'] = true;

        $_SESSION['instrument'] = $instrument;
        /*
          ENSUITE ON POURRA : stocker des vars session
          if(isset($_SESSION['prenomutilisateur']))
          {
            echo $_SESSION[]
            afficher menu jam
          }
        */
        // similar behavior as clicking on a link
        header('Location: index.php');
      }
      else {
        echo '<br>Login ou mot de passe invalide';
        header('Location: formconnect.php');
      }
    }
    else{
      echo 'veuillez entrer un email';/* NORMALEMENT ON Y PASSE JAMAIS LA VERIF EST DEJA FAITE */
    }
  }
  else /* si on a un pb de connexion*/
  {
    echo 'vous devez essayer de nouveau <br><a href="test.php"> ici </a>';
    //header('Location: test.php');
  }
?>
