
<?php 
	if($_POST['type_livraison']=="SB")
	{
 ?>
<div class="row content1" id="content" >
    <h1 class="text-center">SpeedBox</h1>
    <div class="col-md-7 col-xs-12  left-alert" id="myForm" novalidate="novalidate">
      <ul class="collapsible collapsible-expandable" data-collapsible="expandable">
       <li class="active maman">
        <div class="collapsible-header pink lighten-2 white-text waves-effect waves-light active">Choisissez le point relais le plus proche de vous</div>
        <div class="collapsible-body" style="display: block;">
        <div class="row coordonnee">  

        	 <!-- Liste des villes -->
           <div id="ville" class="input-field col-md-8 col-sm-8 col-xs-12">
              <span class="micons-building prefix"></span>
          <!-- <input id="city" name="VILLE" type="text" pattern=".{3,}" minlength="3" required="required" class="validate" aria-required="true"> -->
            <select  name="VILLE" class="initialized">
            <option value="0" disabled="" selected="">Ville</option>
            <?php  
              include('config.php');
              $villes = getAllCities($conn);
              $relais = getAllRelais($conn);
              foreach ($villes as $key => $infos) { 
            ?>
              <option value="<?php echo $infos['id']; ?>"><?php echo $infos['name']; ?></option>
              <?php } ?>
            </select>
       	   </div>

         <!-- List des points relais -->
        <div id="relais" class="input-field col-md-4 col-sm-4 col-xs-12" hidden>
              <select id="relaisList" name="relaisList" class="initialized">
                <option value="0" disabled="" selected="">Point relais</option>
                <?php  
                  foreach ($relais as $key => $infos) { 
                ?>
                  <option id="<?php echo "relais".$infos['id_relais']; ?>" class="<?php echo "ville".$infos['id_ville']; ?>" value="<?php echo $infos['id']; ?>"><?php echo $infos['nom']; ?></option>
                  <?php } ?>
              </select>
         </div>

         <!-- Adresse du point relais -->
         <div id="adresseRelais" class="input-field col-md-12" style="color: #9e9e9e;font-size: 1rem;" hidden>
           <p></p>
           <?php  
             foreach ($relais as $key => $infos) { 
           ?>
             <p class="text-center <?php echo "relais".$infos['id']; ?>" value="<?php echo $infos['id']; ?>" >Adresse : <?php echo $infos['adresse']; ?></p>
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
    <h1 class="text-center">Livraison à domicile</h1>
    <div class="col s12 m7 offset-m2 left-alert" id="myForm" novalidate="novalidate">
      <ul class="collapsible collapsible-expandable" data-collapsible="expandable">
       <li class="active maman">
        <div class="collapsible-header pink lighten-2 white-text waves-effect waves-light active"> Choisissez le quartier le plus proche de vous</div>
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
              $quartiers = getAllQuartiers($conn);
              foreach ($quartiers as $key => $infos) { 
            ?>
              <option value="<?php echo $infos['id']; ?>"><?php echo $infos['nom']; ?></option>
              <?php } ?>
            </select>
       	   </div>

         <!-- List des points relais -->
        <div id="adresseClient" class="input-field col s12">
              <label>Adresse de livraison</label><input type="text"/>
         </div>

         <!-- Adresse du point relais -->
         <div id="adresseRelais" class="input-field col s12" style="color: #9e9e9e;font-size: 1rem;" >
             <div class="text-center">
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
		    	Votre demande a été envoyé avec succès.
		    </h3>
		    <p class="text-center">
		    	Détails de votre commande : 
		    </p>

		    <div class="commandeDetails">
		    	<div class="row"><div class="col-md-6">Client :</div><div class="infoLivraison"> Nom prénom</div></div>
		    	<div class="row"><div class="col-md-6">Type de livraison :</div><div class="infoLivraison" >SpeedBox</div></div>
		    	<div class="row"><div class="col-md-6">Ville :</div><div class="infoLivraison">Casablanca</div></div>
		    	<div class="row"><div class="col-md-6">Point relais :</div><div class="infoLivraison">Sidi Maarouf</div></div>
		    </div>
		    

		    </span></p>
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
  
  $('select[name=VILLE]').change(function() { 
    
    //val = id ville 
    var id ;
    if($(this).val()>0){

      id = $(this).val();
       //Afficher la liste des points relais 
      $("#relais").removeAttr( "hidden" );
      

      //Afficher tous les points relais existant
      $("#relais ul li").removeAttr( "hidden" );
      $("#relaisList option").removeAttr( "hidden" );

      //cacher l'adresse
      $("#adresseRelais").attr( "hidden", "" );


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
         for (var i = 1; i < json['result'].length; i++) {

            var myLatLng = {lat: parseFloat(json['result'][i].gps_lat), lng: parseFloat(json['result'][i].gps_lng)};


            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: json['result'][i].nom
            });
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
    if($(this).val()>0){
      id_relais=$(this).val();
      $("#adresseRelais").removeAttr( "hidden" );
      $('#adresseRelais p').removeAttr( "hidden" );
      $('#adresseRelais p').not("#adresseRelais p.relais"+$(this).val()).attr("hidden","");
    } 
  });


  $("button.send1").click(function(){
   	var myQuartier = "NULL";
   	var myAdresse = "NULL";
   	var livraison = {livraison:{type:'SB',quartier:myQuartier,relais:id_relais,adresse:myAdresse},methode:'addLivraison'};
   	$.ajax({
   		url:'gestion/lib/util.php',
   		type:'POST',
   		data:livraison,
   		success: function(data){
   			$( ".content1" ).fadeOut( "slow", function() {
   			    	$( ".content3" ).fadeIn("slow");
   			  });
   		},
   		error : function(data){
   			console.log(data);
   		}
   	});
  });
   $("button.send2").click(function(){
  	var myQuartier = $("#quartiersCasablanca ul li.active").text();
  	var myAdresse = $("#adresseClient input").val();
  	var livraison = {livraison:{type:'LD',quartier:myQuartier,relais:'NULL',adresse:myAdresse},methode:'addLivraison'};
  	$.ajax({
  		url:'gestion/lib/util.php',
  		type:'POST',
  		data:livraison,
  		success: function(data){
  			$( ".content2" ).fadeOut( "slow", function() {
   			    	$( ".content3" ).fadeIn("slow");
   			  });
  		},
  		error : function(data){
  			console.log(data);
  		}
  	});
  });
</script>

<script type="text/javascript" src="register/materialize.min.js"></script>
<script type="text/javascript" src="register/jquery.validate.min.js"></script>
<script type="text/javascript" src="register/additional-methods.min.js"></script>