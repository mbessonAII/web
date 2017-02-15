<html lang="en" class=""><head>
  	<!--GD-->

    <!--
      Idées : sélectionner l'année dans le haut de page et valider avec un des 2 boutons déjàs présents
    -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="author" href="//plus.google.com/u/0/+AngelaHoldenDesign/posts">
    <meta name="description" content="Learn to build a simple, responsive grid for displaying and playing videos using CSS and jQuery.">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Responsive Video Gallery</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/videofancybox.css">
    <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">

  <style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>

  <body>
    <section class="first">
      <header>
        <h1>Galerie vidéo</h1>
      </header>
        <p></p>

        <ul class="buttons">
          <li><a href="index.php">Retour au site</a></li>
          <!-- <li><a href="//github.com/fancyapps/fancyBox" target="_blank">Fancybox on GitHub</a></li> -->
        </ul>

    </section>

    <section class="second clearfix">
      <header>

        <h1>
          <span class="glyphicon glyphicon-chevron-left" id="icon-left"></span>
          <span id="year-input"><?php echo DATE("Y");?></span>
          <span class="glyphicon glyphicon-chevron-right" id="icon-right"></span>
        </h1>

      </header>
      <div id="emplacementVideos">
      </div>

      <!-- Affichage images -->
      <!--
      <article class="video">
        <figure>
        <a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/zH3ZohGnjcg"><img class="videoThumb" src="//i1.ytimg.com/vi/zH3ZohGnjcg/mqdefault.jpg"></a>
        </figure>
        <h2 class="videoTitle">Kumru Ballad</h2>
      </article>
      -->

    </section>
<!--
    <section class="third">
      <header>
        <h1>Section 3</h1>
      </header>

      <ol>
        <li>Use two classes: <code>fancybox</code> and <code>fancybox.iframe</code> on the <code>a</code> tag.</li>
        <li>Use the URL in the <code>iframe</code> embed code, not the copy &amp; paste URL.</li>
        <li>Right click on the YouTube or Vimeo video thumbnail and copy the image URL for the source.</li>
        <li>Use your own class names for the <code>article</code>, <code>img src</code>, and video title.</li>
      </ol>
    </section>
-->

  <footer>
    <!--<p>Simple Responsive Video Gallery by <a href="//angelajholden.com" target="_blank">Angela J. Holden</a></p><p>
    </p><p>Use it • Change it • Make something cool with it</p>-->
    <a href="#" class="scroll-top" style="display: inline;">↑</a>
  </footer>

  <!-- bootstrap -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <!-- fancybox -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <script src="scripts/jquery.fancybox.min.js"></script>
  <script src="scripts/global.min.js"></script>
  <script>
  var annee=<?php echo DATE("Y");?>;
  $(document).ready(function(){

    recupVideos();//la 1ere fois n'a pas marché parce qu'il y avait des espaces dans la div year-input

    $("#icon-right").click(function(){
      addYear();
      recupVideos();
    });
    $("#icon-left").click(function(){
      substractYear();
      recupVideos();
    });

    function addYear (){
      annee = annee+1;
      $("#year-input").html(annee);
    };
    function substractYear (){
      annee = annee-1;
      $("#year-input").html(annee);
    };
    function recupVideos (){
      console.log($("#year-input").html());
      $.post(
          'donnemoilesvideos.php', // Un script PHP que l'on va créer juste après
          {
              yearinput : $("#year-input").html(),
          },

          function(data){

              if(data == false){
                   $("#emplacementVideos").html("<p>Erreur lors de la connexion...</p>");
              }
              else{
                //console.log(data);
                   $("#emplacementVideos").html("<h1>"+data+"<h1>");
              }

          },

          'text'
       );
    };

  });
  </script>
</body></html>
