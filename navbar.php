<div class="container">
  <div class="row">
    <div class="col-12">
      <nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Master Classe Jazz</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="presentationprofs.php">Professeurs</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Galeries
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="galeryfancybox3.php">Photos</a>
              <a class="dropdown-item" href="videofancybox.php">Vidéos</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jamsession.php">Jam sessions</a>
          </li>
        </ul>

          <?php
          if(isset($_SESSION['email']) && isset($_SESSION['connected']))
          {
            echo'<form class="form-inline my-2 my-lg-0" method="post" action="deconnexion.php"><div class="my-2 my-sm-0 mx-2 mx-sm-2">'.$_SESSION['email'].'</div><button class="btn btn-outline-danger my-2 my-sm-0 mx-2 mx-sm-2" type="submit">Déconnexion</button></form>';
          }
          else {
            echo'<form class="form-inline my-2 my-lg-0"><a href="formconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 mx-2 mx-sm-2" type="button">Connexion</button></a>
            <a href="forminscri.php"><button class="btn btn-outline-primary my-2 my-sm-0 mx-2 mx-sm-2" type="button">Inscription</button></a></div></form>';
          }?>

        </nav>
      </div>

</div>
</div>
