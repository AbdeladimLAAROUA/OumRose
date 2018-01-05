<?php 
session_start();
 ?>
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<style type="text/css">
.action{
  margin-right: 2px;
}
.hide-me{
  display: none;
}
</style>
<!-- Content Header (Page header) -->



<section class="content-header">
  <h1>
    Oumbox

    <?php if ($_SESSION['role_a']=='admin') { ?>
    <small>Liste des clients</small>
    <?php } ?>

    <?php if ($_SESSION['role_a']=='user') { ?>
    <small>Espace livreur</small>
     <?php } ?>

    <?php if ($_SESSION['role_a']=='mgr') { ?>
    <small>Office manager</small>
     <?php } ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#main"><i class="fa fa-dashboard"></i>Tableau de bord</a></li>
    <li class="active">Liste des clients</li>
  </ol>
</section>


<!-- Main content -->
 <?php if ($_SESSION['role_a']=='admin') { ?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Liste des Clients</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div style="margin-bottom:20px;">
             <button id="createUserByAdmin" type="button" class="btn btn-primary" data-type="createUser" data-toggle="modal" data-target="#createUser"><span class="glyphicon"></span> Nouveau partenaire</button>
          </div>
          <table id="table_clients" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Adresse</th>
              <th>Status</th>
              <th>Type</th>
              <th>Fixe</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
                <th>Adresse</th>
                <th>Status</th>
                <th>Type</th>
                <th>Fixe</th>
                <th>Actions</th>
            </tr>
            </tfoot>
          </table>
           
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
 <?php } ?>

<?php if ($_SESSION['role_a']=='user' or $_SESSION['role_a']=='mgr') { ?>
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Liste des Clients</h3>
        </div>

       <form>
        <div class="form-group has-feedback col-xs-12 col-md-3 col-sm-6">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
              </div>
            <input placeholder="email" id="email_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" >
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div><div class="form-group has-feedback col-xs-12 col-md-3 col-sm-6">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
            <input placeholder="Nom" id="nom_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid">
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div><div class="form-group has-feedback col-xs-12 col-md-3 col-sm-6">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
            <input placeholder="Prénom" id="prenom_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" >
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div><div class="form-group has-feedback col-xs-12 col-md-3 col-sm-6">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
            <input placeholder="GSM" id="gsm_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" >
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div style="margin-bottom:20px;">
            <?php if ($_SESSION['role_a']=='user') { ?>
            <button id="createUserByAdmin" type="button" class="btn btn-success" data-type="createUser" data-toggle="modal" data-target="#createUser"><span class="glyphicon"></span> Nouveau client</button>
            <?php } ?>
            <button id="search" type="submit" class="btn btn-primary" data-type="" data-toggle="" data-target="#createUserr">
              <span class="glyphicon"></span>
              Rechercher
            </button>
          </div>
          <table id="table_clients_search" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>GSM</th>
              <th>Eligible</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>GSM</th>
              <th>Eligible</th>
              <th width="10%">Actions</th>
            </tr>
            </tfoot>
          </table>
        </div>
        </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
 <?php } ?>



<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Les details du partenaire</h4>
      </div>
      <div class="modal-body">
        
         <div id="alert_recover_box_ok" class="alert alert-success hide-me">
          La commande a été effectué avec succès 
        </div>
        <div id="alert_recover_box_ko" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>

        <div id="alert_recover_block_ok" class="alert alert-success hide-me">
          Le membre a été bloqué avec success
        </div>
        <div id="alert_recover_block_ko" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>


        <input type="hidden" id="roleInput" value="<?php echo $_SESSION['role_a']; ?>">
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Nom</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="name" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-2">
            <div class="form-group">
              <label>Adresse</label>
            </div>
          </div>
          <div class="col-xs-4">
            <span id="adresse" class="form-group infos_client text-blue"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Status</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="status" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label>type</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="type" class="form-group infos_client text-blue"></span>
          </div>
        </div> 
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Fixe</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="fixe" class="form-group infos_client text-blue"></span>
          </div>
        </div> 

      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Fermer</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
  
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Modifier partenaire</h4>
      </div>
      <div class="modal-body">
          <form id="editForm">

              <div id="alert_recover_ok" class="alert alert-success hide-me">
                  Modifications effectées
              </div>
              <!--  <div id="alert_block_user_ok" class="alert alert-success hide-me">
                Membre bloqué avec success
               </div> -->
              <div id="alert_recover_ko" class="alert alert-warning hide-me">
                  Quelque chose a mal tourné
              </div>

              <div id="alert_invalid_adresse" class="alert alert-warning hide-me">
                  Adresse invalide !
              </div>
              <div>
                  <div class="row">
                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Nom</label>
                          </div>
                      </div>
                      <div class="col-xs-4">
                          <input id="name_edit" class="form-group infos_client text-blue"></input>
                      </div>
                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Adresse(Google)</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input id="adresseGoogle_edit" class="form-control infos_client"
                                         data-required-error="veuillez renseigner ce champ" data-error="Adresse invalid"
                                         >
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">

                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Adresse</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input id="adresse_edit" class="form-control infos_client"
                                         data-required-error="veuillez renseigner ce champ" data-error="Adresse invalid"
                                         required>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>


                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Status</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <input id="status_edit" type="text"
                                     class="form-control infos_client" data-error="Status invalid"
                                     data-required-error="veuillez renseigner ce champ" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>

                  </div>
                  <div class="row">
                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Fixe</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                  </div>
                                  <input id="fixe_edit" type="tel" class="form-control infos_client"
                                         data-required-error="veuillez renseigner ce champ"
                                         data-error="phone number invalid" required>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>Type</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <input id="type_edit" type="text"
                                     class="form-control infos_client" data-error="Type invalid"
                                     data-required-error="veuillez renseigner ce champ" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>longitude</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa"></i>
                                  </div>
                                  <input id="lng_edit" pattern="^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,30})?))$" class="form-control infos_client"
                                         data-required-error="veuillez renseigner ce champ"
                                         data-error="invalid" required>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>

                      <div class="col-xs-2">
                          <div class="form-group">
                              <label>latitude</label>
                          </div>
                      </div>
                      <div class="form-group has-feedback col-xs-4">
                          <div class="input-group">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa"></i>
                                  </div>
                                  <input id="lat_edit" pattern="^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,30})?))$" class="form-control infos_client"
                                         data-required-error="veuillez renseigner ce champ"
                                         data-error="invalid" required>
                              </div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-xs-12">
                          <button type="submit" id="editFormButton" class="btn btn-primary btn-lg" style="width: 100%;margin-bottom: 10px;"><span
                                      class="glyphicon glyphicon-ok-sign"></span>Modifier
                          </button>
                      </div>
                  </div>
              </div>

          </form>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Supprimer client</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes-vous sûr de vouloir supprimer ce document?</div>
        <div> La supression du client va automatiquement supprimer les bébé associés à ce client !</div>
      </div>
      <div class="modal-footer ">
        <button id="conf_supp" type="button" data-id="0" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Oui</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Non</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>

<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUser" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Créer un nouveau partenaire</h4>
      </div>
      <div class="modal-body">
        <div id="alert_recover_ok_create" class="alert alert-success hide-me">
          le partenaire a été ajouté
        </div>
        <div id="alert_recover_ko_create" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>
        <div id="alert_invalid_adresse" class="alert alert-warning hide-me">
          Adresse invalide !
        </div>
        <form id="createPartnerForm">
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Nom</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="name_create" type="text" class="form-control infos_client" data-error="Nom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Adresse(google)</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="adresse_google" type="text" class="form-control infos_client" data-error="Adresse invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-xs-2">
                  <div class="form-group">
                      <label>Adresse</label>
                  </div>
              </div>
              <div class="form-group has-feedback col-xs-4">
                  <div class="input-group">
                      <input id="adresse_create" type="text" class="form-control infos_client"
                             data-error="Adresse invalid" data-required-error="veuillez renseigner ce champ" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Fixe</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input id="fixe_create" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="phone number invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>


          </div> 
          <div class="row">

          </div>   
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Type</label>
              </div>
            </div>
              <div class="form-group has-feedback col-xs-4">
                  <div class="input-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa"></i>
                          </div>
                          <input id="type_create" value="Gynécologue" class="form-control infos_client"
                                 data-required-error="veuillez renseigner ce champ" data-error="invalid"
                                 required>
                      </div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>

              <div class="col-xs-2">
                  <div class="form-group">
                      <label>Status</label>
                  </div>
              </div>
              <div class="form-group has-feedback col-xs-4">
                  <div class="input-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa"></i>
                          </div>
                          <input id="status_create" value="active" class="form-control infos_client"
                                 data-required-error="veuillez renseigner ce champ" data-error="invalid"
                                 required>
                      </div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                  </div>
              </div>


          </div>

          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;margin-bottom: 10px;"><span class="glyphicon glyphicon-ok-sign"></span>Créer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>

<!-- Add content to the popup -->
<div id="loading-image" class="row" hidden>
  <div class="main col-md-5 col-md-offset-6">
    <div id="cssload-pgloading">
      <div class="cssload-loadingwrap">
        <ul class="cssload-bokeh">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>
<!-- /.content -->

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="dist/js/validator.min.js"></script>



<?php
if ($_SESSION['role_a'] == 'mgr') {
    echo '<script src="dist/js/list_partners.js"  data-role="mgr"></script>';
} else if ($_SESSION['role_a'] == 'admin') {
    echo '<script src="dist/js/list_partners.js"  data-role="admin"></script>';
} else {
    echo '<script src="dist/js/list_partners.js"  data-role="user"></script>';
}
?>
    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?key=AIzaSyCBrZqwoiE2SFo32PmyTGZo3D-jvfw5Y10"></script>
<script type="text/javascript">
</script>