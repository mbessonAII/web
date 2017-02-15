<?php
//session_start();
include("headerf.php");
?>

<!-- <html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">

    <title>Planning</title> -->

<style>
.flatIcon{
  max-width: 30px;
  width:auto;
  height: auto;
}
.flatIcon:hover{
  opacity:0.5;
}

.errorNotif{
  text-align: center;
  vertical-align: middle;
}
/*
.btn:hover{
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 10px #fff;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: box-shadow, transform;
  transition-property: box-shadow, transform;
}
*/
</style>

<?php include("connexionbdd.php");?>


  <!--
  <div class="container-full">
  <div class="planning">
    <table class="table table-bordered">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Participants</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-success">
          <th scope="row">1</th>
          <td>Mr Sandman</td>
          <td><img class="flatIcon" src="images/icons/1.svg"> <img class="flatIcon" src="images/icons/2.svg"> <img class="flatIcon" src="images/icons/3.svg"> <img class="flatIcon" src="images/icons/4.svg"> <img class="flatIcon" src="images/icons/5.svg"> <img class="flatIcon" src="images/icons/6.svg"></td>
          <td><div class="emplParticiper">
              <button class="btn btn-danger btn-sm">Annuler</button>
              </div>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Titre 2</td>
          <td></td>
          <td>
            <div class="emplParticiper">
              <button class="btn btn-success btn-sm">Participer</button>
            </div>
          </td>
        </tr>
        <tr class="newLine">
          <th scope="row">3</th>
          <td><input type="text" class="form-control" id="inputTitre" placeholder="titre"></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
-->

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



<?php
  if(isset($_SESSION['email']) && isset($_SESSION['connected']))
  {
    $reponse = $bddGalerie -> query('SELECT * FROM jamsession');


    $unseulpassage = true;
    echo '
    <div class="container-full">
    <div class="planning">
      <table class="table table-bordered">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Participants</th>
            <th></th>
          </tr>
        </thead>
        <tbody>';
    while ($donnees = $reponse->fetch())
    {
      if($unseulpassage == true)
      {
        $unseulpassage = false;
      }

      echo'
      <tr>
        <th scope="row">'.$donnees['id'].'</th>
        <td class="titre">'.$donnees['titre'].'</td>
        <td>';
        //bInstrus[] contient les musiciens présents pour le titre
        $bInstrus[0] = false;//rien
        $bInstrus[1] = false;//chant
        $bInstrus[2] = false;//piano
        $bInstrus[3] = false;//guitare
        $bInstrus[4] = false;//cuivre
        $bInstrus[5] = false;//contrebasse
        $bInstrus[6] = false;//batterie
        if(!empty($donnees['chant']))
        {
          echo '<img class="flatIcon" src="images/icons/1.svg"> ';
          $bInstrus[1] = true;
        }
        if(!empty($donnees['piano']))
        {
          echo '<img class="flatIcon" src="images/icons/2.svg"> ';
          $bInstrus[2] = true;
        }
        if(!empty($donnees['guitare']))
        {
          echo '<img class="flatIcon" src="images/icons/3.svg"> ';
          $bInstrus[3] = true;
        }
        if(!empty($donnees['cuivre']))
        {
          echo '<img class="flatIcon" src="images/icons/4.svg" style="fill: red"> ';
          $bInstrus[4] = true;
        }
        if(!empty($donnees['contrebasse']))
        {
          echo '<img class="flatIcon" src="images/icons/5.svg"> ';
          $bInstrus[5] = true;
        }
        if(!empty($donnees['batterie']))
        {
          echo '<img class="flatIcon" src="images/icons6.svg"> ';
          $bInstrus[6] = true;
        }
        echo '</td>';
        echo '<td><div class="emplParticiper">';

        if($bInstrus[$_SESSION['instrument']] == false)
        {
          echo '<button class="btn btn-success btn-sm btnParticiper">Participer</button>';
        }
        else{//si pas libre
          //on regarde si la personne qui joue de l'instru est l'utilisateur courant ou qqn d'autre
          $bParticipeDeja = false;
          if($_SESSION['instrument'] == 1)
          {
            if($donnees['chant'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          else if($_SESSION['instrument'] == 2)
          {
            if($donnees['piano'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          else if($_SESSION['instrument'] == 3)
          {
            if($donnees['guitare'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          else if($_SESSION['instrument'] == 4)
          {
            if($donnees['cuivre'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          else if($_SESSION['instrument'] == 5)
          {
            if($donnees['contrebasse'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          else if($_SESSION['instrument'] == 6)
          {
            if($donnees['batterie'] == $_SESSION['email'])
            {
              $bParticipeDeja = true;
            }
          }
          if($bParticipeDeja == true)
          {
            echo '<button class="btn btn-danger btn-sm btnAnnuler">Annuler</button>';
          }
          else {
            echo 'Complet';
          }
        }
        echo'</div></td></tr>';
    }
    //ligne de saisie nouveau titre
    echo'<tr class="newLine">
      <th scope="row">-</th>
      <td><input type="text" class="form-control" id="inputTitre" placeholder="titre"></td>
      <td></td>
      <td><button class="btn btn-primary btn-sm" id="btnProposer">Proposer</button></td>
    </tr>';
    echo '</tbody>
  </table>
</div>
</div>';

    if(($donnees == false) && ($unseulpassage == true))//si on enleve $unseulpassage, on passe tout le temps ici
    {
      //qu'est ce qu'on fait si on a pas de morceaux
      //echo 'Pas de morceaux';
    }
    $reponse->closeCursor();//termine le traitement de la requête*/

  }
  else{
    echo '<p class="errorNotif">Vous devez être connecté pour accéder à cette page</p>';
  }
?>



<script>
var instruUtilisateur = <?php echo $_SESSION['instrument']; ?>;
//console.log(instruUtilisateur);
$(document).ready(function(){

    $("#btnProposer").click(function(){

      insererTitre($("#inputTitre").val());

    });


    $("tr").each(function( index ) {

      var ref = $(this);

      $(this).find(".btnAnnuler").click(function() {
        annulerParticipation(ref);
      });
      $(this).find(".btnParticiper").click(function() {
        ajouterParticipation(ref);
      });
    });

    function gererToucheEntree(event)
    {
        // Compatibilité IE / Firefox
        if(!event && window.event) {
            event = window.event;
        }
        // IE
        if(event.keyCode == 13) {

            event.returnValue = false;//refuse l'event
            event.cancelBubble = true;//refuse l'event
            insererTitre();
        }
        // DOM
        if(event.which == 13) {
            event.preventDefault();//refuse l'event
            event.stopPropagation();//refuse l'event
            insererTitre();
        }
    }


    function insererTitre (){
      if($("#inputTitre").val().trim().length > 0)
      {
        $.post(
            'ajouterstandard.php', // Un script PHP que l'on va créer juste après
            {
                titre : $("#inputTitre").val(),  // Récupération de la valeur de l'input que l'on fait passer à donnemoilesimages.php
                chant : '',
                piano : '',
                guitare : '',
                cuivre : '',
                contrebasse : '',
                batterie : ''
            },

            function(data){

                if(data == false){
                     // Le membre n'a pas été connecté. (data vaut ici "failed")

                     //$("#emplacementImages").html("<p>Erreur lors de la connexion...</p>");
                }
                else{
                    location.reload();
                }

            },

            'text'
         );
      }
      else{
        $("#inputTitre").val("");
      }

    }
       function annulerParticipation(data1){
         var temp = instruUtilisateur;
         //console.log(temp);
         var str = "";
         if(temp == 1)
         {
           str = "chant";
         }
         else if(temp == 2)
         {
           str = "piano";
         }
         else if(temp == 3)
         {
           str = "guitare";
         }
         else if(temp == 4)
         {
           str = "cuivre";
         }
         else if(temp == 5)
         {
           str = "contrebasse";
         }
         else if(temp == 6)
         {
           str = "batterie";
         }

         $.post(

             'annulerparticipationstd.php', // Un script PHP que l'on va créer juste après
             {
                id : $(data1).find("th").html(),  // Récupération de la valeur de l'input que l'on fait passer à donnemoilesimages.php
                strInstru : str
             },

             function(data){

                 if(data == false){
                      // Le membre n'a pas été connecté. (data vaut ici "failed")

                      $("#emplacementImages").html("<p>Erreur lors de la connexion...</p>");
                 }
                 else{
                     location.reload();
                     //console.log(data);
                 }

             },
             'text'
          );
    }

    function ajouterParticipation(data1){
      var temp = instruUtilisateur;
      //console.log(temp);
      var str = "";
      if(temp == 1)
      {
        str = "chant";
      }
      else if(temp == 2)
      {
        str = "piano";
      }
      else if(temp == 3)
      {
        str = "guitare";
      }
      else if(temp == 4)
      {
        str = "cuivre";
      }
      else if(temp == 5)
      {
        str = "contrebasse";
      }
      else if(temp == 6)
      {
        str = "batterie";
      }

      var emailUtilisateur =<?php echo "\"".$_SESSION['email']."\"";?>;
      $.post(
          'ajouterparticipationstd.php', // Un script PHP que l'on va créer juste après
          {
             id : $(data1).find("th").html(),  // Récupération de la valeur de l'input que l'on fait passer à donnemoilesimages.php
             strInstru : str,
             email : emailUtilisateur
          },

          function(data){

              if(data == false){
                   // Le membre n'a pas été connecté. (data vaut ici "failed")
                   //$("#emplacementImages").html("<p>Erreur lors de la connexion...</p>");
              }
              else{
                  location.reload();
                  //console.log(data);
              }

          },
          'text'
       );
 }
});




</script>
</body>
</html>
