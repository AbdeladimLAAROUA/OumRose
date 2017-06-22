<?php
session_start();
include('config.php');
$user=getClientByToken($conn,$_GET['token']);
$_SESSION['email_c']=$user['email'];
if($user==null){
  header('Location:/');
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Oumbox</title>
  
    <link rel="shortcut icon" href="img/icons/fav.ico" />

    <!-- start: CSS -->
    
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
  <link rel="stylesheet" type="text/css" href="css/header.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- end: CSS -->

   <script src="js/movieModernizr.js"></script>
  
   <link rel="stylesheet" href="css/login.css">
</head>

<body>
    
  <?php include('header3.php'); ?>
  <div class="myLogin">
      
      <h2>Saisissez votre nouveau password</h2>
           <div class="content">
            <div class="loginpanel">
            <div class="beforeReset">
              <div class="txt">
              <input id="pwdReset" name="password" type="password" placeholder="Nouveau password" />
              <label for="pwdReset" class="entypo-lock"></label>
            </div>
            <div class="txt">
              <input id="pwdResetConf" name="passwordConf" type="password" placeholder="Confirmation" />
              <label for="pwdResetConf" class="entypo-lock"></label>
            </div>
            <p class="text-center error">
              <?php 
                if (isset($_SESSION['errorRegisterByEmail'])) {
                  echo $_SESSION['errorRegisterByEmail'];
              session_unset($_SESSION['errorRegisterByEmail']);
                }
               ?>
            </p>
            <div class="buttons">
              <input type="submit" value="Réinitialiser" id="connect" />
            </div>    
            </div>
            <div class="afterReset" hidden style="color: white;font-weight: bold;">
             <div style="padding: 30px;">Votre mot de passe a été bien modifié</div>
             <button type="button" class="btn btn-primary" style="background: #6cc;padding: 10px 50px;border-color: #dd7ea0;" OnClick="window.location.href='login.php'">S'identifier</button>
           </div>
           </div>
           
          </div>
      
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript" src="js/header.js"></script>
  <script type="text/javascript">
  /* $(".afterReset").hide();*/
    $("#connect").click(function() {

      if(checkform()){
        $.ajax({
          url:'user/changePassword.php',
          type:'POST',
          dataType: "json",
          data:{pwdReset:$("#pwdReset").val()},
          success: function(data) { 
            console.log(data);
            if(data['code']=="1" || data['code']=="3"|| data['code']=="0"){
              //$(".content").hide();
            //  $(".error").html(data['response']);

            }
            $(".beforeReset, h2").fadeOut(1000,function(){
                   $(".afterReset").fadeIn(1000);
            });
            
          },
          error: function(data){
            console.log("error "+data);
          }
        });
      }
      
    });
    function checkform() {
        if($("#pwdReset").val() == ""){
          $(".error").html("Le password est obligatoire");
           return false;
        }else if($("#pwdReset").val() != $("#pwdResetConf").val()){
          $(".error").html("Password incorrect");
           return false;
        }else{
          return true;
        }
       
    }
   
  </script>
<?php include('footer.php'); ?>
</body>
</html>
