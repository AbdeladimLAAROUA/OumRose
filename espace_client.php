<p class="lead">Bienvenue dans votre espace client <?php echo $_SESSION["nom"];?></p>
<div class="row">
    <div class="col-sm-3">
        <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
          <li class="active"><a href="#vtab1" data-toggle="tab">Commander ma box</a></li>
          <li><a href="#vtab2" data-toggle="tab">Mon profil</a></li>
          <li><a href="#vtab4" data-toggle="tab">Historique de mes commandes</a></li>
          <li><a href="#vtab3" data-toggle="tab">Editer mon profil</a></li>
        </ul>
    </div>
    <div class="col-sm-9">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                <div class="row">
                    <div class="text-center boxReady">
                            <h2>
                                <?php
                                    if($_SESSION['eligibleToBox']==0){
                                        echo "Chère ".$_SESSION['nom'].", vous n'êtes éligible à aucune box pour le moment <br/>
                                <ul>
                                   <li style='line-height: 40px;  color=#ec7f8c;'>Critères d'éligibilité</li>
                                   <li style='line-height: 40px;  color=#ec7f8c;'>Box rose (Je suis enceinte) : du 5ème au 8ème mois de grossesse</li>
                                   <li style='line-height: 40px; color=#6fc7c2;'>Box vert (Bébé est là!) : de la naissance à 3 mois</li>
                                   <li style='line-height: 40px; color=#8e6cac;'>Box mauve (Bébé grandit): de 6 à 9 mois</li>
                                </ul>";
                                    }
                                    else if(isset($_SESSION['result1'])){
                                        echo $_SESSION['result1']['response'];
                                    }
                                ?>
                            </h2>
                            <?php 
                                if($_SESSION['eligibleToBox']!=0){
                             ?>
                            <div class="text-center">Choisissez la méthode de livraison qui vous convient :</div>
                            <?php } ?>
                            <img src="img/simulation guide+box oumbox.png" style="width: 75%;margin-top: 35px;">
                            </div>
                            <?php 
                                if($_SESSION['eligibleToBox']!=0){
                             ?>
                            <div class=" col-md-12 col-sm-12 col-xs-12 content">
                                <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
                                <h3>
                                    a-  Chez Oumbox : Gratuit
                                </h3>
                                <p>
                                    Venez récupérer votre box au 77 bis Boulevard Abdelmoumen
                                    Casablanca, (en face de la station de tram Wafasalaf)
                                </p>
                                <p>
                                    tél : 0522 22 58 50
                                </p>
                                <p>
                                    Lundi au vendredi de 9h30 à 15H30 (Horaire Ramadan)
                                </p>
                                <input type="hidden" name="type_livraison" value="SB" /><input type="submit" value="Localisez-nous" class="btn btn-primary">
                                <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="OX" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
                                </span></p>
                            </div>

                            <div class=" col-md-12 col-sm-12 col-xs-12 content">
                                <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
                                <h3>
                                    b-  Livraison en points Relais Speed Box : 25 dhs
                                </h3>
                                <p>
                                    <ul>
                                        <li>1.  Choisissez le point relais le plus proche de chez vous sur la liste</li>
                                        <li>2.  Recevez un SMS quand votre box est livrée au point relais choisi</li>
                                        <li>3.  Présentez-vous au point relais choisi avec votre CIN et 25 dh pour récupérer votre box</li>
                                        <li>4.  Vous aurez après 7 a 10 j pour récupérer la box; sinon elle ne sera plus disponible</li>
                                    </ul>
                                </p>
                                <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="SB" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
                                </span></p>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 content">
                                <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
                                <h3>
                                    c-  Livraison limitée au centre de Casablanca pendant les horaires de bureau : 20 dhs
                                </h3>
                                <p>
                                    <ul>
                                        <li>1.  Choisissez votre quartier sur la liste</li>
                                        <li>2.  Recevez un appel de notre livreur pour programmer la livraison</li>
                                        <li>3.  Présentez votre CIN à notre livreur et 20 dhs pour récupérer votre box</li>
                                    </ul>
                                </p>
                                <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="LD" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
                                </span></p>
                            </div>  
                            <?php } ?>
                        </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="vtab2">
                <h3>Mon profil</h3>
                <p>
                <?php 
                    $client = getClient2($_SESSION['client_id']);
                    $client = json_decode($client, true);

                    /*print_r($client);*/

                    // print_r($client);

                ?>
                </p>
                <div class="row edit-client-div">
                    <div class="col-xs-2">
                        <strong>Nom</strong>
                    </div>
                    <div class="col-xs-4">
                        <?php echo $client['result']['client'][0]['nom']; ?>
                    </div>
                    <div class="col-xs-3">
                        <strong>Prénom</strong>
                    </div>
                    <div class="col-xs-3">
                        <?php echo $client['result']['client'][0]['prenom']; ?>
                    </div>
                </div>
                <div class="row edit-client-div">
                    <div class="col-xs-2">
                        <strong>E-mail</strong>
                    </div>
                    <div class="col-xs-4">
                        <?php echo $client['result']['client'][0]['email']; ?>
                    </div>
                    <div class="col-xs-3">
                        <strong>Date de naissance</strong>
                    </div>
                    <div class="col-xs-3">
                        <?php echo $client['result']['client'][0]['naissance']; ?>
                    </div>
                </div>
                <div class="row edit-client-div">
                    <div class="col-xs-2">
                        <strong>GSM</strong>
                    </div>
                    <div class="col-xs-4">
                        <?php echo $client['result']['client'][0]['gsm']; ?>
                    </div>
                    <div class="col-xs-3">
                        <strong>Adresse</strong>
                    </div>
                    <div class="col-xs-3">
                        <?php echo $client['result']['client'][0]['adresse']; ?>
                    </div>
                </div>
                <div class="row edit-client-div">
                    <div class="col-xs-2">
                        <strong>Ville</strong>
                    </div>
                    <div class="col-xs-4">
                        <?php echo $client['result']['client'][0]['ville']; ?>
                    </div>
                    <div class="col-xs-3">
                        <strong>Code Postal</strong>
                    </div>
                    <div class="col-xs-3">
                        <?php echo $client['result']['client'][0]['CP']; ?>
                    </div>
                </div>
                <br /><br />
                <div class="row">
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th width="25%">Date de naissance / Accouchement</th>
                                    <th width="25%">Sexe</th>
                                    <th width="25%">Prénom</th>
                                    <th width="25%">Maternité</th>
                                </tr>
                            </thead>
                                <?php
                                    foreach ($client['result']['baby'] as $key => $value) {
                                        $row = '<tr><td>'.$value['naissance'].'</td><td>'.$value['sexe'].'</td><td>'.$value['prenom'].'</td><td>'.$value['MATERNITE'].'</td></tr>';
                                        echo $row;
                                    }
                                ?>
                        </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                <h3>Editer Mon profil</h3>
                <form id="updateForm" action="user/edit_user.php" method="post">
                    <div class="row edit-client-div">
                        <div class="col-xs-2">
                            <strong>Nom</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $client['result']['client'][0]['nom'];?>" data-required-error="veuillez renseigner ce champ" data-error="Nom invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <strong>Prénom</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $client['result']['client'][0]['prenom'];?>" data-required-error="veuillez renseigner ce champ" data-error="Prénom invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row edit-client-div">
                        <div class="col-xs-2">
                            <strong>E-mail</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="email" readOnly="true" name="email" id="email" class="form-control" value="<?php echo $client['result']['client'][0]['email'];?>" data-required-error="veuillez renseigner ce champ" data-error="E-mail invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <strong>Date de naissance</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" name="naissance" id="naissance" class="form-control" value="<?php echo $client['result']['client'][0]['naissance'];?>" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" data-required-error="veuillez renseigner ce champ" data-error="date invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row edit-client-div">
                        <div class="col-xs-2">
                            <strong>GSM</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" name="gsm" id="gsm" class="form-control" value="<?php echo $client['result']['client'][0]['gsm'];?>"  pattern="^(?:(?:\+|00)212|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" data-required-error="veuillez renseigner ce champ" data-error="GSM invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <strong>Adresse</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <textarea type="text" name="adresse" id="adresse" class="form-control" rows="3" data-error="Champ invalid" ><?php echo $client['result']['client'][0]['adresse'];?></textarea>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row edit-client-div">
                        <div class="col-xs-2">
                            <strong>Ville</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="text" name="ville" id="ville" class="form-control" value="<?php echo $client['result']['client'][0]['ville'];?>" data-required-error="veuillez renseigner ce champ" data-error="Ville invalid" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <strong>Code Postal</strong>
                        </div>
                        <div class="form-group has-feedback col-xs-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="number" name="cp" id="cp" class="form-control" value="<?php echo $client['result']['client'][0]['CP'];?>" data-error="Code Postale invalid">
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </form>
                <br /><br />
                <div class="row">
                        <table id="table_babies" class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th width="17%">Date de naissance / Accouchement</th>
                                    <th width="17%">Sexe</th>
                                    <th width="17%">Prénom</th>
                                    <th width="17%">Gynécologue</th>
                                    <th width="17%">Maternité</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                                <?php
                                    foreach ($client['result']['baby'] as $key => $value) {
                                        $row = '<tr>
                                        <td id="naissance_'.$value['id'].'" data-naissance="'.$value['naissance'].'">'.$value['naissance'].'</td>
                                        <td id="sexe_'.$value['id'].'" data-sexe="'.$value['sexe'].'">'.$value['sexe'].'</td>
                                        <td id="prenom_'.$value['id'].'" data-prenom="'.$value['prenom'].'">'.$value['prenom'].'</td>
                                        <td id="gyneco_'.$value['id'].'" data-gyneco="'.$value['GYNECO'].'">'.$value['GYNECO'].'</td>
                                        <td id="maternite_'.$value['id'].'" data-MATERNITE="'.$value['MATERNITE'].'">'.$value['MATERNITE'].'</td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-default btn-xs" data-type="edit" data-id="'.$value['id'].'" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        </tr>';
                                        echo $row;
                                    }
                                ?>
                        </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="vtab4">
                <h3>Mes commandes</h3>
                <p>
                    <?php 
                        $mesCommandes = getAllCommandeByCus($_SESSION['client_id']);
                        // print_r(getAllCommandeByCus($_SESSION['client_id']));
                    ?>
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID Commande</th>
                                    <th>Box</th>
                                    <th>Déscription</th>
                                    <th>Date de la commande</th>
                                </tr>
                            </thead>
                                <?php
                                    $mesCommandes = json_decode($mesCommandes, true);
                                    foreach ($mesCommandes['result'] as $key => $value) {
                                        $row = '<tr><td>'.$value['id'].'</td><td>'.$value['name'].'</td><td>'.$value['description'].'</td><td>'.$value['creationDate'].'</td></tr>';
                                        echo $row;
                                    }
                                ?>
                        </table>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Modifier bébé</h4>
            </div>
            <div class="modal-body">
                <div id="alert_recover_ok_edit_baby" class="alert alert-success hide-me">
                  Bébé modifié
                </div>
                <div id="alert_recover_ko_edit_baby" class="alert alert-warning hide-me">
                  Quelque chose a mal tourné
                </div>
                <div class="form-group">
                    <input id="edit_prenom" class="form-control" type="text" placeholder="prénom">
                </div>
                <div class="form-group">
                    <select id="edit_sexe" class="form-control">
                        <option value="G">G</option>
                        <option value="F">F</option>
                        <option value="I">I</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="edit_naissance" class="form-control" type="text" placeholder="Date de naissance / Accouchement">
                </div>
                <div class="form-group">
                    <input id="edit_gyneco" class="form-control" type="text" placeholder="Gynécologue">
                </div>
                <div class="form-group">
                    <input type="text" name="edit_maternite" id="edit_maternite" rows="2" class="form-control" placeholder="Maternité"  />
                </div>
            </div>
            <div class="modal-footer ">
                <button id="edit_btn" type="button" data-id="0" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Ajouter bébé</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="prenom" class="form-control" type="text" placeholder="prénom">
                </div>
                <div class="form-group">
                    <select id="sexe" class="form-control">
                        <option value="G">G</option>
                        <option value="F">F</option>
                        <option value="I">I</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="naissance" class="form-control" type="text" placeholder="Date de naissance / Accouchement">
                </div>
                <div class="form-group">
                    <input id="gyneco" class="form-control" type="text" placeholder="Gynécologue">
                </div>
                <div class="form-group">
                    <textarea id="maternite" rows="2" class="form-control" placeholder="Maternité"></textarea>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modifierx</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- jQuery 2.2.3 -->
<script src="gestion/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- bootstrap datepicker -->
<script src="gestion/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="gestion/dist/js/validator.min.js"></script>
<script type="text/javascript">
    //Date picker
    var naissance_input = $('#edit_naissance').datepicker({
                                                    autoclose: true,
                                                    forceParse: false,
                                                    format: 'yyyy-mm-dd'
                                                });
    $('#naissance').datepicker({
                    autoclose: true,
                    forceParse: false,
                    format: 'yyyy-mm-dd'
                }).datepicker('setDate', $('#naissance').val());

    $("#table_babies" ).on( "click", 'button',function() {
        var type        = $(this).data("type"),
            id          = $(this).data("id"),
            naissance   = $('#naissance_'+id).text();
        console.log(type+" - "+id);
        switch (type){
            case 'edit' :
                $('#edit_btn').data('id', id) ;
                setNaissance(naissance);
                $('#edit_prenom').val($('#prenom_'+id).data("prenom"));
                $('#edit_sexe').val($('#sexe_'+id).data("sexe"));
                $('#edit_gyneco').val($('#gyneco_'+id).data("gyneco"));
                $('#edit_maternite').val($('#maternite_'+id).data("maternite"));
                break;
            case 'delete' :

                break;
            default :

                break;
        }
    });

    $("#edit_btn").on("click", function() {
            console.log();
            var     edit_prenom     = $('#edit_prenom').val(),
                    edit_sexe       = $('#edit_sexe').val(),
                    edit_gyneco     = $('#edit_gyneco').val(),
                    edit_maternite  = $('#edit_maternite').val(),
                    edit_naissance  = $('#edit_naissance').val(),
                    id              = $(this).data("id");
            var baby = {'id':id ,'prenom':edit_prenom,'sexe':edit_sexe,'gyneco':edit_gyneco,'maternite':edit_maternite,'naissance':edit_naissance};
            updateBaby(baby);
    });

    $('#updateForm').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
          // handle the invalid form...
          console.log("handle the invalid form...");
        } else {
          // everything looks good!
          console.log("everything looks good!");
        }
    });

    function setNaissance(naissance) {
        naissance_input.datepicker('setDate', naissance);
    }

    function updateBaby(baby) {
        var obj = {'methode':'updateBaby','baby':baby}
        $.ajax({
            url : "./gestion/lib/util.php",
            dataType: "json",
            type: "POST",
            data : obj,
            success: function(data, textStatus, jqXHR) {
              console.log(data);
              if(data.result == 'success'){
                $('#alert_recover_ok_edit_baby').css('visibility','visible').fadeIn(1500);

                    $('#naissance_'+baby.id).text(baby.naissance);
                    $('#sexe_'+baby.id).text(baby.sexe);
                    $('#prenom_'+baby.id).text(baby.prenom);
                    $('#gyneco_'+baby.id).text(baby.gyneco);
                    $('#maternite_'+baby.id).text(baby.maternite);
                    $('#naissance_'+baby.id).data('naissance',baby.naissance);
                    $('#sexe_'+baby.id).data('sexe',baby.sexe);
                    $('#prenom_'+baby.id).data('prenom',baby.prenom);
                    $('#gyneco_'+baby.id).data('gyneco',baby.gyneco);
                    $('#maternite_'+baby.id).data('maternite',baby.maternite);

                setTimeout(function(){
                    $('#edit').modal('toggle');
                    $('#alert_recover_ok_edit_baby').css('visibility','hidden');
                }, 2000);
              }else{
                console.log('Something went wrong !!');
                $('#alert_recover_ko_edit_baby').css('visibility','visible').fadeIn(1500);
                setTimeout(function(){
                  $('#edit').modal('toggle');
                $('#alert_recover_ko_edit_baby').css('visibility','hidden');
                }, 2000);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
        }); 
    }
</script>