<!DOCTYPE html>
<html>
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
    height:300px;
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
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
  }
  section{
    padding: 50px;
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


</head>
<body>

<?php include('header.php'); ?>

<section>

  <!--for demo wrap-->
  <h1 style="text-align:center;">Nos partenaires</h1>

  <form class="form-inline">
    <div class="form-group">
      <label for="exampleInputName2">Name</label>
      <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail2">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
    </div>
    <button type="submit" class="btn btn-default">Send invitation</button>
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
    <table cellpadding="0" cellspacing="0" border="0" id="myTable">
      <tbody>
        <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr> <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr> <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr> <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr> <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr> <tr>
          <td>Abdelwahab LEMSEFFER</td>
          <td>301 bd Ghandi, 20390 Casablanca</td>
          <td>05 22 98 55 02</td>
          <td>Médecin</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Clinique Ghandi</td>
          <td>54 bd Ghandi, Casablanca</td>
          <td>05 22 36 74 05</td>
          <td>Clinique</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
        <tr>
          <td>Oumbox</td>
          <td>77bis bd Abdelmoumen, Casablanca. Sur RDV</td>
          <td>05 22 22 58 50</td>
          <td>Points de retrait</td>
          <td><button type="button" class="btn btn-primary">Localiser</button></td>
        </tr>
       
      </tbody>
    </table>
  </div>
</section>



<div class="row">
  <div><iframe class="col-md-12"  height="500px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.9964799260239!2d-7.625237066526706!3d33.57971483992227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2b11a0f11d5%3A0x1ca6d976ea310f70!2sOUMBOX!5e0!3m2!1sfr!2sfr!4v1492113064260"></iframe></div>
</div>
  
  
<?php include('footer.php'); ?>
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
</script>

</body>
</html>
