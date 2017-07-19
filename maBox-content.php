
<?php 
  if($_POST['type_livraison']=="OX"){
?>
<div class="container">

  <div class="row content5" >
    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
    <!-- <img src="img/loader.gif" id="gif" style="display: block; margin: 0 auto; width: 100%;"> -->
        <!-- <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"> -->
        <!-- <h3 class="text-center">
          Votre demande a été envoyée avec succès.
        </h3> -->
        <p class="text-center">
          Détails de votre commande : 
        </p>

        <div class="commandeDetails">
          <div class="row"><div class="col-md-6">Client :</div><div class="infoLivraison"><?php echo $_SESSION['nomComplet']; ?> </div></div>
          <div class="row"><div class="col-md-6">Type de livraison :</div><div class="infoLivraison" >Oumbox</div></div>
          <div class="row"><div class="col-md-6">Ville :</div><div id="infos7" class="infoLivraison">Casablanca</div></div>
          <div class="row"><div class="col-md-6">Adresse :</div><div id="infos8" class="infoLivraison">77 bis, boulevard abdelmoumen</div></div>
          <div class="row"><div class="col-md-6">Téléphone :</div><div id="infosTel2" class="infoLivraison">05 22 22 58 50</div></div>
        </div>
        <form id="downloadBr" action="pdf/br.php" style="text-align: center; margin-top: 50px;" >
            <input type="submit" value="Télécharger le bon de retrait" class="btn btn-primary">
        </form>
         <p class="info downloadSuccess" style="text-align: center;" hidden>Le bon de retrait va être téléchargé dans quelques seconds</p>
       <!--  <div  style="text-align: center; margin-top: 50px;">
          <input id="downloadBr" type="submit" value="Télécharger le bon de retrait" class="btn btn-primary">
        </div> -->
         

        </span></p>
    </div>

    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
        <p>
          <ol>
           <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;">&nbsp;Il faut </span><strong style="background-color: transparent;">OBLIGATOIREMENT</strong><span style="background-color: transparent;">&nbsp;présenter:&nbsp;<br>
    <strong>Le bon imprimé + Copie de votre CIN<span style="background-color: transparent;">&nbsp;au point retrait</span></strong></span></span></span></li>
    <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;"><strong><span style="background-color: transparent;">Vous pouvez envoyer quelqu'un avec ce bon imprimé+ copie de votre CIN</span></strong></span></span></span></li>
    <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;"><strong><span style="background-color: transparent;">Un seul bon par membre par box</span></strong></span></span></span></li>
          </ol>
        </p>
        </span></p>
    </div>

  </div>  
</div>
<?php
  }
  else if($_POST['type_livraison']=="SB")
  {
 ?>
<div class="row content1" id="content" >
    <h1 class="text-center">Vous avez choisi livraison en point relais SpeedBox</h1>
    <div class="col-md-7 col-xs-12  left-alert" id="myForm" novalidate="novalidate">
      <ul class="collapsible collapsible-expandable" data-collapsible="expandable">
       <li class="active maman">
        <div class="collapsible-header pink lighten-2 white-text waves-effect waves-light active infos">Choisissez le point relais le plus proche de vous</div>
        <div class="collapsible-body" style="display: block;">
        <div class="row coordonnee">  

           <!-- Liste des villes -->
           <div id="ville" class="input-field col-md-6 col-sm-6 col-xs-12">
              <span class="micons-building prefix"></span>
          <!-- <input id="city" name="VILLE" type="text" pattern=".{3,}" minlength="3" required="required" class="validate" aria-required="true"> -->
            <select  name="VILLE" class="initialized">
            <option value="0" disabled="" selected="">Ville</option>
            <?php  
              include('config.php');
              $villes = getAllCities1($conn);
              $relais = getAllRelais($conn);
              foreach ($villes as $key => $infos) { 
            ?>
              <option value="<?php echo $infos['id']; ?>"><?php echo $infos['name']; ?></option>
              <?php } ?>
            </select>
           </div>

         <!-- List des points relais -->
        <div id="relais" class="input-field col-md-6 col-sm-6 col-xs-12" hidden>
              <select id="relaisList" name="relaisList" class="initialized">
                <option value="0" disabled="" selected="">Point relais</option>
                <?php  
                  foreach ($relais as $key => $infos) { 
                ?>
                  <option id="<?php echo "relais".$infos['id_relais']; ?>" class="<?php echo "ville".$infos['id_ville']; ?>" value="<?php echo $infos['id_relais']; ?>"><?php echo $infos['nom']; ?></option>
                  <?php } ?>
              </select>
         </div>
    </div>
    <div class="row">
         <div class="input-field col-md-6 col-sm-6 col-xs-12">
          <span class="micons-mobile prefix"></span>
          <input id="gsm" name="GSM" type="text" pattern="^(0|00\s?212\s?|\(?\+212\)?\s?(\(0\))?)[67]([\s\-\.]?[0-9]{2}){4}$" class="validate" required="required" aria-required="true">
          <label for="gsm" data-error="numéro invalide" class="gsmLabel">Tél. portable</label>
         </div>


         <!-- Adresse du point relais -->
         <div id="adresseRelais" class="input-field col-md-12" style="color: #9e9e9e;font-size: 1rem;" hidden>
           <p></p>
           <?php  
             foreach ($relais as $key => $infos) { 
           ?>
             <p class="text-center <?php echo "relais".$infos['id_relais']; ?>" value="<?php echo $infos['id_relais']; ?>" >
             <b>Adresse :</b> <span class="adresseShow"> <?php echo $infos['adresse']; ?></span> <br/> 
             Horaire : du lundi au samedi de <?php echo $infos['ouverture']; ?> à <?php echo $infos['fermeture']; ?><br/>
            Frais de livraison :  <span class="fraiShow"><?php echo $infos['prix'].' Dh'; ?></span>
             </p>
             <div id="error2" class="text-center"></div>
             <?php } ?>

             <div class="text-center">
               <button class="send1 waves-effect waves-light btn lighten-1">CONFIRMER</button>
             </div>
         </div>   
       </div>
      </div>
      </li>
    </ul>
   </div>
   <div id="map" class="col-md-5 col-sm-12 col-xs-12 "></div>
</div>
<?php 
}
else if($_POST['type_livraison']=="LD"){
 ?>
<div class="row content2" id="content" >
    <h1 class="text-center">Vous avez choisi Livraison à domicile</h1>
    <h3 class="text-center">Livraison limitée au centre de Casablanca</h3>
    <div class="col s12 m7 offset-m2 left-alert" id="myForm" novalidate="novalidate">
      <ul class="collapsible collapsible-expandable" data-collapsible="expandable">
       <li class="active maman">
        <div class="collapsible-header pink lighten-2 white-text waves-effect waves-light active infos">Choisissez votre quartier sur la liste (HORAIRE DE TRAVAIL)</div>
        <div class="collapsible-body" style="display: block;">
        <div class="row coordonnee">  

           <!-- Liste des quartiers -->
           <div id="quartiersCasablanca" class="input-field col s12">
              <span class="micons-building prefix"></span>
          <!-- <input id="city" name="VILLE" type="text" pattern=".{3,}" minlength="3" required="required" class="validate" aria-required="true"> -->
            <select  name="quartiersList" class="initialized">
            <option value="0" disabled="" selected="">Quartier</option>
            <?php  
              include('config.php');
              $quartiers = getAllQuartiers1($conn);
              foreach ($quartiers as $key => $infos) { 
            ?>
              <option value="<?php echo $infos['id']; ?>"><?php echo $infos['nom']; ?></option>
              <?php } ?>
            </select>
           </div>

         <!-- List des points relais -->
        <!-- <div id="adresseClient" class="input-field col s12" minlength="6" class="validate" required="required" aria-required="true">
              <span class="micons-building prefix"></span>
              <label>Adresse de livraison</label><input type="text"/>
         </div> -->
        

         <div id="adresseClient" class="input-field col-md-12 col-sm-12 col-xs-12">
          <span class="micons-building prefix"></span>
          <input id="adresseClientInput" name="adresseClientInput" type="text"  class="validate" required="required" aria-required="true">
          <label for="adresseClientInput" class="gsmLabel">Adresse de livraison</label>
         </div>

         <div class="input-field col-md-12 col-sm-12 col-xs-12">
          <span class="micons-mobile prefix"></span>
          <input id="gsm2" name="GSM" type="text" pattern="^(0|00\s?212\s?|\(?\+212\)?\s?(\(0\))?)[67]([\s\-\.]?[0-9]{2}){4}$" class="validate" required="required" aria-required="true">
          <label for="gsm2" data-error="numéro invalide" class="gsmLabel">Tél. portable</label>
         </div>

         <!-- Adresse du point relais -->
         <div id="adresseRelais" class="input-field col s12" style="color: #9e9e9e;font-size: 1rem;" >
             <div class="text-center">
               <div id="error"></div>
               <button class="send2 waves-effect waves-light btn lighten-1">CONFIRMER</button>
             </div>
         </div>   
       </div>
      </div>
      </li>
    </ul>
   </div>
   <div>
   
   </div>
   <!-- <div id="map" class="col s12 m5"></div> -->
</div>

<?php
}
?>
<div class="container">
  <div class="row content3" >
    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
        <!-- <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"> -->
        <h3 class="text-center">
          Votre demande a été envoyée avec succès.
        </h3>
        <p class="text-center">
          Détails de votre commande : 
        </p>

        <div class="commandeDetails">
          <div class="row"><div class="col-md-6">Client :</div><div class="infoLivraison"><?php echo $_SESSION['nomComplet']; ?> </div></div>
          <div class="row"><div class="col-md-6">Type de livraison :</div><div class="infoLivraison" >SpeedBox</div></div>
          <div class="row"><div class="col-md-6">Ville :</div><div id="infos3" class="infoLivraison"></div></div>
          <div class="row"><div class="col-md-6">Point relais :</div><div id="infos4" class="infoLivraison"></div></div>
          <div class="row"><div class="col-md-6">Adresse :</div><div id="infos5" class="infoLivraison"></div></div>
          <div class="row"><div class="col-md-6">Frais de livraison :</div><div id="infos6" class="infoLivraison"></div></div>
          <div class="row"><div class="col-md-6">Téléphone :</div><div id="infosTel1" class="infoLivraison"></div></div>
        </div>
        

        </span></p>
    </div>
    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
          <p>
            <ul>
              <li>1.  Vous allez recevoir un SMS quand votre box est livrée au point relais choisi</li>
              <li>2.  Présentez-vous au point relais choisi avec votre CIN et 25 dh pour récupérer votre box</li>
              <li>3.  Vous aurez après 7 a 10 j pour récupérer la box; sinon elle ne sera plus disponible</li>
            </ul>
          </p>
          </span></p>
          <button type="button" class="btn btn-primary retour"  OnClick="window.location.href='espace.php'">Retour</button>
      </div>
  </div>  
</div>
<div class="container">
  <div class="row content4" >
    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
        <!-- <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"> -->
        <h3 class="text-center">
          Votre demande a été envoyée avec succès.
        </h3>
        <p class="text-center">
          Détails de votre commande : 
        </p>

        <div class="commandeDetails">
          <div class="row"><div class="col-md-6">Client :</div><div class="infoLivraison"><?php echo $_SESSION['nomComplet']; ?> </div></div>
          <div class="row"><div class="col-md-6">Type de livraison :</div><div class="infoLivraison" >Livraison à domicile</div></div>
          <div class="row"><div class="col-md-6">Ville :</div><div id="infos7" class="infoLivraison">Casablanca</div></div>
          <div class="row"><div class="col-md-6">Adresse :</div><div id="infos8" class="infoLivraison"></div></div>
          <div class="row"><div class="col-md-6">Téléphone :</div><div id="infosTel2" class="infoLivraison"></div></div>
        </div>
        

        </span></p>
    </div>

    <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
        <p>
          <ul>
            <li>1. Vous allez recevoir un appel de notre livreur pour programmer la livraison.</li>
            <li>2. Présentez votre CIN à notre livreur et 20 dhs pour récupérer votre box.</li>
          </ul>
        </p>
        </span></p>
        <button type="button" class="btn btn-primary retour" OnClick="window.location.href='espace.php'">Retour</button>
    </div>

  </div>  
</div>
 

  
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="register/jquery.min.js"></script>
    
     

      <script>

        function initMap() {
          var myLatLng = {lat: 33.5797897, lng: -7.6247194};

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: myLatLng
          });

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Oumbox'
          });
        }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBrZqwoiE2SFo32PmyTGZo3D-jvfw5Y10&callback=initMap">
      </script>

      <script type="text/javascript">

      
    

$(document).ready(function() {
  $('.modal').modal();
 // $('.modal').modal({
 //      dismissible: true, // Modal can be dismissed by clicking outside of the modal
 //      opacity: .5, // Opacity of modal background
 //      inDuration: 300, // Transition in duration
 //      outDuration: 200, // Transition out duration
 //      startingTop: '4%', // Starting top style attribute
 //      endingTop: '10%' // Ending top style attribute
      
 //    }
 //  );

    $('select').material_select();
    $("input.select-dropdown").attr('pattern',".{5,}"); // add pattern for validation

  // adjust dynamically validation on selects
  
//$("select[required]").css({display: "block", visibility:'hidden', position: 'absolute'});

     


});

function checkForm(){}


function scroller() {}
$(function() {
        $('a[href*=#]:not([href=#])').click(scroller);
    });
</script>
   


<div class="hiddendiv common"></div><input type="hidden" value="mata-inactive-38.png" id="mata-icon-name"><div class="ha"></div>



<script type="text/javascript">
  $('.content3').hide();
  $('.content4').hide();
  var markers = new Array(); 
  $('select[name=VILLE]').change(function() { 
    
    //val = id ville 
    var id ;
    
    if($(this).val()>0){
      markers=[];
      id = $(this).val();
       //Afficher la liste des points relais 
      $("#relais").removeAttr( "hidden" );

      /*$("#relais ul li:nth-child(1)").removeClass("disabled");
       $("#relais ul li:nth-child(1)").addClass("active");
       $("#relais ul li:nth-child(1)").addClass("selected");*/
      $("#relaisList input:text").val('Point relais');
       
      $('#infos3').html( $("#ville ul li.active span").text());

      //Afficher tous les points relais existant
      $("#relais ul li").removeAttr( "hidden" );
      $("#relaisList option").removeAttr( "hidden" );

      //cacher l'adresse
      $("#adresseRelais").attr( "hidden", "" );

      $("#relais input").trigger('click');
      


      //Cacher la liste de points relais qui font pas partie de la ville sélectionnée
      //ajouter attribut hidden a tous les option qui n'ont pas une class = villeIdVille
      $('#relaisList option').not("#relaisList option.ville"+$(this).val()).attr("hidden","");
      
      //ça permet de cacher les li correspondant a chaque option de select
      $("#relaisList").find('option').each(function(index){
            // option
            var current = $(this);
            // attribut hidden de option 
            var attr = $(current).attr('hidden');



            // si option a un attribut hidden alor li doit avoir un attribut hidden 
            if (typeof attr == typeof undefined ) {
               
            }else{
               if(index!=0){
                  var newIndex= index+1;
                  $("#relais ul li:nth-child("+newIndex+")").attr("hidden",""); 
               }
               
            }
        });


      //gestion de la carte 
      var myData={methode:"getRelaisListByVille",id_ville:id};

      $.ajax({
        url:'gestion/lib/util.php',
        type:'POST',
        data:myData,
        success:function(data){
         var json = JSON.parse(data);
         var myLatLng = {lat: parseFloat(json['result'][0].gps_lat), lng: parseFloat(json['result'][0].gps_lng)};
         var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 10,
           center: myLatLng
         });
         var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: json['result'][0].nom
            });
         markers.push(marker);
         for (var i = 1; i < json['result'].length; i++) {

            var myLatLng = {lat: parseFloat(json['result'][i].gps_lat), lng: parseFloat(json['result'][i].gps_lng)};


            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: json['result'][i].nom
            });
            markers.push(marker);
         };
        },
        error:function(data) { 
           console.log(data);
        }
      });

      //fin gestion de la carte
    } 
  });

  var id_relais;

  $('select[name=relaisList]').change(function() { 
    var selectedCity= $("select[name=relaisList] option:selected").text();
    $("#adresseRelais p").trigger('click');
    for (var i = 0; i < markers.length; i++) {
     if(selectedCity== markers[i]['title']){
      
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 14,
         center: markers[i]['position']
       });
       var marker = new google.maps.Marker({
            position: markers[i]['position'],
            map: map,
            title: markers[i]['title']
      });

     }
     
    };

    $('#infos4').html($('#relais ul li.active span').text());
    if(true){ /*this).val()>0*/
      id_relais=$(this).val();
      $("#adresseRelais").removeAttr( "hidden" );
      $('#adresseRelais p').removeAttr( "hidden" );
      $('#adresseRelais p').not("#adresseRelais p.relais"+$(this).val()).attr("hidden","");
      
      $('#infos5').html($('#adresseRelais p:not([hidden]) span.adresseShow').text());
      $('#infos6').html($('#adresseRelais p:not([hidden]) span.fraiShow').text());
    } 
  });


  $("button.send1").click(function(){
    var myQuartier = "NULL";
    var myAdresse = "NULL";
    var myTel = $("#gsm").val();
    $("#infosTel1").html(myTel);
     if(myQuartier==""){
       $('#error').html("Merci de choisir un quartier");
    }
    else if(myAdresse==""){
      $('#error').html("Merci de nous renseigner votre adresse"); 
    }else if(myTel==""){
      $('#error2').html("Merci de nous renseigner votre Téléphone"); 
    }else if(myTel.length<10){
      $('#error2').html("Numéro de téléphone invalide"); 
      console.log(myTel.length);
    }else{
      var livraison = {livraison:{user:'client',type:'SB',quartier:myQuartier,relais:id_relais,adresse:myAdresse,gsm:myTel},methode:'addLivraison'};
    $.ajax({
      url:'gestion/lib/util.php',
      type:'POST',
      data:livraison,
      success: function(data){
        $body = $("body");
        $body.addClass("loading");
        $( ".content1" ).fadeOut( "slow", function() {
              $( ".content3" ).fadeIn("slow");
              $body.removeClass("loading");
          });
      },
      error : function(data){
        console.log(data);
      }
    });
    }
    
  });
   $("button.send2").click(function(){
    var myQuartier = $("#quartiersCasablanca ul li.active").text();
    var myAdresse = $("#adresseClient input").val();
    var tel = $("#gsm2").val();
    $("#infosTel2").html(tel);

    $('#infos7').html( myQuartier);
    $('#infos8').html( myAdresse);
    if(myQuartier==""){
       $('#error').html("Merci de choisir un quartier");
    }
    else if(myAdresse==""){
      $('#error').html("Merci de nous renseigner votre adresse"); 
    }else if(tel==""){
      $('#error').html("Merci de nous renseigner votre Téléphone"); 
    }else if(tel.length<10){
      $('#error').html("Numéro de téléphone invalide"); 
    }else{
      var livraison = {livraison:{user:'client',type:'LD',quartier:myQuartier,relais:'NULL',adresse:myAdresse,gsm:tel},methode:'addLivraison'};
    $.ajax({
      url:'gestion/lib/util.php',
      type:'POST',
      data:livraison,
      success: function(data){
         $body = $("body");
        $body.addClass("loading");
        $( ".content2" ).fadeOut( "slow", function() {
              $( ".content4" ).fadeIn("slow");
                $body.removeClass("loading");
          });
      },
      error : function(data){
        console.log(data);
      }
    });
    }
    
  });
</script>


<script type="text/javascript">
  $("input[type='submit']").on("click", function(){
    $body = $("body");
     $body.addClass("loading");
});
</script>

<script type="text/javascript">
    $("#downloadBr").click(function() {
       /* var url = "pdf/br.php"; 
        $body = $("body");
        $body.addClass("loading");*/
        $body = $("body");
        $body.removeClass("loading");
        $("#downloadBr").hide();
        $(".downloadSuccess").fadeIn('1000');
       /* $.ajax({
              type: "POST",
              url: url,
              success: function(data)
              {
                  $body = $("body");
                  $body.removeClass("loading");
                  $("#downloadBr").hide();
                  $(".downloadSuccess").fadeIn('1000');
              },
              error:function(data) {
                  console.log("data error");
              }
            });*/
    });
    /*$("#downloadBr").submit(function(e) {

   
    $.ajax({
           type: "POST",
           url: url,
           data: $("#downloadBr").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert('error'); // show response from the php script.
           }
           error:function(data) {
              alert('success'); 
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});*/

</script>
<script type="text/javascript" src="register/materialize.min.js"></script>
<script type="text/javascript" src="register/jquery.validate.min.js"></script>
<script type="text/javascript" src="register/additional-methods.min.js"></script>