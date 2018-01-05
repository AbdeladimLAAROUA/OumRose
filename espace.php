<?php
    include('gestion/lib/util.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Oumbox</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="gestion/plugins/datepicker/datepicker3.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/css/blogStyle.css"> -->

  
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/component.css"> -->
<!-- header -->
<link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.min.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/demo.css" />
   
<link rel="stylesheet" href="css/login2.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link href="css/style.css" rel="stylesheet">

<style type="text/css">
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
    color: #fff;
    background-color: #c26faa;
}
.edit-client-div{
    margin-bottom: 20px;
    font-size:15px;
}
#updateForm{
    margin-top: 25px;
}
.espace {
    margin-top: 25px;
}

.table{
    font-size: 15px;
}
.hide-me{
    display: none;
}
.alert-info, .information {
    background-image: none;
    background-color: #d9edf7;
    color: #31708f;
    border-color: #9acfea;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-width: 1px;
    border-style: solid;
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
.row div.col-md-12{
    border: solid 1px #9c4691;
    padding: 13px;
    margin-bottom: 20px;
    border-radius: 10px;
}
.content p, .content ul li{
    margin-left: 30px !important;
    font-size: 18px;
    line-height: 35px;
}
input[type="submit"]{
    float: right;
    background: #df5b79 ;
    margin-left: 10px;
}
h2 ul li:nth-child(1) {
    /*color:#ec7f8c;*/
    margin: 20px;
    border-bottom: solid 2px;
    display: inline-block;
}
h2 ul li:nth-child(2) {
    /*color:#ec7f8c;*/
    font-size: 20px;
}
h2 ul li:nth-child(3) {
    color:#6fc7c2;
    font-size: 20px;
}
h2 ul li:nth-child(4) {
    color:#8e6cac;
    font-size: 20px;
}
#edit .row{
    margin: 10px 10px;
}
#edit_prenom,#edit_sexe,#edit_naissance,#edit_gyneco,#edit_maternite{
    display: block;
    /*width: 100%;*/
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px !important;
}
#edit label{
    padding-top: 6px;
}
</style>
<style type="text/css">
.nav-tabs-dropdown {
  display: none;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.nav-tabs-dropdown:before {
  content: "\e114";
  font-family: 'Glyphicons Halflings';
  position: absolute;
  right: 30px;
}

@media screen and (min-width: 769px) {
  #nav-tabs-wrapper {
    display: block!important;
  }
}
@media screen and (max-width: 768px) {
    .nav-tabs-dropdown {
        display: block;
    }
    #nav-tabs-wrapper {
        display: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        text-align: center;
    }
   .nav-tabs-horizontal {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
   }
    .nav-tabs-horizontal  > li {
        float: none;
    }
    .nav-tabs-horizontal  > li + li {
        margin-left: 2px;
    }
    .nav-tabs-horizontal > li,
    .nav-tabs-horizontal > li > a {
        background: transparent;
        width: 100%;
    } 
    .nav-tabs-horizontal  > li > a {
        border-radius: 4px;
    }
    .nav-tabs-horizontal  > li.active > a,
    .nav-tabs-horizontal  > li.active > a:hover,
    .nav-tabs-horizontal  > li.active > a:focus {
        color: #ffffff;
        background-color: #428bca;
    }
}
}

</style>
<style type="text/css">
    div.loginpanel div.txt label:before{
    top: 10px !important;
}
</style>
</head>
<body>

    <!-- <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> -->
    <?php include('header3.php'); ?>
    <div class="container espace">
        <h2>Espace membre</h2>
        <?php 
            if(isset($_SESSION["nom"])){
                include('espace_client.php');
            }else{
                echo "Veuillez vous connecter pour accèder à votre espace membre ";
                echo '<a href="login.php">S\'identifier</a>';
            }

        ?>
    </div>

    <!-- start: Footer -->
    <?php //include('footer.php') ?>
    <!-- end: Footer -->
<script src="assets/js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.nav-tabs-dropdown').each(function(i, elm) {
        $(elm).text($(elm).next('ul').find('li.active a').text());
    });
      
    $('.nav-tabs-dropdown').on('click', function(e) {
        e.preventDefault();
        $(e.target).toggleClass('open').next('ul').slideToggle();

    });

    $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {
        e.preventDefault();
        $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
         $('#alert_recover_ok_edit_maman').css('visibility','hidden');
         $('#alert_recover_ko_edit_maman').css('visibility','hidden');
    });
</script>
</body>
</html>