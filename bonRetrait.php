<?php 
session_start();
if(isset($_SESSION['eligibleToBox']) and $_SESSION['eligibleToBox']==0){
  header('Location:espace.php');
}

 ?>
<!DOCTYPE html>
<!-- saved from url=(0018)http://oumbox.com/ -->
<html style="padding-right: 0px;" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
      <meta charset="UTF-8"/>
<title>Oumbox : Le programme gratuit qui chouchoute les mamans</title>
<meta name="description" content="Oumbox, 1er programme gratuit d&#39;accompagnement au Maroc des mamans de la grossesse aux 12 mois de bébé, offre à ses membres des guides, coffrets cadeaux et ateliers thématiques.">
      <!--DNS Prefetch-->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
      <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
      <link rel="dns-prefetch" href="https://cdnjsdelivr.net/">

      
<link rel="apple-touch-icon" sizes="180x180" href="http://oumbox.com/apple-touch-icon.png">
<link rel="icon" type="image/png" href="http://oumbox.com/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="http://oumbox.com/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="http://oumbox.com/manifest.json">
<link rel="mask-icon" href="http://oumbox.com/safari-pinned-tab.svg" color="#00aba9">
<meta name="theme-color" content="#ffffff">

 <!--      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="register/materialize.min.css" media="screen,projection">
      <link type="text/css" rel="stylesheet" href="register/micons.css" media="screen,projection">
       <link rel="stylesheet" href="register/icon" as="style" onload="this.rel=&#39;stylesheet&#39;">
       <link rel="stylesheet" href="register/font-awesome.min.css" as="style" onload="this.rel=&#39;stylesheet&#39;">
        <noscript></noscript>
    <script>
    /*! loadCSS: load a CSS file asynchronously. [c]2016 @scottjehl, Filament Group, Inc. Licensed MIT */
!function(a){"use strict";var b=function(b,c,d){function j(a){return e.body?a():void setTimeout(function(){j(a)})}function l(){f.addEventListener&&f.removeEventListener("load",l),f.media=d||"all"}var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",j(function(){g.parentNode.insertBefore(f,c?g:g.nextSibling)});var k=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){k(a)})};return f.addEventListener&&f.addEventListener("load",l),f.onloadcssdefined=k,k(l),f};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this),function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(a){}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){a.clearInterval(c)})}}}(this);
    </script>
    <link rel="stylesheet" type="text/css" href="register/overrideBootstrap.css"/>

<link href="chrome-extension://pflmllfnnabikmfkkaddkoolinlfninn/style.css" type="text/css" rel="stylesheet">

    
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

   
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/set1.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/style_common.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css"> 
  <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet">
  <!-- end: CSS -->

  <style type="text/css">
    #map {
      height: 300px;
      margin: 0.5rem 0 1rem 0;
    }
    h1{
      margin: 40px;
    }
    .boxReady{
      margin: 50px ;
      line-height: 20px;
    }

    .boxReady div{
      font-size: 2em;
      margin-top: 10px;
      color: #c36eaa;
    }
    .content p, .content ul li{
      margin-left: 30px !important;
      font-size: 18px;
      line-height: 35px;
    }
    .content3,.content4{
      margin: 30px 0px !important;
    }
    .commandeDetails{
      font-size: 25px;
    }
    .content3  p, .content4 p{
      margin-bottom: 40px;
    }
    .infoLivraison{
      color: #c36eaa;
    }
    .infos{
      font-size: 15px;
    font-weight: bold;
    }
    #error{
      margin: 10px;
    }
    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        max-height : 100%;
        width:      100%;
        background: rgba( 255, 255, 255, .5 ) 
                    url('http://sampsonresume.com/labs/pIkfp.gif') 
                    50% 50% 
                    no-repeat;
    }

    /* When the body has the loading class, we turn
       the scrollbar off with overflow:hidden */
    body.loading {
        overflow: hidden;   
    }

    /* Anytime the body has the loading class, our
       modal element will be visible */
    body.loading .modal {
        display: block;
    }
    button.retour{
        float: right;
        background: #df5b79 ;
        margin-left: 10px;
      }
    @media (max-width: 767px) {
      .coordonnee{
        height: 150px;
      }
    }
  </style>

</head>
<body>
<div class="modal"></div>  
<div class="register">
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
         <p class="info downloadSuccess" style="text-align: center;" >Le bon de retrait a été bien téléchargé</p>
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







<script type="text/javascript" src="register/materialize.min.js"></script>
<script type="text/javascript" src="register/jquery.validate.min.js"></script>
<script type="text/javascript" src="register/additional-methods.min.js"></script> 
</div>
<?php include('footer.php'); ?>
</body>
</html>

