 $(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });


  var script = $('script[src*=livraison]'); 

  var role = script.attr('data-role'); 


  var table2,table3,table4,tableAll;
  var table5='';
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
        window.open('downloads/'+data+'.xlsx','_blank' );
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
        window.open('downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

  $("#export_OX_cmd").on("click", function() {
    search = table4.rows( { filter : 'applied'} ).data();

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
        window.open('downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

  $("#export_CL_cmd").on("click", function() {
    search = table5.rows( { filter : 'applied'} ).data();

    var arr = [];
    $.each(search, function(key, val) {
      arr.push(val);
    });

    var obj = {'methode' : 'exportCLcmd','data' : arr};
    $.ajax({
      url : "./lib/excelExport.php",
      dataType: "json",
      type: "POST",
      data : obj,
      async : false,
      success: function(data, textStatus, jqXHR) {
        window.open('downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });
  $("#export_all_cmd").on("click", function() {
    search = tableAll.rows( { filter : 'applied'} ).data();

    var arr = [];
    $.each(search, function(key, val) {
      arr.push(val);
    });

    var obj = {'methode' : 'exportAllcmd','data' : arr};
    $.ajax({
      url : "./lib/excelExport.php",
      dataType: "json",
      type: "POST",
      data : obj,
      async : false,
      success: function(data, textStatus, jqXHR) {
        window.open('downloads/'+data+'.xlsx','_blank' );
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
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var actions='';
          actions=    '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          if(role=="mgr"){
            actions=  '<td width="8%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-success btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          }
          var newRow = '<tr id="client_'+val.id+'">'+
                      /*'<td>'+val.idMaman+'</td>'+*/
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM2+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.adresseLivraison+'</td>'+
                      '<td>'+val.quartier+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                       actions+
                      '</tr>';
          $("#table_commandesLD tbody").append(newRow);
          // console.log(val);
        });
         
          table2 = $("#table_commandesLD").DataTable({
            "bSort" : false
          });
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
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var actions='';
          actions=    '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          if(role=="mgr"){
            actions=  '<td width="8%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-success btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          }
          var newRow = '<tr id="client_id'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                        actions
                      '</tr>';
          
          $("#table_commandesOX tbody").append(newRow);
          // console.log(val);
        });
          table4 = $("#table_commandesOX").DataTable({
            "bSort" : false
          });
    }
  });

   var objCommandeCL = {'methode' : 'getCommandesCL'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : objCommandeCL,
      beforeSend: function(){
        //$('#loading-image').popup('show');
      },
      complete: function(){
        //setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var actions='';
          actions=    '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      /*'<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+*/
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          if(role=="mgr"){
            actions=  '<td width="8%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-success btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          }
          var newRow = '<tr id="client_id'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                      '<td>'+val.maternite+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                        actions
                      '</tr>';
          
          $("#table_commandesCL tbody").append(newRow);
          // console.log(val);
        });
          table5 = $("#table_commandesCL").DataTable({
            "bSort" : false
          });
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
        // console.log(data.result);
        $.each(data.result, function(key, val) {
           var actions='';
          actions=    '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          if(role=="mgr"){
            actions=  '<td width="8%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-success btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          }
          var newRow = '<tr id="client_'+val.idMaman+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.typeLivraison+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                      '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM1+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                       actions+
                      '</tr>';
          $("#table_commandesAll tbody").append(newRow);
          // console.log(val);
        });
          
          tableAll = $("#table_commandesAll").DataTable({
            "bSort" : false
          });
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
        // console.log(data.result);
        $.each(data.result, function(key, val) {
           var actions='';
          actions=    '<td width="12%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          if(role=="mgr"){
            actions=  '<td width="8%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.idMaman+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-success btn-xs action" data-type="livraison" data-id="'+val.idLivraison+'" data-toggle="modal" data-target="#livraison" ><span class="glyphicon glyphicon-ok"></span></button>'+
                      '</td>';
          }
          var newRow = '<tr id="client_'+val.id+'">'+
                      '<td>'+val.idMaman+'</td>'+
                      '<td>'+val.idCommande+'</td>'+
                      '<td>'+val.nomMaman+'</td>'+
                      '<td>'+val.prenom+'</td>'+
                       '<td>'+val.id_box+'</td>'+
                      '<td>'+val.GSM2+'</td>'+
                      '<td>'+val.naissance+'</td>'+
                      '<td>'+val.pointRelais+'</td>'+
                      '<td>'+val.Ville+'</td>'+
                      '<td>'+val.creationDate+'</td>'+
                      '<td class="livraisonStatus'+val.idLivraison+'">'+val.status+'</td>'+
                       actions
                      '</tr>';
          $("#table_commandesSB tbody").append(newRow);
          // console.log(val);
        });

        
        table3 = $("#table_commandesSB").DataTable({
            "bSort" : false
          });

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
              var eligible = client.eligible;
              
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
              var eligible = client.eligible;
              $("#box_table tbody").empty();
              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var ref1="Réf : ";
              var box2="Non commandé";
              var style2="style=''";
              var ref2="Réf : ";
              var box3="Non commandé";
              var style3="style=''";
              var ref3="Réf : ";
             
              if(eligible=='BOX1' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
              }if(eligible=='BOX2' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
              }if(eligible=='BOX3' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
              }
              for (var i = 0; i < box.length; i++) {
                  if(box[i]['id_box']=='1'){
                    box1="Commandé";
                    ref1="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='1' && commandes[j]['status']=='Livré'){
                         style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box1="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='2'){
                    box2="Commandé";
                    ref2="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='2' && commandes[j]['status']=='Livré'){
                         style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box2="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='3'){
                    box3="Commandé";
                    ref3="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='3' && commandes[j]['status']=='Livré'){
                         style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box3="Commandé et livré"
                       }
                     }
                  }
                  
              }

               if(eligible=='BOX1' && box1=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
               }else if(eligible=='BOX2' && box2=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
               }else if(eligible=='BOX3' && box3=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
               }

                var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow); 

                  var ref = '<tr>'+
                    '<td '+style1+'>'+ref1+'</td>'+
                    '<td '+style2+'>'+ref2+'</td>'+
                    '<td '+style3+'>'+ref3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(ref);
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var getAllCities = {"methode":"getAllCities"};
          $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getAllCities,
          async:false,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            
            $.each(data['result'], function(key, val) {   
                 $('#ville_commande_edit').append($('<option>', {
                     value: val.id,
                     text: val.name
                 }));
                });

          },
          error:function(data){

          }
        });
        var getLivraison = {"methode":"getLivraison","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
           /* $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);*/
            if(data.result != 0){
              var commande = data.result[0];
              console.log(commande);

              $('#id_commande_edit').val(commande.id);
              $('#id_commande_edit').text(commande.commande_id);
              $('#id_client_edit').text(commande.customer_id);
              $("#quartier_commande_edit option").remove();
             
              var getAllQuartiers = {"methode":"getAllQuartiers"};
                   $.ajax({
                   url : "./lib/util.php",
                   dataType: "json",
                   type: "POST",
                   data : getAllQuartiers,
                   beforeSend: function(){
                     $('#loading-image').popup('show');
                   },
                   complete: function(){
                     setTimeout(function(){$('#loading-image').popup('hide');},250);
                   },
                   success: function(data, textStatus, jqXHR) {
                    
                     $.each(data['result'], function(key, val) {   
                          $('#quartier_commande_edit').append($('<option>', {
                              value: val.id,
                              text: val.nom
                          }));
                          if(commande.quartier==val.nom){
                            $("#quartier_commande_edit").val(val.id);
                            $("#adresse_commande_edit").val(commande.adresseLivraison);
                          }
                     });

                   },
                   error:function(data){

                   }
                 });
              if(commande.type=='OX'){
                 $("#type_commande_edit").val("1");
                 gestion();
              }if(commande.type=='SB'){
                 $("#type_commande_edit").val("2");
                 gestion();
              }if(commande.type=='LD'){
                 $("#type_commande_edit").val("3");
                 gestion();
              }

              if(commande.status=="Livré"){
                 $("#status_commande_edit").val("1");
               }else {
                 $("#status_commande_edit").val("2");
               }

               if(commande.id_ville!=null){
                $("#ville_commande_edit").val(commande.id_ville);
                $("#relais_commande_edit option").remove();
                var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":commande.id_ville};
                  $.ajax({
                  url : "./lib/util.php",
                  dataType: "json",
                  type: "POST",
                  data : getRelaisListByVille,
                  beforeSend: function(){
                    $('#loading-image').popup('show');
                  },
                  complete: function(){
                    setTimeout(function(){$('#loading-image').popup('hide');},250);
                  },
                  success: function(data, textStatus, jqXHR) {
                    
                    $.each(data['result'], function(key, val) {   
                         $('#relais_commande_edit').append($('<option>', {
                             value: val.id_relais,
                             text: val.nom
                         }));
                      });

                     $('#relais_commande_edit').val(commande.id_relais);
                  },
                  error:function(data){

                  }
                });
               }

             
             // $('#type_commande_edit').val(commande.type);
             /* $('#id_commande_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);*/
              

              /*var eligible = client.eligible;
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
              }*/
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
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      
      default :
        break;
    }
  });

 $("#conf_supp").on("click", function() {
    var id = $(this).data("id");
    var commande = {"methode":"deleteCommande","id":id};
    console.log(commande);
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : commande,
      beforeSend: function(){
        $('#loading-image').popup('show');
      },
      complete: function(){
        $('#loading-image').popup('hide');
      },
      success: function(data, textStatus, jqXHR) {
        // console.log(data);
        console.log(data);
        if(data.result == 'ok'){
          /*var tr =  $("#client_"+id);
          console.log(tr);
          table.row(tr).remove().draw();*/
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




  $("#table_commandesLD tbody" ).on( "click", 'button',function() {
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
              var eligible = client.eligible;
              $("#box_table tbody").empty();
              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var ref1="Réf : ";
              var box2="Non commandé";
              var style2="style=''";
              var ref2="Réf : ";
              var box3="Non commandé";
              var style3="style=''";
              var ref3="Réf : ";
             
              if(eligible=='BOX1' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
              }if(eligible=='BOX2' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
              }if(eligible=='BOX3' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
              }
              for (var i = 0; i < box.length; i++) {
                  if(box[i]['id_box']=='1'){
                    box1="Commandé";
                    ref1="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='1' && commandes[j]['status']=='Livré'){
                         style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box1="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='2'){
                    box2="Commandé";
                    ref2="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='2' && commandes[j]['status']=='Livré'){
                         style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box2="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='3'){
                    box3="Commandé";
                    ref3="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='3' && commandes[j]['status']=='Livré'){
                         style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box3="Commandé et livré"
                       }
                     }
                  }
                  
              }

               if(eligible=='BOX1' && box1=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
               }else if(eligible=='BOX2' && box2=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
               }else if(eligible=='BOX3' && box3=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
               }

                var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow); 

                  var ref = '<tr>'+
                    '<td '+style1+'>'+ref1+'</td>'+
                    '<td '+style2+'>'+ref2+'</td>'+
                    '<td '+style3+'>'+ref3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(ref);
            
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var getAllCities = {"methode":"getAllCities"};
          $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getAllCities,
          async:false,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            
            $.each(data['result'], function(key, val) {   
                 $('#ville_commande_edit').append($('<option>', {
                     value: val.id,
                     text: val.name
                 }));
                });

          },
          error:function(data){

          }
        });
        var getLivraison = {"methode":"getLivraison","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
           /* $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);*/
            if(data.result != 0){
              var commande = data.result[0];
              console.log(commande);

              $('#id_commande_edit').val(commande.id);
              $('#id_commande_edit').text(commande.commande_id);
              $('#id_client_edit').text(commande.customer_id);
              $("#quartier_commande_edit option").remove();
             
              var getAllQuartiers = {"methode":"getAllQuartiers"};
                   $.ajax({
                   url : "./lib/util.php",
                   dataType: "json",
                   type: "POST",
                   data : getAllQuartiers,
                   beforeSend: function(){
                     $('#loading-image').popup('show');
                   },
                   complete: function(){
                     setTimeout(function(){$('#loading-image').popup('hide');},250);
                   },
                   success: function(data, textStatus, jqXHR) {
                    
                     $.each(data['result'], function(key, val) {   
                          $('#quartier_commande_edit').append($('<option>', {
                              value: val.id,
                              text: val.nom
                          }));
                          if(commande.quartier==val.nom){
                            $("#quartier_commande_edit").val(val.id);
                            $("#adresse_commande_edit").val(commande.adresseLivraison);
                          }
                     });

                   },
                   error:function(data){

                   }
                 });
              if(commande.type=='OX'){
                 $("#type_commande_edit").val("1");
                 gestion();
              }if(commande.type=='SB'){
                 $("#type_commande_edit").val("2");
                 gestion();
              }if(commande.type=='LD'){
                 $("#type_commande_edit").val("3");
                 gestion();
              }

              if(commande.status=="Livré"){
                 $("#status_commande_edit").val("1");
               }else {
                 $("#status_commande_edit").val("2");
               }

               if(commande.id_ville!=null){
                $("#ville_commande_edit").val(commande.id_ville);
                $("#relais_commande_edit option").remove();
                var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":commande.id_ville};
                  $.ajax({
                  url : "./lib/util.php",
                  dataType: "json",
                  type: "POST",
                  data : getRelaisListByVille,
                  beforeSend: function(){
                    $('#loading-image').popup('show');
                  },
                  complete: function(){
                    setTimeout(function(){$('#loading-image').popup('hide');},250);
                  },
                  success: function(data, textStatus, jqXHR) {
                    
                    $.each(data['result'], function(key, val) {   
                         $('#relais_commande_edit').append($('<option>', {
                             value: val.id_relais,
                             text: val.nom
                         }));
                      });

                     $('#relais_commande_edit').val(commande.id_relais);
                  },
                  error:function(data){

                  }
                });
               }

             
             // $('#type_commande_edit').val(commande.type);
             /* $('#id_commande_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);*/
              

              /*var eligible = client.eligible;
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
              }*/
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
              var eligible = client.eligible;
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
                var eligible = client.eligible;
              $("#box_table tbody").empty();
              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var ref1="Réf : ";
              var box2="Non commandé";
              var style2="style=''";
              var ref2="Réf : ";
              var box3="Non commandé";
              var style3="style=''";
              var ref3="Réf : ";
             
              if(eligible=='BOX1' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
              }if(eligible=='BOX2' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
              }if(eligible=='BOX3' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
              }
              for (var i = 0; i < box.length; i++) {
                  if(box[i]['id_box']=='1'){
                    box1="Commandé";
                    ref1="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='1' && commandes[j]['status']=='Livré'){
                         style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box1="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='2'){
                    box2="Commandé";
                    ref2="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='2' && commandes[j]['status']=='Livré'){
                         style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box2="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='3'){
                    box3="Commandé";
                    ref3="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='3' && commandes[j]['status']=='Livré'){
                         style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box3="Commandé et livré"
                       }
                     }
                  }
                  
              }

               if(eligible=='BOX1' && box1=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
               }else if(eligible=='BOX2' && box2=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
               }else if(eligible=='BOX3' && box3=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
               }

                var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow); 

                  var ref = '<tr>'+
                    '<td '+style1+'>'+ref1+'</td>'+
                    '<td '+style2+'>'+ref2+'</td>'+
                    '<td '+style3+'>'+ref3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(ref);
            
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var getAllCities = {"methode":"getAllCities"};
          $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getAllCities,
          async:false,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            
            $.each(data['result'], function(key, val) {   
                 $('#ville_commande_edit').append($('<option>', {
                     value: val.id,
                     text: val.name
                 }));
                });

          },
          error:function(data){

          }
        });
        var getLivraison = {"methode":"getLivraison","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
           /* $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);*/
            if(data.result != 0){
              var commande = data.result[0];
              console.log(commande);

              $('#id_commande_edit').val(commande.id);
              $('#id_commande_edit').text(commande.commande_id);
              $('#id_client_edit').text(commande.customer_id);
              $("#quartier_commande_edit option").remove();
             
              var getAllQuartiers = {"methode":"getAllQuartiers"};
                   $.ajax({
                   url : "./lib/util.php",
                   dataType: "json",
                   type: "POST",
                   data : getAllQuartiers,
                   beforeSend: function(){
                     $('#loading-image').popup('show');
                   },
                   complete: function(){
                     setTimeout(function(){$('#loading-image').popup('hide');},250);
                   },
                   success: function(data, textStatus, jqXHR) {
                    
                     $.each(data['result'], function(key, val) {   
                          $('#quartier_commande_edit').append($('<option>', {
                              value: val.id,
                              text: val.nom
                          }));
                          if(commande.quartier==val.nom){
                            $("#quartier_commande_edit").val(val.id);
                            $("#adresse_commande_edit").val(commande.adresseLivraison);
                          }
                     });

                   },
                   error:function(data){

                   }
                 });
              if(commande.type=='OX'){
                 $("#type_commande_edit").val("1");
                 gestion();
              }if(commande.type=='SB'){
                 $("#type_commande_edit").val("2");
                 gestion();
              }if(commande.type=='LD'){
                 $("#type_commande_edit").val("3");
                 gestion();
              }

              if(commande.status=="Livré"){
                 $("#status_commande_edit").val("1");
               }else {
                 $("#status_commande_edit").val("2");
               }

               if(commande.id_ville!=null){
                $("#ville_commande_edit").val(commande.id_ville);
                $("#relais_commande_edit option").remove();
                var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":commande.id_ville};
                  $.ajax({
                  url : "./lib/util.php",
                  dataType: "json",
                  type: "POST",
                  data : getRelaisListByVille,
                  beforeSend: function(){
                    $('#loading-image').popup('show');
                  },
                  complete: function(){
                    setTimeout(function(){$('#loading-image').popup('hide');},250);
                  },
                  success: function(data, textStatus, jqXHR) {
                    
                    $.each(data['result'], function(key, val) {   
                         $('#relais_commande_edit').append($('<option>', {
                             value: val.id_relais,
                             text: val.nom
                         }));
                      });

                     $('#relais_commande_edit').val(commande.id_relais);
                  },
                  error:function(data){

                  }
                });
               }

             
             // $('#type_commande_edit').val(commande.type);
             /* $('#id_commande_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);*/
              

              /*var eligible = client.eligible;
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
              }*/
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

 $("#table_commandesCL tbody" ).on( "click", 'button',function() {
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
              var eligible = client.eligible;
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
                var eligible = client.eligible;
              $("#box_table tbody").empty();
              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var ref1="Réf : ";
              var box2="Non commandé";
              var style2="style=''";
              var ref2="Réf : ";
              var box3="Non commandé";
              var style3="style=''";
              var ref3="Réf : ";
             
              if(eligible=='BOX1' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
              }if(eligible=='BOX2' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
              }if(eligible=='BOX3' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
              }
              for (var i = 0; i < box.length; i++) {
                  if(box[i]['id_box']=='1'){
                    box1="Commandé";
                    ref1="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='1' && commandes[j]['status']=='Livré'){
                         style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box1="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='2'){
                    box2="Commandé";
                    ref2="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='2' && commandes[j]['status']=='Livré'){
                         style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box2="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='3'){
                    box3="Commandé";
                    ref3="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='3' && commandes[j]['status']=='Livré'){
                         style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box3="Commandé et livré"
                       }
                     }
                  }
                  
              }

               if(eligible=='BOX1' && box1=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
               }else if(eligible=='BOX2' && box2=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
               }else if(eligible=='BOX3' && box3=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
               }

                var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow); 

                  var ref = '<tr>'+
                    '<td '+style1+'>'+ref1+'</td>'+
                    '<td '+style2+'>'+ref2+'</td>'+
                    '<td '+style3+'>'+ref3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(ref);
            
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var getAllCities = {"methode":"getAllCities"};
          $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getAllCities,
          async:false,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            
            $.each(data['result'], function(key, val) {   
                 $('#ville_commande_edit').append($('<option>', {
                     value: val.id,
                     text: val.name
                 }));
                });

          },
          error:function(data){

          }
        });
        var getLivraison = {"methode":"getLivraison","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
           /* $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);*/
            if(data.result != 0){
              var commande = data.result[0];
              console.log(commande);

              $('#id_commande_edit').val(commande.id);
              $('#id_commande_edit').text(commande.commande_id);
              $('#id_client_edit').text(commande.customer_id);
              $("#quartier_commande_edit option").remove();
             
              var getAllQuartiers = {"methode":"getAllQuartiers"};
                   $.ajax({
                   url : "./lib/util.php",
                   dataType: "json",
                   type: "POST",
                   data : getAllQuartiers,
                   beforeSend: function(){
                     $('#loading-image').popup('show');
                   },
                   complete: function(){
                     setTimeout(function(){$('#loading-image').popup('hide');},250);
                   },
                   success: function(data, textStatus, jqXHR) {
                    
                     $.each(data['result'], function(key, val) {   
                          $('#quartier_commande_edit').append($('<option>', {
                              value: val.id,
                              text: val.nom
                          }));
                          if(commande.quartier==val.nom){
                            $("#quartier_commande_edit").val(val.id);
                            $("#adresse_commande_edit").val(commande.adresseLivraison);
                          }
                     });

                   },
                   error:function(data){

                   }
                 });
              if(commande.type=='OX'){
                 $("#type_commande_edit").val("1");
                 gestion();
              }if(commande.type=='SB'){
                 $("#type_commande_edit").val("2");
                 gestion();
              }if(commande.type=='LD'){
                 $("#type_commande_edit").val("3");
                 gestion();
              }

              if(commande.status=="Livré"){
                 $("#status_commande_edit").val("1");
               }else {
                 $("#status_commande_edit").val("2");
               }

               if(commande.id_ville!=null){
                $("#ville_commande_edit").val(commande.id_ville);
                $("#relais_commande_edit option").remove();
                var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":commande.id_ville};
                  $.ajax({
                  url : "./lib/util.php",
                  dataType: "json",
                  type: "POST",
                  data : getRelaisListByVille,
                  beforeSend: function(){
                    $('#loading-image').popup('show');
                  },
                  complete: function(){
                    setTimeout(function(){$('#loading-image').popup('hide');},250);
                  },
                  success: function(data, textStatus, jqXHR) {
                    
                    $.each(data['result'], function(key, val) {   
                         $('#relais_commande_edit').append($('<option>', {
                             value: val.id_relais,
                             text: val.nom
                         }));
                      });

                     $('#relais_commande_edit').val(commande.id_relais);
                  },
                  error:function(data){

                  }
                });
               }

             
             // $('#type_commande_edit').val(commande.type);
             /* $('#id_commande_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);*/
              

              /*var eligible = client.eligible;
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
              }*/
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
              var eligible = client.eligible;
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
              var commandes = data.result.commandes;
              var box = data.result.box;

              var box1="Non commandé";
              var style1="style=''";
              var ref1="Réf : ";
              var box2="Non commandé";
              var style2="style=''";
              var ref2="Réf : ";
              var box3="Non commandé";
              var style3="style=''";
              var ref3="Réf : ";
             
              if(eligible=='BOX1' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
              }if(eligible=='BOX2' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
              }if(eligible=='BOX3' && box.length==0){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
              }
              for (var i = 0; i < box.length; i++) {
                  if(box[i]['id_box']=='1'){
                    box1="Commandé";
                    ref1="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='1' && commandes[j]['status']=='Livré'){
                         style1="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box1="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='2'){
                    box2="Commandé";
                    ref2="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='2' && commandes[j]['status']=='Livré'){
                         style2="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box2="Commandé et livré"
                       }
                     }
                  }
                  if(box[i]['id_box']=='3'){
                    box3="Commandé";
                    ref3="Réf : "+box[i]['RefBox'];
                    for (var j = 0; j < commandes.length; j++) {
                       if(commandes[j]['id_box']=='3' && commandes[j]['status']=='Livré'){
                         style3="style='background-color:#6cc;color:white;font-weight: bold;'";
                         box3="Commandé et livré"
                       }
                     }
                  }
                  
              }

               if(eligible=='BOX1' && box1=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='1';
               }else if(eligible=='BOX2' && box2=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='2';
               }else if(eligible=='BOX3' && box3=="Non commandé"){
                    $('#AddCommandeForm').removeAttr( "hidden");
                    commanderBoxType='3';
               }

                var newRow = '<tr>'+
                    '<td '+style1+'>'+box1+'</td>'+
                    '<td '+style2+'>'+box2+'</td>'+
                    '<td '+style3+'>'+box3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(newRow); 

                  var ref = '<tr>'+
                    '<td '+style1+'>'+ref1+'</td>'+
                    '<td '+style2+'>'+ref2+'</td>'+
                    '<td '+style3+'>'+ref3+'</td>'+
                    '</tr>';
                  $("#box_table tbody").append(ref);
            
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      case 'edit' :
        var getAllCities = {"methode":"getAllCities"};
          $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getAllCities,
          async:false,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            
            $.each(data['result'], function(key, val) {   
                 $('#ville_commande_edit').append($('<option>', {
                     value: val.id,
                     text: val.name
                 }));
                });

          },
          error:function(data){

          }
        });
        var getLivraison = {"methode":"getLivraison","id":id};
        $.ajax({
          url : "./lib/util.php",
          dataType: "json",
          type: "POST",
          data : getLivraison,
          beforeSend: function(){
            $('#loading-image').popup('show');
          },
          complete: function(){
            setTimeout(function(){$('#loading-image').popup('hide');},250);
          },
          success: function(data, textStatus, jqXHR) {
            // $.validate();
           /* $('.infos_client').text('');
            $("#baby_table tbody").empty();
            $('#Ville_id_edit').val(0);*/
            if(data.result != 0){
              var commande = data.result[0];
              console.log(commande);

              $('#id_commande_edit').val(commande.id);
              $('#id_commande_edit').text(commande.commande_id);
              $('#id_client_edit').text(commande.customer_id);
              $("#quartier_commande_edit option").remove();
             
              var getAllQuartiers = {"methode":"getAllQuartiers"};
                   $.ajax({
                   url : "./lib/util.php",
                   dataType: "json",
                   type: "POST",
                   data : getAllQuartiers,
                   beforeSend: function(){
                     $('#loading-image').popup('show');
                   },
                   complete: function(){
                     setTimeout(function(){$('#loading-image').popup('hide');},250);
                   },
                   success: function(data, textStatus, jqXHR) {
                    
                     $.each(data['result'], function(key, val) {   
                          $('#quartier_commande_edit').append($('<option>', {
                              value: val.id,
                              text: val.nom
                          }));
                          if(commande.quartier==val.nom){
                            $("#quartier_commande_edit").val(val.id);
                            $("#adresse_commande_edit").val(commande.adresseLivraison);
                          }
                     });

                   },
                   error:function(data){

                   }
                 });
              if(commande.type=='OX'){
                 $("#type_commande_edit").val("1");
                 gestion();
              }if(commande.type=='SB'){
                 $("#type_commande_edit").val("2");
                 gestion();
              }if(commande.type=='LD'){
                 $("#type_commande_edit").val("3");
                 gestion();
              }

              if(commande.status=="Livré"){
                 $("#status_commande_edit").val("1");
               }else {
                 $("#status_commande_edit").val("2");
               }

               if(commande.id_ville!=null){
                $("#ville_commande_edit").val(commande.id_ville);
                $("#relais_commande_edit option").remove();
                var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":commande.id_ville};
                  $.ajax({
                  url : "./lib/util.php",
                  dataType: "json",
                  type: "POST",
                  data : getRelaisListByVille,
                  beforeSend: function(){
                    $('#loading-image').popup('show');
                  },
                  complete: function(){
                    setTimeout(function(){$('#loading-image').popup('hide');},250);
                  },
                  success: function(data, textStatus, jqXHR) {
                    
                    $.each(data['result'], function(key, val) {   
                         $('#relais_commande_edit').append($('<option>', {
                             value: val.id_relais,
                             text: val.nom
                         }));
                      });

                     $('#relais_commande_edit').val(commande.id_relais);
                  },
                  error:function(data){

                  }
                });
               }

             
             // $('#type_commande_edit').val(commande.type);
             /* $('#id_commande_edit').val(client.email);
              $('#gsm_edit').val(client.gsm);
              $('#naissance_edit').val(client.naissance);
              $('#adresse_edit').val(client.adresse);
              $('#CP_edit').val(client.CP);
              $('#type_edit').val(client.type);
              $('#Ville_id_edit').val(client.Ville_id);
              $('#creationDate_edit').text(client.creationDateClient);*/
              

              /*var eligible = client.eligible;
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
              }*/
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
            $('.livraisonStatus'+id).html('Livré');
          },
          error: function (jqXHR, textStatus, errorThrown) {

          }
        });
        break;
      

      default :
        break;
    }
  });






$('#ville_commande_edit').change(function () {
     var id_ville = $('#ville_commande_edit').val();
     $("#relais_commande_edit option").remove();
     var getRelaisListByVille = {"methode":"getRelaisListByVille","id_ville":id_ville};
     $.ajax({
     url : "./lib/util.php",
     dataType: "json",
     type: "POST",
     data : getRelaisListByVille,
     beforeSend: function(){
       $('#loading-image').popup('show');
     },
     complete: function(){
       setTimeout(function(){$('#loading-image').popup('hide');},250);
     },
     success: function(data, textStatus, jqXHR) {
       
       $.each(data['result'], function(key, val) {   
            $('#relais_commande_edit').append($('<option>', {
                value: val.id_relais,
                text: val.nom
            }));
           });

     },
     error:function(data){

     }
   });
});


$('#type_commande_edit').change(function(){
   var type_commande = $('#type_commande_edit').val();
   if(type_commande=="1"){
    $("#ville_commande_edit").prop('disabled', 'disabled');
    $("#relais_commande_edit").prop('disabled', 'disabled');
    $("#quartier_commande_edit").prop('disabled', 'disabled');
    $("#adresse_commande_edit").attr('disabled','disabled');
   }
   else if(type_commande=="2"){
    
     $("#ville_commande_edit").prop('disabled', false);
     $("#relais_commande_edit").prop('disabled', false);

    $("#quartier_commande_edit").prop('disabled', 'disabled');
    $("#adresse_commande_edit").attr('disabled','disabled');
   }
   else if(type_commande=="3"){
     $("#adresse_commande_edit").removeAttr('disabled');
     $("#quartier_commande_edit").prop('disabled', false);
     $("#ville_commande_edit").prop('disabled', 'disabled');
     $("#relais_commande_edit").prop('disabled', 'disabled');
  }
});

function gestion(){
   var type_commande = $('#type_commande_edit').val();
   if(type_commande=="1"){
    $("#ville_commande_edit").prop('disabled', 'disabled');
    $("#relais_commande_edit").prop('disabled', 'disabled');
    $("#quartier_commande_edit").prop('disabled', 'disabled');
    $("#adresse_commande_edit").attr('disabled','disabled');
   }
   else if(type_commande=="2"){
    
     $("#ville_commande_edit").prop('disabled', false);
     $("#relais_commande_edit").prop('disabled', false);

    $("#quartier_commande_edit").prop('disabled', 'disabled');
    $("#adresse_commande_edit").attr('disabled','disabled');
   }
   else if(type_commande=="3"){
     $("#adresse_commande_edit").removeAttr('disabled');
     $("#quartier_commande_edit").prop('disabled', false);
     $("#ville_commande_edit").prop('disabled', 'disabled');
     $("#relais_commande_edit").prop('disabled', 'disabled');
  }
}

gestion();





 $('#edit_commande_form').on('submit', function (e) {

      var type_commande_edit     = $('#type_commande_edit').val(),
          status_commande_edit   = $("#status_commande_edit option:selected").text(),
          ville_commande_edit    = $('#ville_commande_edit').val(),
          relais_commande_edit   = $('#relais_commande_edit').val(),
          quartier_commande_edit = $('#quartier_commande_edit option:selected').text(),
          adresse_commande_edit  = $('#adresse_commande_edit').val(),
          id_commande_edit       = $('#id_commande_edit').val();
        
      var type_commande='';
      if(type_commande_edit=="1"){
        type_commande='OX';
      }else if(type_commande_edit=="2"){
        type_commande='SB';
      }else if(type_commande_edit=="3"){
        type_commande='LD'
      }
      
      var livraison={id:id_commande_edit,type:type_commande,status:status_commande_edit,relais:relais_commande_edit,quartier:quartier_commande_edit,adresse:adresse_commande_edit};
      
      var update_client = {'methode':'updateLivraison','livraison':livraison};
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
          if(data.status == 'success'){
           $('#alert_recover_ok').css('visibility','visible').fadeIn(1500);
             /*$('#'+id_client+' td:nth-child(2)').html(nom);
            $('#'+id_client+' td:nth-child(3)').html(prenom);
            $('#'+id_client+' td:nth-child(4)').html(email);
            $('#'+id_client+' td:nth-child(5)').html(gsm);
            $('#'+id_client+' td:nth-child(6)').html(getAge(dof));
            $('#'+id_client+' td:nth-child(7)').html(adresse);
            $('#'+id_client+' td:nth-child(8)').html($('#Ville_id_edit option:selected').text());*/
            setTimeout(function(){
              $('#edit').modal('toggle');
              $('#alert_recover_ok').css('visibility','hidden');
            }, 2000);
          }else{
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
 
 });



});

 