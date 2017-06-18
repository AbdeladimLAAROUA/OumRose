 $(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });


  var table2,table3,tableOx,tableAll;
  $("#export_LD_cmd").on("click", function() {
    search = table2.rows( { filter : 'applied'} ).data();

    var arr = [];
    $.each(search, function(key, val) {
      arr.push(val);
    });

    var obj = {'methode' : 'exportLDcmd','data' : arr};
    $.ajax({
      url : "./lib/excelExport.php",
      dataType: "json",
      type: "POST",
      data : obj,
      async : false,
      success: function(data, textStatus, jqXHR) {
        window.open('http://localhost:/Oumbox/gestion/downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

  $("#export_SB_cmd").on("click", function() {
    search = table3.rows( { filter : 'applied'} ).data();

    var arr = [];
    $.each(search, function(key, val) {
      arr.push(val);
    });

    var obj = {'methode' : 'exportSBcmd','data' : arr};
    $.ajax({
      url : "./lib/excelExport.php",
      dataType: "json",
      type: "POST",
      data : obj,
      async : false,
      success: function(data, textStatus, jqXHR) {
        window.open('http://localhost:/Oumbox/gestion/downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

  $("#export_OX_cmd").on("click", function() {
    search = tableOX.rows( { filter : 'applied'} ).data();

    var arr = [];
    $.each(search, function(key, val) {
      arr.push(val);
    });

    var obj = {'methode' : 'exportOXcmd','data' : arr};
    $.ajax({
      url : "./lib/excelExport.php",
      dataType: "json",
      type: "POST",
      data : obj,
      async : false,
      success: function(data, textStatus, jqXHR) {
        window.open('http://localhost:/Oumbox/gestion/downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

 
 var objCommandeLD = {'methode' : 'getCommandesLD'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : objCommandeLD,
      beforeSend: function(){
        //$('#loading-image').popup('show');
      },
      complete: function(){
        //setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        console.log(data+"---------------------------------->");
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.GSM2+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.adresseLivraison+'</td>'+
                      '<td>'+val.quartier+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                      '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_commandesLD tbody").append(newRow);
          // console.log(val);
        });
          table2 = $("#table_commandesLD").DataTable();
    }
  });


  var objCommandeOX = {'methode' : 'getCommandesOX'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : objCommandeOX,
      beforeSend: function(){
        //$('#loading-image').popup('show');
      },
      complete: function(){
        //setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        console.log(data+"---------------------------------->");
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                      '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_commandesOX tbody").append(newRow);
          // console.log(val);
        });
          tableOx = $("#table_commandesOX").DataTable();
    }
  });

  var objCommandeAll = {'methode' : 'getAllCommandes2'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : objCommandeAll,
      beforeSend: function(){
        //$('#loading-image').popup('show');
      },
      complete: function(){
        //setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        console.log(data+"---------------------------------->");
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          console.log(val);
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.typeLivraison+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                      '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_commandesAll tbody").append(newRow);
          // console.log(val);
        });
          tableAll = $("#table_commandesAll").DataTable();
    }
  });
    

    var objCommandeSB = {'methode' : 'getCommandesSB'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : objCommandeSB,
      beforeSend: function(){
        //$('#loading-image').popup('show');
      },
      complete: function(){
       // setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        console.log(data+"---------------------------------->");
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                       '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.GSM2+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.pointRelais+'</td>'+
                      '<td>'+val.Ville+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                      '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_commandesSB tbody").append(newRow);
          // console.log(val);
        });

        table3 = $("#table_commandesSB").DataTable();

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(errorThrown+"----------------------------------2<");
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });




 $("#table_commandesSB tbody" ).on( "click", 'button',function() {
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
              $("#box_table tbody").empty();
              var box = data.result.box;
              var box1="Non commandé";
              var box2="Non commandé";
              var box3="Non commandé";
             
              if(box.indexOf('1') > -1){
                box1="commandé";
              }if(box.indexOf('2') > -1){
                box2="commandé";
              }if(box.indexOf('3') > -1){
                box3="commandé";
              }
              
                  var newRow = '<tr>'+
                    '<td>'+box1+'</td>'+
                    '<td>'+box2+'</td>'+
                    '<td>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow);
            
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
            // $.validate();
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


       case 'livraison' :
        var livraison = {"id":id,'status':'Livré','type':'SB'};
        var myLivraison = {"methode":"updateLivraison",'livraison':livraison};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : myLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            console.log('done');
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      

      default :
        console.log('default');
        break;
    }
  });


  $("#table_commandesLD tbody" ).on( "click", 'button',function() {
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
              $("#box_table tbody").empty();
              var box = data.result.box;
              var box1="Non commandé";
              var box2="Non commandé";
              var box3="Non commandé";
             
              if(box.indexOf('1') > -1){
                box1="commandé";
              }if(box.indexOf('2') > -1){
                box2="commandé";
              }if(box.indexOf('3') > -1){
                box3="commandé";
              }
              
                  var newRow = '<tr>'+
                    '<td>'+box1+'</td>'+
                    '<td>'+box2+'</td>'+
                    '<td>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow);
            
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
            // $.validate();
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


       case 'livraison' :
         var livraison = {"id":id,'status':'Livré','type':'LD'};
        var myLivraison = {"methode":"updateLivraison",'livraison':livraison};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : myLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            console.log('done');
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      

      default :
        console.log('default');
        break;
    }
  });


 $("#table_commandesOX tbody" ).on( "click", 'button',function() {
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
              $("#box_table tbody").empty();
              var box = data.result.box;
              var box1="Non commandé";
              var box2="Non commandé";
              var box3="Non commandé";
             
              if(box.indexOf('1') > -1){
                box1="commandé";
              }if(box.indexOf('2') > -1){
                box2="commandé";
              }if(box.indexOf('3') > -1){
                box3="commandé";
              }
              
                  var newRow = '<tr>'+
                    '<td>'+box1+'</td>'+
                    '<td>'+box2+'</td>'+
                    '<td>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow);
            
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
            // $.validate();
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


       case 'livraison' :
        var livraison = {"id":id,'status':'Livré','type':'OX'};
        var myLivraison = {"methode":"updateLivraison",'livraison':livraison};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : myLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            console.log('done');
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      

      default :
        console.log('default');
        break;
    }
  });

 $("#table_commandesAll tbody" ).on( "click", 'button',function() {
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
              $("#box_table tbody").empty();
              var box = data.result.box;
              var box1="Non commandé";
              var box2="Non commandé";
              var box3="Non commandé";
             
              if(box.indexOf('1') > -1){
                box1="commandé";
              }if(box.indexOf('2') > -1){
                box2="commandé";
              }if(box.indexOf('3') > -1){
                box3="commandé";
              }
              
                  var newRow = '<tr>'+
                    '<td>'+box1+'</td>'+
                    '<td>'+box2+'</td>'+
                    '<td>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow);
            
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
            // $.validate();
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


       case 'livraison' :
        var livraison = {"id":id,'status':'Livré'};
        var myLivraison = {"methode":"updateLivraison",'livraison':livraison};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : myLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            console.log('done');
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      

      default :
        console.log('default');
        break;
    }
  });










});

 