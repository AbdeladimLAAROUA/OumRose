$(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });

  var table_p,table_f;
  var obj = {'methode' : 'getAllBox'}
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
        console.log(data);
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="box_'+val.id+'">'+
                      '<td>'+val.id+'</td>'+
                      '<td>'+val.name+'</td>'+
                      '<td>'+val.description+'</td>'+
                      '<td>'+val.debut+'</td>'+
                      '<td>'+val.fin+'</td>'+
                      '<td width="25%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.id+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_acrticles_p tbody").append(newRow);
          // console.log(val);
        });

        table_p = $("#table_acrticles_p").DataTable();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  var obj_p = {'methode' : 'getAllProduct'}
    $.ajax({
      url : "./lib/util.php",
      dataType: "json",
      type: "POST",
      data : obj_p,
      beforeSend: function(){
        $('#loading-image').popup('show');
      },
      complete: function(){
        setTimeout(function(){$('#loading-image').popup('hide');},250);
      },
      success: function(data, textStatus, jqXHR) {
        console.log(data);
        // console.log(data.result);
        $.each(data.result, function(key, val) {
          var newRow = '<tr id="product_'+val.id+'">'+
                      '<td>'+val.id_product+'</td>'+
                      '<td>'+val.name+'</td>'+
                      '<td>'+val.Name+'</td>'+
                      '<td>'+val.RefBox+'</td>'+
                      '<td width="25%" align="center">'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                      '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.id+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'+
                      '</td>'+
                      '</tr>';
          $("#table_acrticles_f tbody").append(newRow);
          // console.log(val);
        });

        table_f = $("#table_acrticles_f").DataTable();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
});
function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    return age;
}