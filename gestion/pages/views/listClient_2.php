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
            <button id="export_c" type="button" class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Export</button>
             <button id="createUserByAdmin" type="button" class="btn btn-primary" data-type="createUser" data-toggle="modal" data-target="#createUser"><span class="glyphicon"></span> Nouveau client</button>
          </div>
          <table id="table_clients" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>E-mail</th>
              <th>GSM</th>
              <th>Naissance</th>
              <th>Adresse</th>
              <th>Ville</th>
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
              <th>Prenom</th>
              <th>E-mail</th>
              <th>GSM</th>
              <th>Naissance</th>
              <th>Adresse</th>
              <th>Ville</th>
              <th>Eligible</th>
              <th width="10%">Actions</th>
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

       
        <div class="form-group has-feedback col-xs-12 col-md-3 col-sm-6">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
              </div>
            <input placeholder="email" id="email_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
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
            <input placeholder="Nom" id="nom_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
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
            <input placeholder="Prénom" id="prenom_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
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
            <input placeholder="GSM" id="gsm_search" type="text" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
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
            <button id="search" type="button" class="btn btn-primary" data-type="" data-toggle="" data-target="#createUserr">
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
        <h4 class="modal-title custom_align" id="Heading">Les details du client</h4>
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
	       <form id="blockUserForm" >
	          <div class="row">
	            <div class="col-xs-offset-9 col-xs-3">
	              <button type="submit" class="btn btn-warning btn-lg blockUserButton" style="width: 100%;margin-bottom: 10px;"><span class="glyphicon"></span>Bloquer</button>
	            </div>
	          </div>
	  	  </form>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Modifier client</h4>
      </div>
      <div class="modal-body">
        <div id="alert_recover_ok" class="alert alert-success hide-me">
          Modifications effectées
        </div>
       <!--  <div id="alert_block_user_ok" class="alert alert-success hide-me">
         Membre bloqué avec success
        </div> -->
        <div id="alert_recover_ko" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>
        <form id="myForm">
           <input id="updateLivraison" type="hidden" >
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>ID</label>
              </div>
            </div>
            <div class="col-xs-2">
              <span id="id_client_edit" class="form-group infos_client text-blue"></span>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>E-mail</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-6">
              <div class="input-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                <input id="email_edit" type="email" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Prénom</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="prenom_edit" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Prénom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Nom</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="nom_edit" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Nom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>GSM</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input id="gsm_edit" type="tel" class="form-control infos_client" pattern="^(?:(?:\+|00)212|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" data-required-error="veuillez renseigner ce champ" data-error="phone number invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Naissance</label>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group has-feedback input-group date">
               <div class="input-group">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="naissance_edit"  data-error="Date naissance invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
               </div>
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
                <input id="adresse_edit" type="text" class="form-control infos_client" data-minlength="4" data-error="Adresse invalid" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Nombre d'enfant</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="CP_edit" type="NUMBER" class="form-control infos_client" data-minlength="1" data-error="Nombre d'enfant invalid">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>   
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Type maman</label>
              </div>
            </div>
            <div class="col-xs-4">
             <!--  <select id="type_edit" class="form-control">

              </select> -->
               <select id="type_edit" class="form-control">
                <option value="maman">Maman</option>
                <option value="enceinte">Enceinte</option>
              </select>
              <!-- <span id="type_edit" class="form-group infos_client text-blue"></span> -->
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Ville</label>
              </div>
            </div>
            <div class="col-xs-4">
              <select id="Ville_id_edit" class="form-control">
                <!-- <option value="0">Choisir une ville</option> -->
              </select>
            </div>
          </div>   
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Date de création</label>
              </div>
            </div>
            <div class="col-xs-4">
              <span id="creationDate_edit" class="form-group infos_client text-blue"></span>
            </div>
          </div>
          

          <!-- Bébé -->
          <input type="hidden" id="id_bebe_edit"/>
          <div class="row">
             
            <div class="col-xs-2">
              <div class="form-group">
                <label>Prénom bébé</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="prenom_bebe_edit" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Prénom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <div class="col-xs-2">
              <div class="form-group">
                <label>Sexe bébé</label>
              </div>
            </div>
            <div class="form-group  col-xs-4">
              <div class="input-group">
                <!-- <input placeholder="F ou G" id="sexe_bebe_id" type="text" class="form-control infos_client"  data-required-error="veuillez renseigner ce champ" required> -->
                <select id="sexe_bebe_id" class="form-control">
                  <option value="F">Fille</option>
                  <option value="G">Garçon</option>
                </select>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

           
          </div>
          <div class="row">
             <div class="col-xs-2">
              <div class="form-group">
                <label>Naissance</label>
              </div>
            </div>
             <div class="col-xs-4">
              <div class="form-group has-feedback input-group date">
               <div class="input-group">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="naissance_bebe_edit"  data-error="Date naissance invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
               </div>
              </div>
            </div>

             <div class="col-xs-2">
              <div class="form-group">
                <label>Maternité</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="maternite_bebe_edit" type="text"  class="form-control infos_client"  data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

          </div>
 
         
          <div class="row">

            <div class="col-xs-2">
              <div class="form-group">
                <label>Gynécologue</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="gyneco_bebe_edit" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client"  data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
             <?php if ($_SESSION['role_a']=='user' or $_SESSION['role_a']=='mgr') {  ?>
               <div class="col-xs-2">
                <div class="form-group">
                  <label>Livré</label>
                </div>
              </div>
              <div class="col-xs-2">
                  <input type="checkbox" id="livraison">
              </div>
            <?php } ?>
          </div>
          




          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;margin-bottom: 10px;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
            </div>
          </div>
        </form>
        <!-- <div class="row">
          <div class="col-xs-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Liste des Bébés</h3>
              </div>

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
            </div>
          </div>
        </div> -->
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
        <h4 class="modal-title custom_align" id="Heading">Créer un nouveau client</h4>
      </div>
      <div class="modal-body">
        <div id="alert_recover_ok_create" class="alert alert-success hide-me">
          Un nouveau client a été ajouté
        </div>
        <div id="alert_recover_ko_create" class="alert alert-warning hide-me">
          Quelque chose a mal tourné
        </div>
        <form id="createUserForm">
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>E-mail</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-6">
              <div class="input-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                <input id="email_create" value="@nomail.com" type="email" class="form-control infos_client" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid">
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Prénom</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="prenom_create" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Prénom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Nom</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="nom_create" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Nom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>GSM</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input id="gsm_create" type="tel" class="form-control infos_client" pattern="^(?:(?:\+|00)212|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" data-required-error="veuillez renseigner ce champ" data-error="phone number invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-2">
              <div class="form-group">
                <label>Naissance</label>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group has-feedback input-group date">
               <div class="input-group">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="naissance_create"  data-error="Date naissance invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
               </div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Adresse</label>
              </div>
            </div>
           
             <!--  <input type="text" class="form-control pull-right" id="adresse_create" required> -->
            <!--   <textarea class="form-control infos_client" id="adresse_create" rows="2" requidred></textarea> -->
            
             <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="adresse_create" type="text" class="form-control infos_client" data-minlength="4" data-error="Adresse invalid" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <div class="col-xs-2">
              <div class="form-group">
                <label>Nombre d'enfant</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="CP_create" type="NUMBER" class="form-control infos_client" data-minlength="1" data-error="Nombre d'enfant invalid" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>   
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Type maman</label>
              </div>
            </div>
            <div class="col-xs-4">
              <select id="type_create" class="form-control">
                <option value="maman">Maman</option>
                <option value="enceinte">Enceinte</option>
              </select>
              <!-- <span id="type_edit" class="form-group infos_client text-blue"></span> -->
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Ville</label>
              </div>
            </div>
            <div class="col-xs-4">
              <select id="Ville_id_create" class="form-control">
               <!--  <option value="0">Choisir une ville</option> -->
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Date naissance bébé</label>
              </div>
            </div>
      
            <div class="col-xs-4">
              <div class="form-group has-feedback input-group date">
               <div class="input-group">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="naissance_bebe_create"  data-error="Date naissance invalid" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
               </div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Maternité</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="maternite_create" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Prénom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>  
          <div class="row">
            
            <div class="col-xs-2">
              <div class="form-group">
                <label>Gynécologue</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="gyneco_create" type="text" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$" class="form-control infos_client" data-error="Prénom invalid" data-required-error="veuillez renseigner ce champ" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <div class="col-xs-2">
              <div class="form-group">
                <label>Sexe enfant</label>
              </div>
            </div>
            <div class="form-group  col-xs-4">
              <div class="input-group">
                <!-- <input id="sexe_create" type="text" class="form-control infos_client" data-error="Sexe invalid" data-required-error="veuillez renseigner ce champ" required> -->
                <select id="sexe_create" class="form-control">
                  <option value="F">Fille</option>
                  <option value="G">Garçon</option>
                </select>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
              </div>
            </div>

          </div>  
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Prénom enfant</label>
              </div>
            </div>
            <div class="form-group has-feedback col-xs-4">
              <div class="input-group">
                <input id="prenom_create" type="text" class="form-control infos_client" data-error="Sexe invalid" data-required-error="veuillez renseigner ce champ" required>
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
<script src="dist/js/list_2.js"></script>
<script type="text/javascript">
</script>