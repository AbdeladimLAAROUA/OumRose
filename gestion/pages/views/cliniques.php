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
    <small>Livraison clinique</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#main"><i class="fa fa-dashboard"></i>Tableau de bord</a></li>
    <li class="active">Livraison clinique</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Livraison clinique</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           <div style="margin-bottom:20px;">
            <button id="export_CL_cmd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Export</button>
          </div>
          <table id="table_commandesCL" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id Maman</th>
              <th>Id Commande</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Maternité</th>
              <th>Box</th>
              <th>GSM 1</th>
              <th>Naissance Bébé</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
            <tr>
              <th>Id Maman</th>
              <th>Id Commande</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Maternité</th>
              <th>Box</th>
              <th>GSM 1</th>
              <th>Naissance Bébé</th>
              <th>Date</th>
              <th>Status</th>
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
  
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Les details du client</h4>
      </div>
      <div class="modal-body">
         <div id="alert_recover_box_ok" class="alert alert-success hide-me">
          La commande a été effectué avec succès 
        </div>
        <div id="alert_recover_box_ko" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>
        <input type="hidden" id="roleInput" value="<?php echo $_SESSION['role_a']; ?>">
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>ID</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="id_client" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-2">
            <div class="form-group">
              <label>E-mail</label>
            </div>
          </div>
          <div class="col-xs-4">
            <span id="email" class="form-group infos_client text-blue"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Prénom</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="prenom" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label>Nom</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="nom" class="form-group infos_client text-blue"></span>
          </div>
        </div> 
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>GSM</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="gsm" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label>Naissance</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="naissance" class="form-group infos_client text-blue"></span>
          </div>
        </div> 
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Adresse</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="adresse" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label>CP</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="CP" class="form-group infos_client text-blue"></span>
          </div>
        </div>   
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Type maman</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="type" class="form-group infos_client text-blue"></span>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label>Ville</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="Ville_id" class="form-group infos_client text-blue"></span>
          </div>
        </div>   
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label>Date de création</label>
            </div>
          </div>
          <div class="col-xs-3">
            <span id="creationDate" class="form-group infos_client text-blue"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Liste des Bébés</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="baby_table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Prenom</th>
                      <th>Sexe</th>
                      <th>Naissance</th>
                      <th>Maternité</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div><div class="row">
          <div class="col-xs-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Liste des commandes</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="box_table" class="table table-bordered">
                  <thead>
                    <tr>
                     <!--  <th style="width: 10px"></th> -->
                      <th>Box 1 </th>
                      <th>Box 2</th>
                      <th>Box 3</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>


        <!-- Ajouter une nouvelle commande -->
        <form id="AddCommandeForm" hidden>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-success btn-lg addCommandeButton" style="width: 100%;margin-bottom: 10px;"><span class="glyphicon"></span>Commander la box</button>
            </div>
          </div>
        </form>

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
  <div class="modal-dialog" style="width: 700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Modifier commande</h4>
      </div>
      <div class="modal-body">
        <div id="alert_recover_ok" class="alert alert-success hide-me">
          Modifications effectées
        </div>
        <div id="alert_recover_ko" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>
        <form id="edit_commande_form">
        <input type="hidden" value="id_commande_edit"/>
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label>Id commande</label>
              </div>
            </div>
            <div class="col-xs-3">
              <span id="id_commande_edit" class="form-group infos_client text-blue"></span>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label>Id maman</label>
              </div>
            </div>
            <div class="col-xs-3">
              <span id="id_client_edit" class="form-group infos_client text-blue"></span>
            </div>
            
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>type</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <select id="type_commande_edit" class="form-control">
                <option value="1">Oumbox</option>
                <option value="2">SpeedBox</option>
                <option value="3">Livraison à domicile</option>
              </select>
            </div>


             <div class="col-xs-2">
              <div class="form-group">
                <label>Status</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <select id="status_commande_edit" class="form-control">
                <option value="1">Livré</option>
                <option value="2">Non livré</option>
              </select>
            </div>


           
          </div> 
          <div class="row">
           <div class="col-xs-2">
              <div class="form-group">
                <label>Ville</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <select id="ville_commande_edit" class="form-control">
              </select>
            </div>

            <div class="col-xs-2">
              <div class="form-group">
                <label>Relais</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <select id="relais_commande_edit" class="form-control">
              </select>
            </div>
          </div>   
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Quartier</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <select id="quartier_commande_edit" class="form-control">
              </select>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Adresse</label>
              </div>
            </div>
             <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <div class="input-group">
                  <!-- <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div> -->
                <input id="adresse_commande_edit" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="invalid" >
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>   
         <!--  <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Date de création</label>
              </div>
            </div>
            <div class="col-xs-4">
              <span id="creationDate_edit" class="form-group infos_client text-blue"></span>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Réf box 1</label>
              </div>
            </div>
            <div class="col-xs-4">
              <span id="creationDate_edit" class="form-group infos_client text-blue"></span>
            </div>
          </div> -->
          <div class="row">
            <div class="col-xs-12">
              <button type="submit"  class="btn btn-warning btn-lg" style="width: 100%;margin-bottom: 10px;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
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

<!-- Add content to the popup -->
<div id="loading-image" class="row">
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
if ($_SESSION['role_a']=='mgr') { 
  echo '<script src="dist/js/livraison.js" data-role="mgr"></script>';
}else if($_SESSION['role_a']=='admin'){
   echo '<script src="dist/js/livraison.js" data-role"admin"></script>';
}else{
   echo '<script src="dist/js/livraison.js" data-role"admin"></script>';
}
?>
