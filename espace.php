<!DOCTYPE html>
<html>
<head>
<title>Oumbox</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/css/blogStyle.css"> -->

  
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/component.css"> -->
<!-- header -->
<link rel="stylesheet" type="text/css" href="css/header.css">   
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
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
</style>
</head>
<body>

    <!-- <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> -->
    <?php include('header.php'); ?>
    <div class="container">
        <h2>Espae client</h2>
        <p class="lead">Bienvenu dans votre espace client <?php echo $_SESSION["nom"];?></p>
        <div class="row">
            <div class="col-sm-3">
                <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                  <li class="active"><a href="#vtab1" data-toggle="tab">Acceuil</a></li>
                  <li><a href="#vtab2" data-toggle="tab">Commander ma box</a></li>
                  <li><a href="#vtab4" data-toggle="tab">Historique de mes commandes</a></li>
                  <li><a href="#vtab3" data-toggle="tab">Mon Profil</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                        <h3>Acceuil</h3>
                        <p>
                            Vous êtes éligible à aucune Box.
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="vtab2">
                        <h3>Commander ma box</h3>
                        <p>
                        Désolé vous n'êtes éligible à aucune box
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                        <h3>Mon profil</h3>
                        <p>
                            
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="vtab4">
                        <h3>Mes commandes</h3>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start: Footer -->
    <?php //include('footer.php') ?>
    <!-- end: Footer -->
<script src="assets/js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
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
    });
</script>
</body>
</html>