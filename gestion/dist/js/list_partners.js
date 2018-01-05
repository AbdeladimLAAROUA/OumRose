
$(document).ready(function() {

    var table/*,table2,table3*/,id_client;
    var id_clientEdit='0',commanderBoxBebe='0';
    var currentId='';
    var babiesList= [];
    var babiesList2= [];
    var commanderBoxType;
    var materniteFinal;
    var script = $('script[src*=list_2]');
    var role = script.attr('data-role');
    var list = script.attr('data-list');
    setTimeout(function () {
        $('#loading-image').popup('hide');
    }, 250);


    console.log("get "+list);
    table=$('#table_clients').DataTable({
        "bProcessing" : true,
        "bServerSide" : true,
        "sAjaxSource" : "./lib/server_processingPartners.php",
        "columns"       : [
            { data: "1" },
            { data: "2" },
            { data: "3" },
            { data: "4" },
            { data: "5" },
            {
                data: "0",
                render: function (data, type, row) {
                    var ret = '<button class="btn btn-default btn-xs action" data-type="view" data-id="' + data + '" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>' +
                        '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="' + data + '" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>';
                        /*'<button class="btn btn-danger btn-xs action" data-type="delete" data-id="' + data + '" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>';*/
                    return ret;
                }
            }
        ],
    });




    $("#table_clients tbody" ).on( "click", 'button',function() {
        var type  = $(this).data("type"),
            id    = $(this).data("id");
        currentId=id;
        switch (type){
            case 'view' :
                var getPartner = {"methode":"getPartner","id":id};
                $.ajax({
                    url : "./lib/util.php",
                    dataType: "json",
                    type: "POST",
                    data : getPartner,
                    beforeSend: function(){
                        $('#loading-image').popup('show');
                    },
                    complete: function(){
                        setTimeout(function(){$('#loading-image').popup('hide');},250);
                    },
                    success: function(data, textStatus, jqXHR) {
                        if(data.result != 0){
                            var partner = data.result[0];
                            $('#name').text(partner.Name);
                            $('#adresse').text(partner.adresse);
                            $('#status').text(partner.status);
                            $('#type').text(partner.type);
                            $('#fixe').text(partner.fixe);
                        }
                        setTimeout(function () {
                            $('#loading-image').popup('hide');
                        }, 250);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        setTimeout(function () {
                            $('#loading-image').popup('hide');
                        }, 250);
                    }
                });
                break;
            case 'edit' :
                var getPartner = {"methode":"getPartner","id":id};
                $.ajax({
                    url : "./lib/util.php",
                    dataType: "json",
                    type: "POST",
                    data : getPartner,
                    beforeSend: function(){
                        $('#loading-image').popup('show');
                    },
                    complete: function(){
                        setTimeout(function(){$('#loading-image').popup('hide');},250);
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (data.result != 0) {
                            var partner = data.result[0];
                            $('#name_edit').val(partner.Name);
                            $('#adresse_edit').val(partner.adresse);
                            $('#status_edit').val(partner.status);
                            $('#type_edit').val(partner.type);
                            $('#fixe_edit').val(partner.fixe);
                            $('#lng_edit').val(partner.lng);
                            $('#lat_edit').val(partner.lat);
                        }
                        setTimeout(function () {
                            $('#loading-image').popup('hide');
                        }, 250);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        setTimeout(function () {
                            $('#loading-image').popup('hide');
                        }, 250);
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
                setTimeout(function () {
                    $('#loading-image').popup('hide');
                }, 250);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                setTimeout(function () {
                    $('#loading-image').popup('hide');
                }, 250);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });


    $('#editForm').validator().on('submit', function (e) {


            // everything looks good!
            console.log("everything looks good!");
            e.preventDefault();
            var name     = $('#name_edit').val(),
                id      = currentId,
                adresse  = $('#adresse_edit').val(),
                adresseGoogle  = $('#adresseGoogle_edit').val(),
                status   = $('#status_edit').val(),
                type     = $('#type_edit').val(),
                fixe     = $('#fixe_edit').val();
                lng     = $('#lng_edit').val();
                lat     = $('#lat_edit').val();
            var partner={'id':id,'name':name,'adresse':adresse,'status':adresse,'status':status,'type':type,'fixe':fixe,'lng':lng,'lat':lat}
            var update_partner = {'methode':'updatePartner','partner':partner};
            var geocoder = new google.maps.Geocoder();
           if(adresseGoogle!==""){
               geocoder.geocode({'address': adresseGoogle}, function (results, status) {

                   if (status == google.maps.GeocoderStatus.OK) {
                       partner.lat = results[0].geometry.location.lat();
                       partner.lng = results[0].geometry.location.lng();
                       console.log(update_partner);
                       $.ajax({
                           url: "./lib/util.php",
                           dataType: "json",
                           type: "POST",
                           data: update_partner,
                           beforeSend: function () {
                               $('#loading-image').popup('show');
                           },
                           complete: function () {
                               $('#loading-image').popup('hide');
                           },
                           success: function (data, textStatus, jqXHR) {
                               if (data.status == 'OK') {
                                   $('#alert_recover_ok').css('display', 'none').fadeIn(1500);

                               } else {
                                   $('#alert_recover_ko').css('display', 'none').fadeIn(1500);
                               }

                               setTimeout(function () {
                                   $('#edit').modal('toggle');
                                   $('#loading-image').popup('hide');
                                   $('#alert_recover_ok').css('display', 'none');
                                   $('#alert_recover_ko').css('display', 'none');
                                   $('#alert_recover_ko_create').css('display', 'none');
                                   $('#alert_invalid_adresse').css('display', 'none');
                               }, 2000);

                           },
                           error: function (jqXHR, textStatus, errorThrown) {
                               setTimeout(function () {
                                   $('#loading-image').popup('hide');
                               }, 250);
                               console.log(jqXHR);
                               console.log(textStatus);
                               console.log(errorThrown);
                           }
                       });

                   } else {
                       $('#alert_invalid_adresse').css('visibility', 'visible').fadeIn(1500);
                   }
               })
           }else{
                $.ajax({
                    url: "./lib/util.php",
                    dataType: "json",
                    type: "POST",
                    data: update_partner,
                    beforeSend: function () {
                        $('#loading-image').popup('show');
                    },
                    complete: function () {
                        $('#loading-image').popup('hide');
                    },
                    success: function (data, textStatus, jqXHR) {
                        if (data.status == 'OK') {
                            $('#alert_recover_ok').css('display', 'none').fadeIn(1500);

                        } else {
                            $('#alert_recover_ko').css('display', 'none').fadeIn(1500);
                        }

                        setTimeout(function () {
                            $('#edit').modal('toggle');
                            $('#loading-image').popup('hide');
                            $('#alert_recover_ok').css('display', 'none');
                            $('#alert_recover_ko').css('display', 'none');
                            $('#alert_recover_ko_create').css('display', 'none');
                            $('#alert_invalid_adresse').css('display', 'none');
                        }, 2000);

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        setTimeout(function () {
                            $('#loading-image').popup('hide');
                        }, 250);
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                })

            }

    });




    $('#createPartnerForm').on('submit', function (e) {
        //console.log('id_client submit:'+id_client);
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            alert("handle the invalid form...");
        } else {
            // everything looks good!
            // console.log("everything looks good!");
            var name     = $('#name_create').val(),
                adresse  = $('#adresse_create').val(),
                adresseGoogle  = $('#adresse_google').val(),
                fixe   = $('#fixe_create').val(),
                type     = $('#type_create').val(),
                status     = $('#status_create').val(),
                lat='',
                lng='';


            var geocoder = new google.maps.Geocoder();
            var ok = false;

            geocoder.geocode({'address': adresseGoogle}, function (results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    lat = results[0].geometry.location.lat();
                    lng = results[0].geometry.location.lng();
                    console.log('adresse:',adresse,lat);
                    var obj = {
                        'name': name,
                        'adresse': adresse,
                        'fixe': fixe,
                        'type': type,
                        'status': status,
                        'lng': results[0].geometry.location.lng(),
                        'lat': results[0].geometry.location.lat()
                    };
                    var create_partner = {'methode': 'createPartner', 'partner': obj};

                    $.ajax({
                        url: "./lib/util.php",
                        dataType: "json",
                        type: "POST",
                        data: create_partner,
                        beforeSend: function () {
                            $('#loading-image').popup('show');
                        },
                        complete: function () {
                            $('#loading-image').popup('hide');
                        },
                        success: function (data, textStatus, jqXHR) {
                            if (data.status == 'OK') {
                                $('#alert_recover_ok_create').css('display', 'none').fadeIn(1500);

                            } else {
                                $('#alert_recover_ko_create').css('display', 'none').fadeIn(1500);
                            }

                            console.log(data.status);

                            setTimeout(function () {
                                $('#createUser').modal('toggle');
                                $('#loading-image').popup('hide');
                                $('#alert_recover_ok_create').css('display', 'none');
                                $('#alert_recover_ko_create').css('display', 'none');
                                $('#alert_recover_ko_create').css('display', 'none');
                                $('#alert_invalid_adresse').css('display', 'none');
                            }, 2000);

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            setTimeout(function () {
                                $('#loading-image').popup('hide');
                            }, 250);
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        }
                    });

                }else{
                    $('#alert_invalid_adresse').css('visibility', 'visible').fadeIn(1500);
                }
            });


            if(true){

            }



        }
    });










});

