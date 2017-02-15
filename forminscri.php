<?php
  include("headerf.php");
?>


<!--
Pouvoir s’inscrire (anglais / français)
Nom, prénom, adresse, tél, mail
Choix d’un instrument
Niveau : lecture grilles / partitions / improvisations
Navette aéroport : Oui / non
Accompagné : Oui / non
Description stage (dates, tarifs…)

Un champs boolean sera réservé à l’administrateur de la masterclasse pour
valider l’inscription (juste à prévoir en base de données mais ne pas
implémenter le développement du backoffice)
-->


  <!-- <link rel="stylesheet" type="text/css" href="styles/inscription.css" media="all"/> -->

  <div class="container">
    <div id="res">
    </div>
    <form id="formInscription">

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com">
          <div class="form-control-feedback" id="fbemail"></div>
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        </div>
      </div>

      <div class="form-group row">
        <label for="vpassword" class="col-sm-2 col-form-label">Vérification</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="vpassword" name="vpassword" placeholder="Retapez votre mot de passe">
        </div>
      </div>


      <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nom" name="nom" placeholder="Bricot">
        </div>
      </div>

      <div class="form-group row">
        <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Juda">
        </div>
      </div>

      <div class="form-group row">
        <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" value="" id="adresse" name="adresse" placeholder="Adresse">
        </div>
      </div>

      <div class="form-group row">
        <label for="tel" class="col-sm-2 col-form-label">Telephone</label>
        <div class="col-sm-10">
          <input class="form-control" type="tel" value="" id="tel" name="tel" placeholder="(+33)6 99 99 99 99">
        </div>
      </div>

      <div class="form-group row">
          <label for="instrument" class="col-sm-2 col-form-label">Instrument</label>
          <div class="col-sm-10">
            <select class="form-control" id="instrument">
              <option value="0" selected>Choisir...</option>
              <option value="1">Chant</option>
              <option value="2">Piano</option>
              <option value="3">Guitare</option>
              <option value="4">Cuivres</option>
              <option value="5">Contrebasse</option>
              <option value="6">Batterie</option>
            </select>
          </div>
      </div>

      <div class="form-group row">
          <label for="niveau" class="col-sm-2 col-form-label">Niveau</label>
          <div class="col-sm-10">
            <select class="form-control" id="niveau" name="niveau">
              <option value="0" selected>Choisir...</option>
              <option value="1">Lecture grilles</option>
              <option value="2">Lecture partitions</option>
              <option value="3">Improvisations</option>
            </select>
          </div>
      </div>

        <div class="form-group row">
          <label class="col-sm-2">Options</label>
          <div class="col-sm-2">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="navette" name="navette">
                Navette&nbsp;
              </label>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="accompagne" name="accompagne">
                Accompagné&nbsp;
              </label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="offset-sm-2 col-sm-10">
            <button type="button" class="btn btn-primary" id="btn-submit">Valider</button>
          </div>
        </div>

    </form>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<script>
  var varInstru = document.getElementById("instrument");
  var varNiveau = document.getElementById("niveau");



function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};


  $(document).ready(function(){

    $("#email").bind('blur',function(data){
      if(isValidEmailAddress($("#email").val()))
      {
        $.post(
            'verifieremail.php',
            {
                email : $("#email").val()
            },

            function(data){
                if(data == 1){
                  $("#email").parent().parent().toggleClass("has-danger", false),
                  $("#email").parent().parent().toggleClass("has-warning", false),
                  $("#email").toggleClass("form-control-danger", false),
                  $("#email").toggleClass("form-control-warning", false),

                  $("#email").parent().parent().toggleClass("has-success", true),
                  $("#email").toggleClass("form-control-success", true);

                  $("#email").parent().find(".form-control-feedback").text("");
                }
                else{
                  $("#email").parent().parent().toggleClass("has-success", false),
                  $("#email").toggleClass("form-control-success", false),
                  $("#email").parent().parent().toggleClass("has-warning", false),
                  $("#email").toggleClass("form-control-warning", false),
                  $("#email").parent().parent().toggleClass("has-danger", true),
                  $("#email").toggleClass("form-control-danger", true),

                  $("#email").parent().find(".form-control-feedback").text("Déjà utilisée");
                }

            },

            'text'
         );
      }
      else
      {
        //console.log("email invalide");
        $("#email").parent().parent().toggleClass("has-success", false),
        $("#email").toggleClass("form-control-success", false),
        $("#email").parent().parent().toggleClass("has-warning", false),
        $("#email").toggleClass("form-control-warning", false),
        $("#email").parent().parent().toggleClass("has-danger", true),
        $("#email").toggleClass("form-control-danger", true),

        $("#email").parent().find(".form-control-feedback").text("Adresse invalide");
      }
    });

/*
  Si le mdp est rempli
    si les conditions pour que le mdp soit correct sont vérifiées
      vert
    sinon
      rouge
  sinon
    effacer mdp
    couleur par défaut mdp
    couleur par défaut verif mdp

*/

    $("#password").bind('blur',function(){
      if($('#password').val() != "")
      {
        if(true)//rajouter conditions
        {
          $(this).parent().parent().toggleClass("has-success", true),
          $(this).parent().parent().toggleClass("has-danger", false),

          $(this).toggleClass("form-control-success", true),
          $(this).toggleClass("form-control-danger", false);
        }
        else
        {
          $(this).parent().parent().toggleClass("has-success", false),
          $(this).parent().parent().toggleClass("has-danger", true),

          $(this).toggleClass("form-control-success", false),
          $(this).toggleClass("form-control-danger", true);
        }
      }

      else{
        $(this).parent().parent().toggleClass("has-danger", false),
        $(this).toggleClass("form-control-danger", false),

        $(this).parent().parent().toggleClass("has-success", false),
        $(this).toggleClass("form-control-success", false);

        $("#vpassword").val("");
        $("#vpassword").trigger("blur");
      }


    });


    /*
    si le mdp est rempli
      vert si les 2 mdp sont identiques
      rouge sinon
    sinon apparence par défaut
    */
    $("#vpassword").bind('blur',function(){
      if($('#password').val() != "")//si mdp est rempli
      {
        if(($("#password").val() == $("#vpassword").val()))
        {
          $(this).parent().parent().toggleClass("has-success", true),
          $(this).parent().parent().toggleClass("has-danger", false),

          $(this).toggleClass("form-control-success", true),
          $(this).toggleClass("form-control-danger", false);
        }
        else
        {
          $(this).parent().parent().toggleClass("has-success", false),
          $(this).parent().parent().toggleClass("has-danger", true),

          $(this).toggleClass("form-control-success", false),
          $(this).toggleClass("form-control-danger", true);
        }
      }
      else{
        $(this).parent().parent().toggleClass("has-danger", false),
        $(this).toggleClass("form-control-danger", false),

        $(this).parent().parent().toggleClass("has-success", false),
        $(this).toggleClass("form-control-success", false);

      }


    });

    $("#btn-submit").click(function(){
      envoiForm();

    });
    function envoiForm (){
      $.post(
          'inscription.php', // Un script PHP que l'on va créer juste après
          {
              nom : $("#nom").val(),//inputs
              prenom : $("#prenom").val(),
              adresse : $("#adresse").val(),
              tel : $("#tel").val(),
              email : $("#email").val(),
              password : $("#password").val(),
              vpassword : $("#vpassword").val(),
              instrument : varInstru.options[varInstru.selectedIndex].value,//select
              niveau : varNiveau.options[varNiveau.selectedIndex].value,//select
              navette : ($('#navette').is(':checked')) === true ? 1 : 0,//input checkbox
              accompagne : ($('#accompagne').is(':checked')) === true ? 1 : 0,//input checkbox
          },

          function(data){

              if(data == false){
                   // Problème

                   $("#res").html("<p>Erreur lors de la connexion...</p>");
              }
              else{
                   $("#res").html(data);//on affiche le retour dans la div id="res"

                   //redirection vers l'accueil :
                   // similar behavior as clicking on a link
                   window.location.href = "index.php";
              }

          },

          'text'
       );
    };

  });

</script>
</body>
</html>
