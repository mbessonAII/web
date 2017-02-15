<!--<html>-->
  <!-- <form action="connection.php" method="post">
    <label>Adresse e-mail : <input type="email" name="email" required/></label><br/>
    <label>Mot de passe : <input type="password" name="password" required/></label><br/>
    <input type="submit" value="Connexion"/>
  </form> -->

  <!-- http://bootsnipp.com/snippets/featured/post-thumbnail-list -->
  <!--<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/presentationprofs.css">
  </head>

  <body>-->
<?php include("headerf.php");?>
<link rel="stylesheet" href="styles/presentationprofs.css">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
              <!-- à l'origine col-sm-4 col-md-4-->
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_1.jpg" class="img-responsive"/>
                        <span class="post-title"><b>Louis Armstrong</b><br />
                            <b>Cuivres</b></span>
                    </div>

                    <div class="content">
                        <!-- <div class="author">
                            By <b>Bhaumik</b> |
                            <time datetime="2014-01-20">January 20th, 2014</time>
                        </div> -->
                        <div class="txt">
                            D'abord trompettiste reconnu, il est devenu l'un des chanteurs de jazz les plus influents de son époque.
                            Il est l'auteur d'extraordinaires improvisations en jazz New Orleans et définit ce qu'est le soliste de jazz.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                            <?php include 'cv_prof_1.php'; ?>
                        </div>
                        <div>
                            <button class="btn btn-warning btn-sm">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_2.jpg" class="img-responsive" />
                        <span class="post-title"><b>Oscar Emmanuel Peterson</b><br />
                            <b>Piano</b></span>
                    </div>

                    <div class="content">
                        <div class="txt">
                            Oscar Emmanuel Peterson, célebre pianiste et compositeur canadien de jazz.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_3.jpg" class="img-responsive" />
                        <span class="post-title"><b>John Scofield</b><br />
                            <b>Guitare</b></span>
                    </div>
                    <div class="content">
                        <div class="txt">
                            John Scofield, est un guitariste de jazz et compositeur américain.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm">Read more</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_4.jpg" class="img-responsive" />
                        <span class="post-title"><b>Ray Charles</b><br />
                            <b>Chant</b></span>
                    </div>
                    <div class="content">
                        <div class="txt">
                            John Scofield, est un guitariste de jazz et compositeur américain.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                        </div>
                        <div>
                            <button class="btn btn-danger btn-sm">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_5.jpg" class="img-responsive" />
                        <span class="post-title"><b>Kyle Eastwood</b><br />
                            <b>Contrebasse</b></span>
                    </div>
                    <div class="content">
                        <div class="txt">
                            John Scofield, est un guitariste de jazz et compositeur américain.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                        </div>
                        <div>
                            <button class="btn btn-secondary btn-sm">Read more</button>
                            <!--<a href="http://www.jquery2dotnet.com/2013/07/cool-social-sharing-button-using-css3.html" class="btn btn-secondary btn-sm">Read more</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="post">
                    <div class="post-img-content">
                        <img src="images/prof_6.jpg" class="img-responsive" />
                        <span class="post-title"><b>Art Blakey</b><br />
                            <b>Batterie</b></span>
                    </div>
                    <div class="content">
                        <div class="txt">
                            John Scofield, est un guitariste de jazz et compositeur américain.
                        </div>
                        <div class="cv">
                            <p><strong>CV :</strong></p>
                        </div>
                        <div>
                            <button class="btn btn-info btn-sm">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script>

    $(document).ready(function(){
      function updateSize(){
        $(".img-responsive").width($(".post-img-content").width());
        $(".post-img-content").height($(".img-responsive").height());
      }

      updateSize();

      $( window ).resize(function() {
        updateSize();
      });

      $( ".content" ).each(function( index ) {
        var divreference = $(this).find(".cv");
        $(this).find(".btn").html("Plus");
        divreference.hide();

        $(this).find(".btn").click(function() {
          divreference.toggle();
          if(divreference.css("display") == "none")
          {
            $(this).html("Plus");
          }
          else {
            $(this).html("Moins");
          }

        });
      });

    });
    </script>
  </body>
  </html>
