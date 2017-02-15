<html class="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Snippet - Bootsnipp.com</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="galeryfancybox.css" rel="stylesheet">
  <style>.gallery
    {
      display: inline-block;
      margin-top: 20px;
    }
  </style>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


  <style type="text/css">
    .fancybox-margin{
      margin-right:0px;
    }
  </style>
</head>


<body>
<!--####
### How to add in your boostrap project
1) Add jQuery "<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>"
2) Download fancybox (https://github.com/fancyapps/fancyBox)
3) Or use CDN (http://cdnjs.com/libraries/fancybox)
####-->

<div class="container">

  <form class="form-inline">
    <div class="form-group">
      <label class="sr-only">Année</label>
      <p class="form-control-static">Année</p>
    </div>
    <div class="form-group mx-sm-3">
      <label for="year-input" class="sr-only">Année</label>
      <input class="form-control" type="number" value="" id="year-input" onkeypress="gererToucheEntree(event);">
    </div>
    <button type="button" class="btn btn-primary" id="submit-year-input">Valider</button>
  </form>

</div>
<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<!-- connexion BDD -->
<?php include("connexionbdd.php");?>

<?php
  $selectAnnee = date("Y");//initialise avec l'année courante
  //echo 'date :'.$selectAnnee;//ok ça marche
  $reponse = $bddGalerie -> query('SELECT * FROM galerie01 WHERE YEAR(debut) ='.$selectAnnee);/*modifier la requête en fonction de l'année choisie*/
?>

<!-- Espace affichage images images -->

<div id="emplacementImages">

</div>


<script>
  $(document).ready(function(){

    // Mise à jour automatique de l'année
    /*
    var today =new Date();//current Date
    var yyyy = today.getFullYear();
    $("#year-input").val(yyyy);
    */
    //2eme version plus simple
    $(".fancybox").fancybox({
      openEffect: "none",
      closeEffect: "none"
    });

    $("#year-input").val(<?php echo $selectAnnee;?>);


      $("#submit-year-input").click(function(){
        recupImages();

      });
      recupImages();

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
          recupImages();
      }
      // DOM
      if(event.which == 13) {
          event.preventDefault();//refuse l'event
          event.stopPropagation();//refuse l'event
          recupImages();
      }
  }

  function recupImages (){
    $.post(
        'donnemoilesimages.php', // Un script PHP que l'on va créer juste après
        {
            yearinput : $("#year-input").val(),  // Récupération de la valeur de l'input que l'on fait passer à donnemoilesimages.php
        },

        function(data){

            if(data == false){
                 // Le membre n'a pas été connecté. (data vaut ici "failed")

                 $("#emplacementImages").html("<p>Erreur lors de la connexion...</p>");
            }
            else{
                 $("#emplacementImages").html(data);
            }

        },

        'text'
     );
  };
</script>

</body>
</html>
