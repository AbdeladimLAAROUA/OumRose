<?php
  /*echo $today = date("ymd");*/
  // Date d'aujourd'hui
  /*$today = new DateTime(date('Y-m-d'));
  
  
  /*$today2 = new DateTime(date('Y-m-d'));*/

  /*$dateInSixMonth = $today->add(new DateInterval('P9M'));*/
  /*
  $naissance =  new DateTime('2017-7-20');


  $interval = date_diff($today, $naissance);


  $diffJours =  $interval->format('%R%a days');

  if($diffJours>0 && $diffJours<92){
      echo "box1 :".$diffJours;
  }
  else if($diffJours<0 && $diffJours>-92){
      echo "box2 : ".$diffJours;
  }
  else if($diffJours<-183 && $diffJours>-276){
      echo "box3 : ".$diffJours;  
  }else{
    echo "aucune box";
  }*/
/*  //Ajout de 3 mois sur la date d'aujourd'hui
    $dateInThreeMonth = $today->add(new DateInterval('P3M'));
*/
/*
  $khalid['a']="b";
  $khalid['b']="c";
  echo json_encode($khalid);*/



/*  require_once('Logging.php');

  $log = new Logging();

  // set path and name of log file (optional)
  $log->lfile('mylog.txt');

  // write message to the log file
  $log->lwrite('Test message1');
  $log->lwrite('Test message2');
  $log->lwrite('Test message3');

  // close log file
  $log->lclose();
  */

  /*require('tools/mailin.php');
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","YUAxmzIyZSO4EJw9");
    $data = array( "email" => "salimelqalbfz@gmail.com","listid" => array(34));
  var_dump($mailin->get_user($data));*/


  


 /* require('tools/mailin.php');
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","YUAxmzIyZSO4EJw9");
  $data = array( "email" => "khalid.essalhi8@gmail.com",
        "attributes" => array("GYNECO"=>"none"),
        "listid" => array(34)
    ); 
    var_dump($mailin->create_update_user($data));*/

  
/*  function notification_email ($data){
    
        $semi_rand = md5(time());
        $mime_boundary = "Oumbx_Mpart_Bound_x{$semi_rand}x";
        $headers= "Sender: khalid.essalhi8@gmail.com\n";
//      $headers.= "Return-Path: lead@dclabs.fr\n";
        $headers.= "From: khalid.essalhi8@gmail.com\n";

        $headers .= "MIME-Version: 1.0\n" .
             "Content-Type: text/html; charset=UTF-8;format=flowed\n" .
                 "Content-Transfer-Encoding: 8bit\n".
                                 "X-Mailer: PHP\n".
                                 " boundary=\"{$mime_boundary}\"";
        $message="<html><table>";
       foreach ($data as $key => $value) {
        $message.="<tr><td>".$key."</td><td>".$value."</td></tr>";
    }
        $message.="</table></html>";
  
    $subj = "[Formulaire CSS] Nouvelle inscription";
    $to ="khalid.essalhi8@gmail.com,khalid.essalhi8@gmail.com,khalid.essalhi8@gmail.com";
    $ok = mail($to, $subj, $message, $headers);
    return $ok;
}

  $data["nom"]="khalid";
  notification_email($data);*/

  /*$emailFrom = "khalid.essalhi8@gmail.com"; // match this to the domain you are sending email from
$email = "khalid.essalhi8@gmail.com";
$subject = "Email Request";
$headers = 'From:' . 'khalid' . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Return-path: " . $email;
$message = "Your password is ".'password'.".";
mail($email, $subject, $message, $headers);*/
?>
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
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
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBrZqwoiE2SFo32PmyTGZo3D-jvfw5Y10&callback=initMap">
    </script>
  </body>
</html> -->

<!DOCTYPE html>
<html>
<head>
  <title></title>
 
</head>
<body>
  <form class="form-signin" role="form">
             <div id="status"></div>
         <h2 class="form-signin-heading">User Registration</h2>
         
         <label for="inputFname" class="sr-only">First Name</label>
             <input type="text" id="inputFname" class="form-control" placeholder="First Name" required autofocus>
         
         <label for="inputLname" class="sr-only">First Name</label>
             <input type="text" id="inputLname" class="form-control" placeholder="Last Name" required >
             
         <label for="inputEmail" class="sr-only">Email address</label>
         <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required >
         
         <label for="inputPassword" class="sr-only">Password</label>
         <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
         <div class="checkbox">
           <label>
             <input type="checkbox" value="remember-me"> Remember me
           </label>
         </div>
         
         <button class="btn btn-sm btn-primary btn-block" type="submit">Sign Up</button> <button class="btn btn-sm btn-primary btn-block" onclick="_login();" type="submit">Sign Up using Facebook</button>
       </form>

        <script>
  // Load the SDK asynchronously
  (function(thisdocument, scriptelement, id) {
    var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
    if (thisdocument.getElementById(id)) return;
    
    js = thisdocument.createElement(scriptelement); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js"; //you can use 
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
    
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '143410559536671', //Your APP ID
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // These three cases are handled in the callback function.
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };
    
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      _i();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }  
  
  function _login() {
    FB.login(function(response) {
       // handle the response
      console.log(response);
       if(response.status==='connected') {
        _i();
       }
     }, {scope: 'public_profile,email'});
 }
 
 function _i(){
     var url = '/me?fields=gender,first_name,last_name,email';
     FB.api(url, function(response) {

        console.log(response);
        document.getElementById("inputFname").value = response.first_name;
        document.getElementById("inputLname").value = response.last_name;
        document.getElementById("inputEmail").value = response.email;
    });
 }

</script>
</body>
</html>