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

    $('#naissance_bebe_edit').datepicker({
        autoclose: true,
        forceParse: false,
        format: 'yyyy-mm-dd'
    });

    $('#naissance_create').datepicker({
        autoclose: true,
        forceParse: false,
        format: 'yyyy-mm-dd',
    });

    $('#naissance_create').datepicker("setDate", new Date(1987,0,01) );
    $('#naissance_create').val('');
    $('#naissance_bebe_create').datepicker({
        autoclose: true,
        forceParse: false,
        format: 'yyyy-mm-dd'
    });


});
$(document).ready(function() {

    var table/*,table2,table3*/,id_client;
    var id_clientEdit='0',commanderBoxBebe='0';
    var babiesList= [];
    var babiesList2= [];
    var commanderBoxType;
    var materniteFinal;
    var script = $('script[src*=list_2]');
    var role = script.attr('data-role');
    var list = script.attr('data-list');


    console.log("get "+list);
    table=$('#table_clients').DataTable({
        "bProcessing" : true,
        "bServerSide" : true,
        "lengthMenu": [[10, 25, 100, 500,2000], [10, 25, 100, 500,2000]],
        "sAjaxSource" : "./lib/server_processing.php?status="+list,
       /* "ajax": {
            "url": "./lib/server_processing.php",
            "type": "POST",
            "data": function (d) {
                d.status = list;
            }
        },*/
        "columns"       : [
            { data: "0",
                render: function(data, type, row) {
                    console.log(data);
                    return data;
                }
            },
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
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

            if(aData[9] == "blocked"){
                $('td', nRow).css('background-color', 'red');
                $('td', nRow).css('color', 'white');
            }
            else if ( aData[8].substring(0, 4) == "BOX1" )
            {
                $('td', nRow).css('background-color', '#ec7f8c');
                $('td', nRow).css('color', 'white');
            }
            else if ( aData[8].substring(0, 4) == "BOX2" )
            {
                $('td', nRow).css('background-color', '#6fc7c2');
                $('td', nRow).css('color', 'white');
            }
            else if ( aData[8].substring(0, 4) == "BOX3" )
            {
                $('td', nRow).css('background-color', '#8e6cac');
                $('td', nRow).css('color', 'white');
            }
        }
    });

     $("#export_c").on("click", function() {
       console.log('search');
       search = table.rows( { filter : 'applied'} ).data();
       console.log(search);

       var arr = [];
       $.each(search, function(key, val) {
         arr.push(val);
       });
       console.log(arr);

       var obj = {'methode' : 'exportClient','data':arr};
       console.log(obj);

       $.ajax({
         url : "./lib/excelExport.php",
         dataType: "json",
         type: "POST",
         data : obj,
         async : false,
         success: function(data, textStatus, jqXHR) {
           console.log(data);
           // res = data;
           window.open('./downloads/'+data+'.xlsx','_blank' );
         },
         error: function (jqXHR, textStatus, errorThrown) {
           console.log(jqXHR);
           console.log(textStatus);
           console.log(errorThrown);
         }
       });
     });

    var obj_city = {'methode' : 'getAllCitiesOx'}
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
                $("#Ville_id_create").append(newOption);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    /* var obj_type = {'methode' : 'getAllTypeMoms'}
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
     $("#type_create").append(newOption);
     });
     },
     error: function (jqXHR, textStatus, errorThrown) {
     console.log(jqXHR);
     console.log(textStatus);
     console.log(errorThrown);
     }
     });*/



    $("#table_clients tbody" ).on( "click", 'button',function() {
        var type  = $(this).data("type"),
            id    = $(this).data("id");
        console.log(type+" - "+id);

        switch (type){
            case 'view' :
                var get_client = {"methode":"getClient","id":id};
                $('#AddCommandeForm').attr("hidden", true);
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
                            var eligible = client.eligible.substring(0, 4);
                            var babies = data.result.baby;
                            console.log(babies.length);
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
                            for (var b = 0; b < babies.length; b++) {

                                var commandes = data.result.commandes[b];
                                var box = data.result.box[b];

                                var box1="Non commandé";
                                var style1="style=''";
                                var ref1="Réf : ";
                                var box2="Non commandé";
                                var style2="style=''";
                                var ref2="Réf : ";
                                var box3="Non commandé";
                                var style3="style=''";
                                var ref3="Réf : ";

                                //if(eligible=='BOX1' && box.length==0){
                                if(eligible=='BOX1'){
                                    $('#AddCommandeForm').removeAttr( "hidden");
                                    commanderBoxType='1';
                                    commanderBoxBebe=babies[b]['id'];
                                    //}if(eligible=='BOX2' && box.length==0){
                                }if(eligible=='BOX2'){
                                    $('#AddCommandeForm').removeAttr( "hidden");
                                    commanderBoxType='2';
                                    commanderBoxBebe=babies[b]['id'];

                                    // }if(eligible=='BOX3' && box.length==0){
                                }if(eligible=='BOX3'){
                                    $('#AddCommandeForm').removeAttr( "hidden");
                                    commanderBoxType='3';
                                    commanderBoxBebe=babies[b]['id'];
                                }

                                //Commandé et livré ...
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
                            };


                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
                break;
            case 'edit' :
                var get_client = {"methode":"getClient","id":id};
                $('.editBaby').attr('hidden','');
                $("#baby_table tbody" ).on( "click", 'a',function() {
                    babies=babiesList[babiesList.length-1];
                    var id    = $(this).data("id");
                    console.log(babiesList[babiesList.length-1]);
                    var index =findWithAttr(babies, 'id', id);
                    console.log('index : '+index);
                    updateBebe='true';
                    $('#id_bebe_edit').val(babies[index].id);
                    $('#prenom_bebe_edit').val(babies[index].prenom);
                    $('#sexe_bebe_id').val(babies[index].sexe);
                    $('#naissance_bebe_edit').val(babies[index].naissance);
                    $('#maternite_bebe_edit').val(babies[index].MATERNITE);
                    $('#gyneco_bebe_edit').val(babies[index].GYNECO);
                    $('.editBaby').removeAttr('hidden');
                });
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
                            babiesList.push(data.result.baby);

                            console.log(babiesList);
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
                                        '<td>'+val.GYNECO+'</td>'+
                                        '<td><a class="btn btn-primary btn-xs" data-id="'+val.id+'" ><span class="glyphicon glyphicon-pencil"></span></a></td>'+
                                        '</tr>';
                                    $("#baby_table tbody").append(newRow);
                                });

                                $('#id_bebe_edit').val(babies[0].id);
                                $('#prenom_bebe_edit').val(babies[0].prenom);
                                $('#sexe_bebe_id').val(babies[0].sexe);
                                $('#naissance_bebe_edit').val(babies[0].naissance);
                                $('#maternite_bebe_edit').val(babies[0].MATERNITE);
                                $('#gyneco_bebe_edit').val(babies[0].GYNECO);
                                updateBebe=true;


                                $(".bebeList" ).on( "click", '.addBebe',function() {
                                    updateBebe='false';
                                    $('#id_bebe_edit').val('');
                                    $('#prenom_bebe_edit').val('');
                                    $('#sexe_bebe_id').val('F');
                                    $('#naissance_bebe_edit').val('');
                                    $('#maternite_bebe_edit').val('');
                                    $('#gyneco_bebe_edit').val('');
                                    $('.editBaby').removeAttr('hidden');
                                });

                            }


                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });

                //$('#livraison').removeAttr("disabled");

                $( "#maternite_bebe_edit" ).keyup(function() {

                    if($('#maternite_bebe_edit').val()==""){
                        // $('#livraison').attr("disabled", "disabled").button('refresh');
                        $('#addCommandeButton').attr("disabled", "disabled").button('refresh');
                    }else{
                        $('#addCommandeButton').removeAttr("disabled");
                        // $('#livraison').removeAttr("disabled");
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

                    var tr = $("button[data-id="+id+"]").parents('tr');
                    console.log(table);
                    table.rows('.odd').remove().draw();
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
        console.log(this);
        var id = $(this).attr('id');
        console.log('id : '+id);
        var res = id.split("_");
        id_client = id;
        console.log('id_client click :'+id_client);
        //myTable.row( this ).edit();
    });
    $('.myFromSubmit,#myFormBb').on('click', function (e) {

        {
            // everything looks good!
            console.log("everything looks good!");
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
                ville_name   = $('#Ville_id_edit option:selected').text();

            var prenomBebe   = $('#prenom_bebe_edit').val(),
                sexeBebe   = $('#sexe_bebe_id').val(),
                gyneco      = $('#gyneco_bebe_edit').val(),
                naissanceBebe   = $('#naissance_bebe_edit').val(),
                maternite   = $('#maternite_bebe_edit').val(),
                idBebe   = $('#id_bebe_edit').val();

            var addLivraison=$('#livraison').is(":checked");

            if(!addLivraison){
                commanderBoxType=0;

            }
            /*if(addLivraison){
             $('#livraison').attr("disabled", "disabled").button('refresh');
             }*/
            var typeLivraison='';
            if($("#roleInput").val()=="user"){
                typeLivraison = "C"+maternite.toUpperCase().charAt(0);
                console.log('Type de livraison : '+typeLivraison);
            }else if($("#roleInput").val()=="mgr"){
                typeLivraison="OX";
            }

            var newLivraison={'type':typeLivraison,'addLivraison':addLivraison,'updateLivraison':$("#updateLivraison").val()}
            var obj =  {'id':id,'nom':nom,'prenom':prenom,'email':email,'gsm':gsm,'dof':dof,'adresse':adresse,'cp':cp,'type':type,'ville':ville,'ville_name':ville_name,'livraison':newLivraison,'id_box':commanderBoxType};
            var obj2 = {'id':idBebe,'prenomBebe':prenomBebe,'sexeBebe':sexeBebe,'naissanceBebe':naissanceBebe,'maternite':maternite,'gyneco':gyneco,'updateBebe':updateBebe};
            updateBebe='true';
            var update_client = {'methode':'updateClient','client':obj,'baby':obj2};
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
                        $('#alert_recover_ok').css('display', 'none').fadeIn(1500);
                        $('#'+id_client+' td:nth-child(2)').html(nom);
                        $('#'+id_client+' td:nth-child(3)').html(prenom);
                        $('#'+id_client+' td:nth-child(4)').html(email);
                        $('#'+id_client+' td:nth-child(5)').html(gsm);
                        $('#'+id_client+' td:nth-child(6)').html(getAge(dof));
                        $('#'+id_client+' td:nth-child(7)').html(adresse);
                        $('#'+id_client+' td:nth-child(8)').html($('#Ville_id_edit option:selected').text());
                        setTimeout(function(){
                            $('#edit').modal('toggle');
                            $('#alert_recover_ok').css('display', 'none');
                        }, 2000);
                        swal({
                            title: "Success",
                            text: "OK",
                            type: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });


                    }else{
                        console.log('Something went wrong !!');
                        $('#alert_recover_ko').css('display', 'none').fadeIn(1500);
                        swal(
                            'Oops...',
                            'Une erreur s\'est produite!',
                            'error'
                        )
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
            var maternite=$('.maternite_bebe_edit').text();
            console.log(maternite);
            var typeLivraison="OX";
            if($("#roleInput").val()=="user"){
                typeLivraison = "C"+materniteFinal.toUpperCase().charAt(0);
            }

            var obj = {'id':id};
            var livraison={user:'admin',id_box:commanderBoxType,'id_bebe':commanderBoxBebe,idClient:id,status:'Livré',type:typeLivraison};
            var commanderBox = {'methode':'addLivraison','livraison':livraison};
            console.log(commanderBox);

            if(materniteFinal!=''  || $("#roleInput").val()=="admin"){
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
                                $('#alert_recover_box_ok').css('display', 'none');
                            }, 2000);
                            $('#AddCommandeForm').attr("hidden", true);
                        }else{
                            console.log('Something went wrong !!');
                            $('#alert_recover_box_ko').css('display', 'none').fadeIn(1500);
                            setTimeout(function(){
                                $('#view').modal('toggle');
                                $('#alert_recover_box_ko').css('display', 'none');
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
        }
    });
    $('#blockUserForm').on('submit', function (e) {

        {

            var id=$('#id_client').text();
            var blockUser={'methode':'blockUser','id':id};
            if($("#roleInput").val()=="admin"){
                $.ajax({
                    url : "./lib/util.php",
                    dataType: "json",
                    type: "POST",
                    data : blockUser,
                    beforeSend: function(){
                        $('#loading-image').popup('show');
                    },
                    complete: function(){
                        $('#loading-image').popup('hide');
                    },
                    success: function(data, textStatus, jqXHR) {
                        console.log(data);
                        if(data.status == 'success'){

                            $("button[data-id="+id+"]").parents('tr').css({"background-color":'red'});
                            $("button[data-id="+id+"]").parents('tr').css({"color":'white'});
                            //$('#alert_block_user_ok').css('display', 'none').fadeIn(1000);
                            $('#alert_recover_block_ok').css('display', 'none').fadeIn(500);
                            setTimeout(function(){
                                $('#view').modal('toggle');
                                $('#alert_recover_block_ok').css('display', 'none');
                            }, 2000);
                        }else{
                            console.log('Something went wrong !!');
                            $('#alert_recover_block_ko').css('display', 'none').fadeIn(500);
                            setTimeout(function(){
                                $('#view').modal('toggle');
                                $('#alert_recover_block_ko').css('display', 'none');
                            }, 2000);
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            }else{
                alert("Action non permise");
            }
        }
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
            sexe_bebe   = $('#sexe_create').val();
            prenom_bebe   = $('#prenom_create').val();
            var obj = {'nom':nom,'prenom':prenom,'email':email,'gsm':gsm,'dof':dof,'adresse':adresse,'cp':cp,'type':type,'ville_id':ville_id,'naissance_bebe':naissance_bebe,'maternite':maternite,'gyneco':gyneco,'sexe_bebe':sexe_bebe,'prenom_bebe':prenom_bebe};
            var create_client = {'methode':'createClient','client':obj};


            var emailOrGsmAlreadyExists = {'methode':'emailOrGsmAlreadyExists','gsm':gsm,'email':email};
            $.ajax({
                url : "./lib/util.php",
                dataType: "json",
                type: "POST",
                data : emailOrGsmAlreadyExists,
                beforeSend: function(){
                    $('#loading-image').popup('show');
                },
                complete: function(){
                    $('#loading-image').popup('hide');
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data);
                    if(data.status == 'success'){

                        if(data.isUserAlreadyExist==true){

                            $('#alert_recover_ko_create').text(data.response);

                            $('#alert_recover_ko_create').css('display', 'none').fadeIn(1500);
                            /*  setTimeout(function(){
                             $('#createUser').modal('toggle');
                             $('#alert_recover_ok_create').css('display', 'none');
                             }, 2000);*/
                        }else{

                            var nom_createdClient='';
                            var email_createdClient='';
                            var password_createdClient='';
                            var token_createdClient='';
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
                                    if(data.result == 'success'){
                                        nom_createdClient=data.nom;
                                        email_createdClient=data.email;
                                        password_createdClient=data.password;
                                        token_createdClient=data.token;
                                        $('#alert_recover_ok_create').css('display', 'none').fadeIn(1500);
                                        setTimeout(function(){
                                            $('#createUser').modal('toggle');
                                            $('#alert_recover_ok_create').css('display', 'none');
                                            $('#alert_recover_ko_create').css('display', 'none');
                                            $('#alert_recover_ko_create').text("Quelque chose a mal tourné");
                                        }, 2000);

                                        swal({
                                            title: "Success",
                                            text: "OK",
                                            type: "success",
                                            timer: 2000,
                                            showConfirmButton: false
                                        });

                                        // Envoyer un email de validation
                                        var myData={'nom':nom_createdClient,'email':email_createdClient,'password':password_createdClient,'token':token_createdClient};

                                        $.ajax({
                                            url : "/emails/accountCreated.php",
                                            dataType: "json",
                                            type: "POST",
                                            data:myData,
                                            beforeSend: function(){
                                                $('#loading-image').popup('show');
                                            },
                                            complete: function(){
                                                $('#loading-image').popup('hide');
                                            },
                                            success: function(data, textStatus, jqXHR) {
                                                if(data.status == 'success'){
                                                    console.log('Email envoyé!! ');
                                                }else{
                                                    console.log('Email n\'est pas envoyé!! ');
                                                }

                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                console.log(jqXHR);
                                                console.log(textStatus);
                                                console.log(errorThrown);
                                            }
                                        });

                                    }else{
                                        console.log('Something went wrong !!');
                                        swal(
                                            'Oops...',
                                            'Une erreur s\'est produite!',
                                            'error'
                                        )
                                        $('#alert_recover_ko_create').css('display', 'none').fadeIn(1500);
                                        setTimeout(function(){
                                            $('#createUser').modal('toggle');
                                            $('#alert_recover_ko_create').css('display', 'none');
                                        }, 2000);
                                    }

                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                    swal(
                                        'Oops...',
                                        'Une erreur s\'est produite!',
                                        'error'
                                    );
                                }
                            });




                        }
                    }else{
                        $('#alert_recover_ko_create').css('display', 'none').fadeIn(1500);
                        setTimeout(function(){
                            $('#createUser').modal('toggle');
                            $('#alert_recover_ko_create').css('display', 'none');
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



    /***************************************** Espace livreur **************************************/

    $('#search').on( 'click', function (){

        var email_search=$('#email_search').val();
        var nom_search=$('#nom_search').val();
        var prenom_search=$('#prenom_search').val();
        var gsm_search=$('#gsm_search').val();
        var user_search={email:email_search,nom:nom_search,prenom:prenom_search,gsm:gsm_search};

        $.ajax({
            url : "./lib/util.php",
            dataType: "json",
            type: "POST",
            data : {'user':user_search,'methode':'searchUser'},
            success: function(data, textStatus, jqXHR) {
                $("#table_clients_search tbody").empty();
                $.each(data.result, function(key, val) {
                    var userStatus="Activé";
                    var userStatusColor="";
                    if(val.status!=="approved"){
                        userStatus = "Désactivé";
                        userStatusColor="danger";
                    }
                    console.log('---------->'+data.status);
                    var newRow = '<tr class="'+ userStatusColor+'">'+
                        '<td>'+val.id+'</td>'+
                        '<td>'+val.nom+'</td>'+
                        '<td>'+val.prenom+'</td>'+
                        '<td>'+val.gsm+'</td>'+
                        '<td>'+val.eligible+'</td>'+
                        '<td>' + userStatus + '</td>' +
                        '<td>'+
                        '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                        '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>';
                    +'</td>'+
                    '</tr>';
                    $("#table_clients_search tbody").append(newRow);
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

    });

    $("#table_clients_search tbody" ).on( "click", 'button',function() {
        var type  = $(this).data("type"),
            id    = $(this).data("id");
        console.log(type+" - "+id);
        var updateLivraison=false;

        switch (type){
            case 'view' :
                var get_client = {"methode":"getClient","id":id};
                $('#AddCommandeForm').attr("hidden", true);
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
                            var eligible = client.eligible.substring(0, 4);
                            var babies = data.result.baby;
                            console.log(babies.length);
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
                            for (var b = 0; b < babies.length; b++) {

                                var commandes = data.result.commandes[b];
                                var box = data.result.box[b];


                                var box1="Non commandé";
                                var style1="style=''";
                                var ref1="Réf : ";
                                var box2="Non commandé";
                                var style2="style=''";
                                var ref2="Réf : ";
                                var box3="Non commandé";
                                var style3="style=''";
                                var ref3="Réf : ";

                                //if(eligible=='BOX1' && box.length==0){
                                if(eligible=='BOX1' && role!='user'){
                                  $('#AddCommandeForm').removeAttr( "hidden");
                                 commanderBoxType='1';
                                 commanderBoxBebe=babies[b]['id'];
                                //}if(eligible=='BOX2' && box.length==0){
                                }
                                if(eligible=='BOX2'){
                                    materniteFinal=babies[b]['MATERNITE'];
                                    $('#AddCommandeForm').removeAttr( "hidden");
                                    if(materniteFinal==''){
                                        $('#addCommandeButton').attr("disabled", "disabled").button('refresh');
                                    }else{
                                        $('#addCommandeButton').removeAttr("disabled");
                                    }
                                    commanderBoxType='2';
                                    commanderBoxBebe=babies[b]['id'];

                                    // }if(eligible=='BOX3' && box.length==0){
                                }
                                if(eligible=='BOX3' && role!='user'){
                                 $('#AddCommandeForm').removeAttr( "hidden");
                                 commanderBoxType='3';
                                 commanderBoxBebe=babies[b]['id'];
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

                                /*    if(eligible=='BOX1' && box1=="Non commandé"){
                                 $('#AddCommandeForm').removeAttr( "hidden");
                                 commanderBoxType='1';
                                 }else if(eligible=='BOX2' && box2=="Non commandé"){
                                 $('#AddCommandeForm').removeAttr( "hidden");
                                 commanderBoxType='2';
                                 }else if(eligible=='BOX3' && box3=="Non commandé"){
                                 $('#AddCommandeForm').removeAttr( "hidden");
                                 commanderBoxType='3';
                                 }*/


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
                            };


                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
                break;
            case 'edit' :
                var get_client = {"methode":"getClient","id":id};
                console.log('edit client : '+id);
                var client='';
                $("input#livraison").attr("disabled", true);
                $("#livraison").prop('checked', false);

                $('.editBaby').attr('hidden','');


                //Afficher les détails d'un bébé après le click sur edit
                $("#baby_table tbody" ).on( "click", 'a',function() {
                    babies=babiesList2[babiesList2.length-1];
                    var id    = $(this).data("id");
                    var index =findWithAttr(babies, 'id', id);
                    console.log('index : '+index);
                    updateBebe='true';
                    $('#id_bebe_edit').val(babies[index].id);
                    $('#prenom_bebe_edit').val(babies[index].prenom);
                    $('#sexe_bebe_id').val(babies[index].sexe);
                    $('#naissance_bebe_edit').val(babies[index].naissance);
                    $('#maternite_bebe_edit').val(babies[index].MATERNITE);
                    $('#gyneco_bebe_edit').val(babies[index].GYNECO);
                    $('.editBaby').removeAttr('hidden');
                    if(client.eligible.substring(0, 4)=="BOX2" && client.eligible.slice(-1)==babies[index].ordre){
                        $("input#livraison").removeAttr('disabled');
                        $('#addCommandeButton').removeAttr("disabled");
                    }else{
                        $("input#livraison").attr("disabled", true);
                        $('#addCommandeButton').attr("disabled", "disabled").button('refresh')
                        console.log(client.eligible.substring(0, 4)+" "+babies[index].ordre);
                    }
                });

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
                            client = data.result.client[0];
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
                            babiesList2.push(data.result.baby);

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
                                        '<td>'+val.GYNECO+'</td>'+
                                        '<td><a class="btn btn-primary btn-xs" data-id="'+val.id+'" ><span class="glyphicon glyphicon-pencil"></span></a></td>'+
                                        '</tr>';
                                    $("#baby_table tbody").append(newRow);
                                    updateBebe=true;


                                    //mettre une valeur par defaut dans les champs du  bébé
                                    $('#id_bebe_edit').val(babies[0].id);
                                    $('#prenom_bebe_edit').val(babies[0].prenom);
                                    $('#sexe_bebe_id').val(babies[0].sexe);
                                    $('#naissance_bebe_edit').val(babies[0].naissance);
                                    $('#maternite_bebe_edit').val(babies[0].MATERNITE);
                                    $('#gyneco_bebe_edit').val(babies[0].GYNECO);
                                    updateBebe=true;

                                    $(".bebeList" ).on( "click", '.addBebe',function() {
                                        updateBebe='false';
                                        console.log(updateBebe);
                                        $('.editBaby').removeAttr('hidden');
                                        $('#id_bebe_edit').val('');
                                        $('#prenom_bebe_edit').val('');
                                        $('#sexe_bebe_id').val('F');
                                        $('#naissance_bebe_edit').val('');
                                        $('#maternite_bebe_edit').val('');
                                        $('#gyneco_bebe_edit').val('');
                                        $('.editBaby').removeAttr('hidden');
                                    });

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

    function findWithAttr(array, attr, value) {
        for(var i = 0; i < array.length; i++) {
            if(array[i][attr] == value) {
                return i;
            }else {
                console.log(array[i][attr]+' VS '+value);
            }
        }
        return -1;
    }




});

