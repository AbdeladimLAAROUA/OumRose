$(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });
  //Date picker
  $('#naissance_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  var table;
  var obj = {'methode' : 'getAllClient'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : obj,
      beforeSend: function(){
        $('#loading-image').popup('show');
      },
      complete: function(){
        setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.id+'</td>'+
                      '<td>'+val.nom+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                      '<td>'+val.email+'</td>'+
                      '<td>'+val.gsm+'</td>'+
                      '<td>'+val.age+'</td>'+
                      '<td>'+val.adresse+'</td>'+
                      '<td>'+val.name+'</td>'+
                      '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.id+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_clients tbody").append(newRow);
          // console.log(val);
        });

        table = $("#table_clients").DataTable();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
    var obj_city = {'methode' : 'getAllCities'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : obj_city,
      success: function(data, textStatus, jqXHR) {
        console.log(data.result);
        $.each(data.result, function(key, val) {
          var newOption = '<option value="'+val.id+'">'+val.name+'</option>';
          $("#Ville_id_edit").append(newOption);
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
        console.log(data.result);
        $.each(data.result, function(key, val) {
          var newOption = '<option value="'+val.type+'">'+val.type+'</option>';
          $("#type_edit").append(newOption);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });

  $("#table_clients tbody" ).on( "click", 'button',function() {
    var type  = $(this).data("type"),
        id    = $(this).data("id");
    console.log(type+" - "+id);
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
              var babies = data.result.baby;
              console.log(babies);
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
      case 'edit' :
        console.log('edit');var get_client = {"methode":"getClient","id":id};
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
            $.validate();
            $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);
            if(data.result != 0){
              var client = data.result.client[0];
              console.log(client);
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
              console.log(babies);
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
        console.log('default');
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
          console.log(tr);
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

});