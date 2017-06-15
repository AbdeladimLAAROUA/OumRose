$(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });
  //Date picker
  $('#naissance_edit').datepicker({
    autoclose: true,
    forceParse: false,
    format: 'yyyy-mm-dd'
  });
  $('#naissance_create').datepicker({
    autoclose: true,
    forceParse: false,
    format: 'yyyy-mm-dd'
  });
  $('#naissance_bebe_create').datepicker({
    autoclose: true,
    forceParse: false,
    format: 'yyyy-mm-dd'
  });


});
$(document).ready(function() {

  var table, id_client;

  table = $('#table_clients').dataTable({
              "bProcessing" : true,
              "bServerSide" : true,
              "sAjaxSource" : "./lib/server_processing.php",
              "columns"       : [
                { data: "0" },
                { data: "1" },
                { data: "2" },
                { data: "3" },
                { data: "4" },
                { data: "5" },
                { data: "6" },
                { data: "7" }, 
                { data: "8" },
                { data: "0",
                  render: function(data, type, row) {
                    var ret = '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+data+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                              '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+data+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                              '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+data+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>';
                    return ret;
                  }
                }
              ]
            });

    $("#export_c").on("click", function() {
      console.log("search");
      var search_val = $('#table_clients_wrapper div div.dataTables_filter input').val();
      console.log(search_val);

      var obj = {'methode' : 'exportClientTest','search':search_val};

      $.ajax({
        url : "./lib/excelExport.php",
        dataType: "json",
        type: "POST",
        data : obj,
        async : true,
        beforeSend: function(){
          $('#loading-image').popup('show');
        },
        complete: function(){
          setTimeout(function(){$('#loading-image').popup('hide');},250);
        },
        success: function(data, textStatus, jqXHR) {
          console.log(data);
          window.location = 'http://localhost:8080/OumRose/gestion/downloads/'+data+'.xlsx';
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
    });

    var obj_city = {'methode' : 'getAllCities'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : obj_city,
      success: function(data, textStatus, jqXHR) {
        $.each(data.result, function(key, val) {
          var newOption = '<option value="'+val.id+'">'+val.name+'</option>';
          $("#Ville_id_edit").append(newOption);
          $("#Ville_id_create").append(newOption);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
    var obj_type = {'methode' : 'getAllTypeMoms'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : obj_type,
      success: function(data, textStatus, jqXHR) {
        $.each(data.result, function(key, val) {
          var newOption = '<option value="'+val.type+'">'+val.type+'</option>';
          $("#type_edit").append(newOption);
          $("#type_create").append(newOption);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });


  var commanderBoxType='';
  $("#table_clients tbody" ).on( "click", 'button',function() {
    var type  = $(this).data("type"),
        id    = $(this).data("id");
    switch (type){
      case 'view' :
        var get_client = {"methode":"getClient","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : get_client,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            $('.infos_client').text('');
            $("#baby_table tbody").empty();
            if(data.result != 0){
              var client = data.result.client[0];
              $('#id_client').text(client.id_client);
              $('#nom').text(client.nom);
              $('#prenom').text(client.prenom);
              $('#email').text(client.email);
              $('#gsm').text(client.gsm);
              $('#naissance').text(client.naissance);
              $('#adresse').text(client.adresse);
              $('#CP').text(client.CP);
              $('#type').text(client.type);
              $('#Ville_id').text(client.name);
              $('#creationDate').text(client.creationDateClient);
              var eligible = client.eligible;
              var babies = data.result.baby;
              if(babies.lenght == 0){
                var newRow = '<tr>'+
                  '<td>Aucun bébé trouvé</td>'+
                  '</tr>';
                  $("#baby_table tbody").append(newRow);
              }else{
                $.each(babies, function(key, val) {   
                  var newRow = '<tr>'+
                    '<td>'+val.id+'</td>'+
                    '<td>'+val.prenom+'</td>'+
                    '<td>'+val.sexe+'</td>'+
                    '<td>'+val.naissance+'</td>'+
                    '<td>'+val.MATERNITE+'</td>'+
                    '</tr>';
                  $("#baby_table tbody").append(newRow);
                });
              }
              $("#box_table tbody").empty();

              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var box2="Non commandé";
              var style2="style=''";
              var box3="Non commandé";
              var style3="style=''";
             
              if(box.indexOf('1')  > -1){
                 box1="commandé"
               for (var i = 0; i < commandes.length; i++) {
                  if(commandes[i]['id_box']=='1' && commandes[i]['status']=='Livré'){
                    style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                    box1="Commandé et livré"
                  }
                };
               ;
              }else if(eligible=='BOX1'){
                $('#AddCommandeForm').removeAttr( "hidden");
                commanderBoxType='1';
              }
              if(box.indexOf('2') > -1){
                
                box2="commandé";
                for (var i = 0; i < commandes.length; i++) {
                  if(commandes[i]['id_box']=='2' && commandes[i]['status']=='Livré'){
                    style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                    box2="Commandé et livré";
                  }
                };
              }else if(eligible=='BOX2'){
                $('#AddCommandeForm').removeAttr( "hidden");
                commanderBoxType='2';

              }

              if(box.indexOf('3') > -1){
                 box3="commandé";
                for (var i = 0; i < commandes.length; i++) {
                  if(commandes[i]['id_box']=='3' && commandes[i]['status']=='Livré'){
                    style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                     box3="Commandé et livré";
                  }

                };
               
              }else if(eligible=='BOX3'){
                $('#AddCommandeForm').removeAttr( "hidden");
                commanderBoxType='3';
              }
              
                  var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow);
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var get_client = {"methode":"getClient","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : get_client,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
            $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);
            if(data.result != 0){
              var client = data.result.client[0];
              $('#id_client_edit').text(client.id_client);
              $('#nom_edit').val(client.nom);
              $('#prenom_edit').val(client.prenom);
              $('#email_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);
              var babies = data.result.baby;
              if(babies.lenght == 0){
                var newRow = '<tr>'+
                  '<td>Aucun bébé trouvé</td>'+
                  '</tr>';
                  $("#baby_table tbody").append(newRow);
              }else{
                $.each(babies, function(key, val) {   
                  var newRow = '<tr>'+
                    '<td>'+val.id+'</td>'+
                    '<td>'+val.prenom+'</td>'+
                    '<td>'+val.sexe+'</td>'+
                    '<td>'+val.naissance+'</td>'+
                    '<td>'+val.MATERNITE+'</td>'+
                    '</tr>';
                  $("#baby_table tbody").append(newRow);
                });
              }
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });

      break;
      case 'delete' :
        $("#conf_supp").data("id",id);
        break;
      default :

        break;
    }
  });

  $("#conf_supp").on("click", function() {
    var id = $(this).data("id");
    var get_client = {"methode":"deleteFullClient","id":id};
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : get_client,
      beforeSend: function(){
        $('#loading-image').popup('show');
      },
      complete: function(){
        $('#loading-image').popup('hide');
      },
      success: function(data, textStatus, jqXHR) {
        // console.log(data);
        if(data.result == 'ok'){
          var tr =  $("#client_"+id);
          table.row(tr).remove().draw();
          $("#delete").modal('toggle');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });
  $('#table_clients').on( 'click', 'tbody tr', function (){
    var id = $(this).attr('id');
    var res = id.split("_");
    id_client = id;
    //myTable.row( this ).edit();
  });
  $('#myForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      alert("handle the invalid form...");
    } else {
      // everything looks good!
      // console.log("everything looks good!");
      e.preventDefault();
      var nom     = $('#nom_edit').val(),
          id      = $('#id_client_edit').text(),
          prenom  = $('#prenom_edit').val(),
          email   = $('#email_edit').val(),
          gsm     = $('#gsm_edit').val(),
          dof     = $('#naissance_edit').val(),
          adresse = $('#adresse_edit').val(),
          cp      = $('#CP_edit').val(),
          type    = $('#type_edit').val(),
          ville   = $('#Ville_id_edit').val();
      var obj = {'id':id,'nom':nom,'prenom':prenom,'email':email,'gsm':gsm,'dof':dof,'adresse':adresse,'cp':cp,'type':type,'ville':ville};
      var update_client = {'methode':'updateClient','client':obj};
      // console.log(obj);
      $.ajax({
        url : "./lib/util.php",
        dataType: "json",
        type: "POST",
        data : update_client,
        beforeSend: function(){
          $('#loading-image').popup('show');
        },
        complete: function(){
          $('#loading-image').popup('hide');
        },
        success: function(data, textStatus, jqXHR) {
          if(data.result == 'success'){
            console.log('Client bien modifier !! '+id_client);
            $('#alert_recover_ok').css('visibility','visible').fadeIn(1500);
            $('#'+id_client+' td:nth-child(2)').html(nom);
            $('#'+id_client+' td:nth-child(3)').html(prenom);
            $('#'+id_client+' td:nth-child(4)').html(email);
            $('#'+id_client+' td:nth-child(5)').html(gsm);
            $('#'+id_client+' td:nth-child(6)').html(getAge(dof));
            $('#'+id_client+' td:nth-child(7)').html(adresse);
            $('#'+id_client+' td:nth-child(8)').html($('#Ville_id_edit option:selected').text());
            setTimeout(function(){
              $('#edit').modal('toggle');
              $('#alert_recover_ok').css('visibility','hidden');
            }, 2000);
          }else{
            console.log('Something went wrong !!');
            $('#alert_recover_ko').css('visibility','visible').fadeIn(1500);
            setTimeout(function(){
              $('#edit').modal('toggle');
              $('#alert_recover_ko').css('visibility','hidden');
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
  });

  $('#AddCommandeForm').on('submit', function (e) {
    
   {
      var id=$('#id_client').text();
      var obj = {'id':id};
      var livraison={user:'admin',id_box:commanderBoxType,idClient:id};
      var commanderBox = {'methode':'addLivraison','livraison':livraison};
      // console.log(obj);
      $.ajax({
        url : "./lib/util.php",
        dataType: "json",
        type: "POST",
        data : commanderBox,
        beforeSend: function(){
          $('#loading-image').popup('show');
        },
        complete: function(){
          $('#loading-image').popup('hide');
        },
        success: function(data, textStatus, jqXHR) {
          console.log(data);
          if(data.result == 'success'){
            setTimeout(function(){
              $('#view').modal('toggle');
              $('#alert_recover_box_ok').css('visibility','hidden');
            }, 2000);
             $('#AddCommandeForm').attr("hidden", true)
          }else{
            console.log('Something went wrong !!');
            $('#alert_recover_box_ko').css('visibility','visible').fadeIn(1500);
            setTimeout(function(){
              $('#view').modal('toggle');
              $('#alert_recover_box_ko').css('visibility','hidden');
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
  });

});

$('#createUserForm').validator().on('submit', function (e) {
    //console.log('id_client submit:'+id_client);
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      alert("handle the invalid form...");
    } else {
      // everything looks good!
      // console.log("everything looks good!");
      e.preventDefault();
      var nom     = $('#nom_create').val(),
          prenom  = $('#prenom_create').val(),
          email   = $('#email_create').val(),
          gsm     = $('#gsm_create').val(),
          dof     = $('#naissance_create').val(),
          adresse = $('#adresse_create').val(),
          cp      = $('#CP_create').val(),
          type    = $('#type_create').val(),
          ville_id   = $('#Ville_id_create').val();
          naissance_bebe   = $('#naissance_bebe_create').val();
          maternite   = $('#maternite_create').val();
          gyneco   = $('#gyneco_create').val();
      var obj = {'nom':nom,'prenom':prenom,'email':email,'gsm':gsm,'dof':dof,'adresse':adresse,'cp':cp,'type':type,'ville_id':ville_id,'naissance_bebe':naissance_bebe,'maternite':maternite,'gyneco':gyneco};
      var create_client = {'methode':'createClient','client':obj};

      $.ajax({
        url : "./lib/util.php",
        dataType: "json",
        type: "POST",
        data : create_client,
        beforeSend: function(){
          $('#loading-image').popup('show');
        },
        complete: function(){
          $('#loading-image').popup('hide');
        },
        success: function(data, textStatus, jqXHR) {
          console.log(data);
          if(data.result == 'success'){
            console.log('Un nouveau client a été crée !! ');
            $('#alert_recover_ok_create').css('visibility','visible').fadeIn(1500);
           /* $('#'+id_client+' td:nth-child(2)').html(nom);
            $('#'+id_client+' td:nth-child(3)').html(prenom);
            $('#'+id_client+' td:nth-child(4)').html(email);
            $('#'+id_client+' td:nth-child(5)').html(gsm);
            $('#'+id_client+' td:nth-child(6)').html(getAge(dof));
            $('#'+id_client+' td:nth-child(7)').html(adresse);
            $('#'+id_client+' td:nth-child(8)').html($('#Ville_id_edit option:selected').text());*/
            setTimeout(function(){
              $('#createUser').modal('toggle');
              $('#alert_recover_ok_create').css('visibility','hidden');
            }, 2000);
          }else{
            console.log('Something went wrong !!');
            $('#alert_recover_ko_create').css('visibility','visible').fadeIn(1500);
            setTimeout(function(){
              $('#createUser').modal('toggle');
              $('#alert_recover_ko_create').css('visibility','hidden');
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
});

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    return age;
}