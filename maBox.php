<?php 
session_start();
if(isset($_SESSION['eligibleToBox']) and $_SESSION['eligibleToBox']==0){
  header('Location:boxReady.php');
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
    @media (max-width: 767px) {
      .coordonnee{
        height: 150px;
      }
    }
  </style>

</head>
<body>

<div class="register">
  <?php include('maBox-content.php'); ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>