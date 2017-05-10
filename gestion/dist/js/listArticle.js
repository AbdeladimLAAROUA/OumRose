$(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });

  var table_p,table_f;
  var obj = {'methode' : 'getAllBox'};
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
                      '<button class="btn btn-primary btn-xs action" data-type="add_fils" data-id="'+val.id+'" data-toggle="modal" data-target="#add_fils" ><span class="glyphicon glyphicon-plus"></span></button>'+
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit_parent" ><span class="glyphicon glyphicon-pencil"></span></button>'+
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
                      '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view_fils" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                      '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit_fils" ><span class="glyphicon glyphicon-pencil"></span></button>'+
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
  $('#addParentForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // alert("handle the invalid form...");
      console.log("handle the invalid form...");
    } else {
      // everything looks good!
      console.log("everything looks good!");
    }
  });
  $('#editParentForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // alert("handle the invalid form...");
      console.log("handle the invalid form...");
    } else {
      // everything looks good!
      console.log("everything looks good!");
    }
  });
  $('#addFilsForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // alert("handle the invalid form...");
      console.log("handle the invalid form...");
      remplirShopSelect('shop_add',getAllShop());
      remplirArticleSelect('article_p_add',getAllBox());
      console.log(getAllBox());
    } else {
      // everything looks good!
      console.log("everything looks good!");
    }
  });
  $('#editFilsForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // alert("handle the invalid form...");
      console.log("handle the invalid form...");
    } else {
      // everything looks good!
      console.log("everything looks good!");
    }
  });

  $("#table_acrticles_p tbody" ).on( "click", 'button',function() {
    var type  = $(this).data("type"),
        id    = $(this).data("id");
    console.log(type+" - "+id);
      switch (type){
        case 'view' :
          console.log(getBoxById(id));
        break;

        case 'add_fils' :


        break;
        default :

        break;

    }
  });
});
function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    return age;
}
function getAllShop() {
  var res,obj = {'methode' : 'getAllShop'};
  $.ajax({
    url : "./lib/util.php",
    dataType: "json",
    type: "POST",
    data : obj,
    async : false,
    success: function(data, textStatus, jqXHR) {
      //console.log(data);
      res = data;
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });
  return res;
}
function getAllBox() {
  var res,obj = {'methode' : 'getAllBox'};
  $.ajax({
    url : "./lib/util.php",
    dataType: "json",
    type: "POST",
    data : obj,
    async : false,
    success: function(data, textStatus, jqXHR) {
      //console.log(data);
      res = data;
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });
  return res;
}
function getBoxById(id) {
  var res,obj = {'methode' : 'getBoxById', 'id':id};
  $.ajax({
    url : "./lib/util.php",
    dataType: "json",
    type: "POST",
    data : obj,
    async : false,
    success: function(data, textStatus, jqXHR) {
      //console.log(data);
      res = data;
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });
  return res;
}
function getProductById(id) {
  var res,obj = {'methode' : 'getProductById', 'id':id};
  $.ajax({
    url : "./lib/util.php",
    dataType: "json",
    type: "POST",
    data : obj,
    async : false,
    success: function(data, textStatus, jqXHR) {
      //console.log(data);
      res = data;
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });
  return res;
}
function remplirShopSelect(id,data){
  $('#'+id)
    .find('option')
    .remove()
    .end()
    .append('<option value="0">Choisir la boutique</option>')
    .val('0');
  $.each(data.result, function(key, val) {
    var newOption = '<option value="'+val.id_shop+'">'+val.Name+' - '+val.name+'</option>';
    $("#"+id).append(newOption);
  });
}
function remplirArticleSelect(id,data){
  $('#'+id)
    .find('option')
    .remove()
    .end()
    .append('<option value="0">Choisir un produit</option>')
    .val('0');
  $.each(data.result, function(key, val) {
    var newOption = '<option value="'+val.id+'">'+val.name+'</option>';
    $("#"+id).append(newOption);
  });
}
