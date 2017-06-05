<!DOCTYPE html>
<html  ng-app="oumbox">
<head>
<meta charset="utf-8"/>
<style>

    
        <style>
        
  h1{
    font-size: 30px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
  }
  table{
    width:100%;
    table-layout: fixed;
  }
  .tbl-header{
    background-color: rgba(255,255,255,0.3);
   }
  .tbl-content{
    height:510px;
    overflow-x:auto;
    margin-top: 0px;
    border: 1px solid rgba(255,255,255,0.3);
  }
  th{
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
  }
  td{
    padding: 15px;
    text-align: left;
    vertical-align:middle;
    font-weight: 300;
    font-size: 12px;
    color: #fff;
    border-bottom: solid 1px rgba(255,255,255,0.1);
  }


  /* demo styles */


  body section{
   /* background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);*/
    background: linear-gradient(40deg,#df5b79, #7e669b);
    font-family: 'Roboto', sans-serif;
  }
  section{
    padding: 50px;
  }


  /*map style*/

    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .partenaires h1{
        margin: 30px;
      }
      .searchPartner{
        margin: 10px 5px;
      }
      .searchPartner input{
        height: 30px !important;
        width: 99%;
      }
      .searchPartner label{
       color: white;
      }
      .searchPartner select{
        height: 30px !important;
        width: 99%;
      }
      .searchPartner {
        height: 60px !important;
      }
      .searchPartnerList button{
        background: #6cc;
        width: 95%;
        margin: auto;
       
      }
      .partenaires .description{
        width: 68%;
        color: white;
        margin: auto;
        margin-bottom: 30px;
        font-size: 15px;
      }
      .searchPartnerList td{
      
      }
      .separ1{
        height: 40px;
        background: #6cc;
      }
      .separ2{
        height: 40px;
        background: #c36eaa;
      }
  /* for custom scrollbar for webkit browser*/

  ::-webkit-scrollbar {
      width: 6px;
  } 
  ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  } 
  ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  }
</style>
  
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- header -->
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body ng-controller="oumboxController">

<?php include('header3.php'); ?>


<section class="partenaires">

  <!--for demo wrap-->
  
  <!-- <div style="text-align:center;"> <img src="img/logo.png"/></div> -->
  <h1 style="text-align:center;">Nos partenaires</h1>
  <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua.</p>

  <form class="searchPartner">
   
     <div class="row">
        <div class="col-md-3">
           <label for="exampleInputName2">Nom</label>
        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" > 
        </div>

       <div class="col-md-3">
         <label for="exampleInputName2">Adresse</label>
         <input type="text" class="form-control" id="adresse" onkeyup="myFunction2()">
       </div>
       <div class="col-md-3">
         <label>Ville</label>
         <select id="ville" onchange="myFunction3()">
           <option>--</option>
           <option value="Casablaca">Casablaca</option>
           <option value="Rabat">Rabat</option>
           <option value="Tanger">Tanger</option>
         </select>

       </div>
       <div class="col-md-3">
        <label>Type</label>
         <select>
           <option>--</option>
           <option>Médedin</option>
           <option>Clinique</option>
           <option>Point de retrait</option>
         </select>
       </div>       
     </div>
     
     

    
    
  </form>

  <div class="tbl-header" style="padding-right: 6px;">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Adresse</th>
          <th>Fixe</th>
          <th>Type</th>
          <th>Localiser</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0" id="myTable" class="searchPartnerList">
      <tbody>
        <tr ng-repeat="partenaire in partenaires" >
          <td>{{partenaire.Name}}</td>
          <td>{{partenaire.adresse}}</td>
          <td>{{partenaire.fixe}}</td>
          <td>{{partenaire.type}}</td>
          <td><button type="button" class="btn btn-primary" scroll-On-Click="{{ $index }}" > Localiser</button></td>
        </tr>       
      </tbody>
    </table>
  </div>
</section>

<!-- <div class="row myMap">
  <div><iframe class="col-md-12"  height="500px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.9964799260239!2d-7.625237066526706!3d33.57971483992227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2b11a0f11d5%3A0x1ca6d976ea310f70!2sOUMBOX!5e0!3m2!1sfr!2sfr!4v1492113064260"></iframe></div>
</div> -->

<div class="separ1">Trouver notre partenaire le plus proche de vous </div>
<!-- <div class="col-md-6">
  nom : <br/>
  adresse : <br/>
  type : <br/>
</div> -->
<div id="map" ></div>
<div class="separ2"></div>
    
  
<?php include('footer.php'); ?>
    <script>

      function initMap() {
        var myLatLng = {lat: 33.5687931, lng: -7.6455561};
        
        var myLatLng2= {lat:33.5688719, lng:-7.6454603};
       
       


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
        
        var marker2 = new google.maps.Marker({
          position: myLatLng2,
          map: map,
          title: 'Hello World!'
        });

      }
    </script>
    
   
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript">

  $(".btn").click(function() {

      $('html,body').animate({
          scrollTop: $("#map").offset().top},
          'slow');
  });
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var adresse, filter, table, tr, td, i;
  adresse = document.getElementById("adresse");
  filter = adresse.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction3() {

  /*var ville, filter, table, tr, td, i;
  ville = document.getElementById("adresse");

  filter = ville.value.toUpperCase();
  console.log(filter);
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }*/
}
</script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBrZqwoiE2SFo32PmyTGZo3D-jvfw5Y10">
    </script>
    <script src="js/oumbox.js"></script>
    
</body>
</html>
