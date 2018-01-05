<?php
session_start();
if(!isset($_SESSION['UserId'])){
  header('Location: ./login.php');
}

  /*header('Location: http://localhost/oumbox/gestion/#/allCommande');*/
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html ng-app="tutoApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#FF66CC" />
  <title>Oumbox | Admin</title>
    <!-- favicon -->
  <link rel="shortcut icon" href="../img/icons/fav.ico" />

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="dist/css/popup.css">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->

    <a id="main" href="#main" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">O-B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Oumbox</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/default-avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Khalid ESSALHI</p>
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#gestionClient" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Chercher...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <?php if ($_SESSION['role_a']=='admin'){
        ?>
          <li class="active"><a href="#main"><i class="fa fa-link"></i> <span>Tableau de bord</span></a></li>

        <?php } ?>
       <!--  <li><a href="#listClient"><i class="fa fa-link"></i> <span>Clients</span></a></li> -->


          <?php if ($_SESSION['role_a'] == 'user') { ?>
              <li><a href="#gestionClient">Trouver la maman</a></li>
          <?php } ?>

          <?php if ($_SESSION['role_a'] == 'admin' or $_SESSION['role_a'] == 'mgr') { ?>
          <li class="treeview">
              <a href=""><i class="fa fa-link"></i> <span>Membres</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#membersEnabled">Membre activé</a></li>
                  <li><a href="#membersDisabled">Membre désactvié</a></li>
              </ul>
          </li>
          <?php } ?>

          <?php if ($_SESSION['role_a'] == 'admin'){?>
          <li class="active"><a href="#findMembers"><i class="fa fa-link"></i> <span>Trouver des membres</span></a></li>
           <?php } ?>

      <!--   <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#listClient">Tous les clients</a></li>
            <li><a href="#eligibleBox1">Eligible box 1</a></li>
            <li><a href="#eligibleBox2">Eligible box 2</a></li>
            <li><a href="#eligibleBox3">Eligible box 3</a></li>
          </ul>
        </li> -->

         <?php if ($_SESSION['role_a']=='admin' or $_SESSION['role_a']=='mgr') { ?>
        <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span>Commandes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#allCommande">Toute les commandes</a></li>
            <li><a href="#commandeSB">Speed box</a></li>
            <li><a href="#commandeLD">Livraison à domicile</a></li>
            <li><a href="#commandeOX">Livraison Oumbox</a></li>
            <li><a href="#cliniques">Livraison Cliniques</a></li>
          </ul>
        </li>


        <?php } ?>
        

        <?php if ($_SESSION['role_a']=='mgr') { ?>
          <!--<li><a href="#commandeSB"><i class="fa fa-link"></i> <span>Speed box</span></a></li>
          <li><a href="#commandeLD"><i class="fa fa-link"></i> <span>Livraison à domicile</span></a></li>
          <li><a href="#commandeOX"><i class="fa fa-link"></i> <span>Livraison Oumbox</span></a></li>-->
          
        <?php } ?>

        <?php if ($_SESSION['role_a']=='admin') { ?>
         <!-- <li><a href="#listBaby"><i class="fa fa-link"></i> <span>Liste des bébés</span></a></li>-->
        <?php } ?>
         
         <?php if ($_SESSION['role_a']=='admin') { ?>
       <!-- <li><a href="#listArticle"><i class="fa fa-link"></i> <span>Liste des articles</span></a></li>-->
        <?php } ?>

          <?php if ($_SESSION['role_a'] == 'admin') { ?>
              <li><a href="#listPartners"><i class="fa fa-link"></i> <span>Liste des partenaires</span></a></li>
          <?php } ?>

        <?php if ($_SESSION['role_a']=='admin') { ?>
        <li><a href="#gestionBlog"><i class="fa fa-link"></i> <span>Gestion du Blog</span></a></li>
        <?php } ?>

        <?php if ($_SESSION['role_a']=='admin2') { ?>
        <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span>Achats</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#listCommande">Liste des Comamandes</a></li>
            <li><a href="#">Liste des Livraisons</a></li>
          </ul>
        </li>
        <?php } ?>
        <li><a href="lib/logout.php"><i class="fa fa-link"></i> <span>Déconexion</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div ng-view></div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<!-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- Angular -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
<!-- Include jQuery Popup Overlay -->
<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>

<script src="dist/js/helper.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<?php
if($_SESSION['role_a']=='mgr' or $_SESSION['role_a']=='user'){
?>
<script type="text/javascript">
        $("#main").attr("href", "#gestionClient");
        var href = $('#gestionClient').attr('href');
        window.location.href = "#gestionClient";

</script>
<?php
}
?>
</body>
</html>
