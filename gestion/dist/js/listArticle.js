$(function () {
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });
  var table_p = $("#table_acrticles_p").DataTable(),
      table_f = $("#table_acrticles_f").DataTable();
  var data_search_p,data_search_f;

  $("#export_p").on("click", function() {
    search = table_p.rows( { filter : 'applied'} ).data();
    console.log(search);

    var arr = [];;
    $.each(search, function(key, val) {
      arr.push(val);
    });
    console.log(arr);

    var obj = {'methode' : 'exportPere','data':arr};
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
        window.open('http://localhost:8080/OumRose/gestion/downloads/'+data+'.xlsx','_blank' );
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  });

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
          var rowNode = table_p.row.add([
                          val.id,
                          val.name,
                          val.description,
                          val.debut,
                          val.fin,
                          '<button class="btn btn-primary btn-xs action" data-type="add_fils" data-id="'+val.id+'" data-toggle="modal" data-target="#add_fils" ><span class="glyphicon glyphicon-plus"></span></button>'+
                          '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                          '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id+'" data-toggle="modal" data-target="#edit_parent" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                          '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.id+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'
                        ])
                        .draw()
                        .node();

          $(rowNode)
            .attr('id','box_'+val.id);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  var obj_p = {'methode' : 'getAllProduct'};
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
          var rowNode = table_f.row.add([
                          val.id_product,
                          val.name,
                          val.Name,
                          val.RefBox,
                          '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+val.id_product+'" data-toggle="modal" data-target="#view_fils" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
                          '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+val.id_product+'" data-toggle="modal" data-target="#edit_fils" ><span class="glyphicon glyphicon-pencil"></span></button>'+
                          '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+val.id_product+'" data-toggle="modal" data-target="#delete_fils" ><span class="glyphicon glyphicon-trash"></span></button>'
                        ])
                        .draw()
                        .node();

          $(rowNode)
            .attr('id','product_'+val.id_product);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });

  $('#addParentForm').validator({
    custom: {
      greater: function ($el) {
        var input = $el.data("greater")
        if (parseInt($el.val()) < parseInt($(input).val()) ) {
          return "Hey, that's not valid"
        }
      }
    }
  });

  $('#editParentForm').validator({
    custom: {
      greater: function ($el) {
        var input = $el.data("greater")
        if (parseInt($el.val()) < parseInt($(input).val()) ) {
          return "Hey, that's not valid"
        }
      }
    }
  });

  $('#addParentForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      console.log("parent handle the invalid form...");
    } else {
      // everything looks good!
      console.log("parent everything looks good!");
      var box = getArticleFromView();
      // console.log(box);
      var res = addBox(box);
      // console.log(res);
      if(res.result == 1){
        var id = res.inserted_id;
        $('#alert_recover_ok_add_p').css('visibility','visible').fadeIn(1500);

        table_p.row.add([
          id,
          box.name,
          box.description,
          box.debut,
          box.fin,
          '<button class="btn btn-primary btn-xs action" data-type="add_fils" data-id="'+id+'" data-toggle="modal" data-target="#add_fils" ><span class="glyphicon glyphicon-plus"></span></button>'+
          '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+id+'" data-toggle="modal" data-target="#view" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
          '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+id+'" data-toggle="modal" data-target="#edit_parent" ><span class="glyphicon glyphicon-pencil"></span></button>'+
          '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+id+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'
        ]).draw(false);

        setTimeout(function(){
          $('#add_parent').modal('toggle');
          $('#alert_recover_ok_add_p').css('visibility','hidden');
        }, 2000);
      }else{
        $('#alert_recover_ko_add_p').css('visibility','visible').fadeIn(1500);

        setTimeout(function(){
          $('#add_parent').modal('toggle');
          $('#alert_recover_ko_add_p').css('visibility','hidden');
        }, 2000);
      }
    }
  });
  $('#editParentForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      console.log("handle the invalid form...");
    } else {
      // everything looks good!
      console.log("everything looks good!");
      var box = getArticleFromViewEdit();
      console.log(box);
      var res = updateBox(box);
      console.log(res);
      if(res.result == 'success'){
        $('#alert_recover_ok_edit_p').css('visibility','visible').fadeIn(1500);

        $('#box_'+box.id+' td:nth-child(2)').html(box.name);
        $('#box_'+box.id+' td:nth-child(3)').html(box.description);
        $('#box_'+box.id+' td:nth-child(4)').html(box.debut);
        $('#box_'+box.id+' td:nth-child(5)').html(box.fin);

        setTimeout(function(){
          $('#edit_parent').modal('toggle');
          $('#alert_recover_ok_edit_p').css('visibility','hidden');
        }, 2000);
      }else{
        $('#alert_recover_ko_edit_p').css('visibility','visible').fadeIn(1500);

        setTimeout(function(){
          $('#edit_parent').modal('toggle');
          $('#alert_recover_ko_edit_p').css('visibility','hidden');
        }, 2000);
      }
    }
  });
  $('#addFilsForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      console.log("fils handle the invalid form...");
    } else {
      var product = getProductFromView();
      console.log(product);
      if(product.id_shop != 0 && product.id_box != 0){
        // everything looks good!
        console.log("fils everything looks good!");
        var res = addProduct(product);
        console.log(res);
        if(res.result == 1){
          var pro = getProductById(res.inserted_id)['result'][0];
          console.log(pro);

          $('#alert_recover_ok_add_f').css('visibility','visible').fadeIn(1500);

          table_f.row.add([
            pro.id_product,
            pro.name,
            pro.Name,
            pro.RefBox,
            '<button class="btn btn-default btn-xs action" data-type="view" data-id="'+pro.id_product+'" data-toggle="modal" data-target="#view_fils" ><span class="glyphicon glyphicon-eye-open"></span></button>'+
            '<button class="btn btn-primary btn-xs action" data-type="edit" data-id="'+pro.id_product+'" data-toggle="modal" data-target="#edit_fils" ><span class="glyphicon glyphicon-pencil"></span></button>'+
            '<button class="btn btn-danger btn-xs action" data-type="delete" data-id="'+pro.id_product+'" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>'
            ]).draw( false );

          setTimeout(function(){
            $('#add_fils').modal('toggle');
            $('#alert_recover_ok_add_f').css('visibility','hidden');
          }, 2000);
        }else{
          $('#alert_recover_ko_add_f').css('visibility','visible').fadeIn(1500);

          setTimeout(function(){
            $('#add_fils').modal('toggle');
            $('#alert_recover_ko_add_f').css('visibility','hidden');
          }, 2000);

        }
      }
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
      var product = getProductFromViewEdit();
      console.log(product);
      var res = updateProduct(product);
      console.log(res);
      if(res.result == 'success'){
        var pro = getProductById(product.id)['result'][0];
        console.log(pro);
        $('#alert_recover_ok_edit_f').css('display','block').fadeIn(1500);

        $('#product_'+pro.id_product+' td:nth-child(2)').html(pro.name);
        $('#product_'+pro.id_product+' td:nth-child(3)').html(pro.Name);
        $('#product_'+pro.id_product+' td:nth-child(4)').html(pro.RefBox);

        setTimeout(function(){
          $('#edit_fils').modal('toggle');
          $('#alert_recover_ok_edit_f').css('display','none');
        }, 2000);
      }else{
        $('#alert_recover_ko_edit_f').css('visibility','visible').fadeIn(1500);

        setTimeout(function(){
          $('#edit_fils').modal('toggle');
          $('#alert_recover_ko_edit_f').css('visibility','hidden');
        }, 2000);
      }
    }
  });

  $("#table_acrticles_p tbody" ).on( "click", 'button',function() {
    var type  = $(this).data("type"),
        id    = $(this).data("id");
    console.log(type+" - "+id);
      switch (type){
        case 'view' :
          // console.log(getBoxById(id));
          var box = getBoxById(id).result[0];
          $('.infos_ar_p').text('');
          $('#id_article_p').text(box.id);
          $('#nom_article_p').text(box.name);
          $('#debut_article_p').text(box.debut);
          $('#fin_article_p').text(box.fin);
          $('#description_article_p').text(box.description);
          break;
        case 'add_fils' :
          remplirShopSelect('shop_add',getAllShop());
          remplirArticleSelect('article_p_add',getAllBox());
          $('#article_p_add').val(id);
          $('#ref_add_f').val('');
          $('#addFilsForm').validator('validate');
          $('#article_p_add').prop('disabled', 'disabled');
          break;
        case 'edit' :
          var box = getBoxById(id).result[0];
          $('#id_box_edit_p').text(box.id);
          $('#nom_edit_p').val(box.name);
          $('#debut_edit').val(box.debut);
          $('#fin_edit').val(box.fin);
          $('#description_edit_p').val(box.description);
          $('#editParentForm').validator('validate');
          break;
        case 'delete' :
          $("#conf_supp_p").data("id",id);
          break;
        default :

          break;
    }
  });

  $("#table_acrticles_f tbody" ).on( "click", 'button',function() {
    var type  = $(this).data("type"),
        id    = $(this).data("id");
    console.log(type+" - "+id);
      switch (type){
        case 'view' :
          // console.log(getProductById(id));
          var product = getProductById(id).result[0];
          $('.infos_ar_f').text('');
          $('#id_article_f').text(product.id_product);
          $('#type_article_f').text(product.name);
          $('#ref_article_p').text(product.RefBox);
          $('#shop').text(product.Name);
          $('#description_ar_p').text(product.description);
          $('#status_shop').text(product.status);
          break;
        case 'delete' :
          // console.log('conf_supp_f');
          $("#conf_supp_f").data("id",id);
          break;
        case 'edit' :
          remplirShopSelect('shop_edit',getAllShop());
          remplirArticleSelect('article_p_edit',getAllBox());
          var product = getProductById(id).result[0];
          $('#id_product_edit_f').text(product.id_product);
          $('#ref_edit_f').val(product.RefBox);
          $('#article_p_edit').val(product.id_box);
          $('#shop_edit').val(product.id_shop);
          $('#editFilsForm').validator('validate');
          break;
        default :

          break;

    }
  });

  $("#add_parent_btn").on("click", function() {

  });

  $("#add_fils_btn").on("click", function() {
    remplirShopSelect('shop_add',getAllShop());
    remplirArticleSelect('article_p_add',getAllBox());
    $('#article_p_add').val(0);
    $('#article_p_add').prop('disabled', false);
    $('#ref_add_f').val('');
    $('#addFilsForm').validator('validate');
  });

  $("#conf_supp_p").on("click", function() {
    var id = $(this).data("id"),
        res = deleteBox(id);
    console.log(res);
    if(res.result == 1){
      var tr = $("#box_"+id);
      table_p.row(tr).remove().draw();
      $("#delete").modal('toggle');
    }
  });

  $("#conf_supp_f").on("click", function() {
    var id = $(this).data("id"),
        res = deleteProduct(id);
    console.log(res);
    if(res.result == 1){
      var tr = $("#product_"+id);
      table_f.row(tr).remove().draw();
      $("#delete_fils").modal('toggle');
    }
  });

});
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
function addProduct(product) {
  var res,obj = {'methode' : 'addProduct', 'product':product};
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
function addBox(box) {
  var res,obj = {'methode' : 'addBox', 'box':box};
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

function updateBox(box) {
  var res,obj = {'methode' : 'updateBox', 'box':box};
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

function updateProduct(product) {
  var res,obj = {'methode' : 'updateProduct', 'product':product};
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

function deleteBox(id) {
  var res,obj = {'methode' : 'deleteBox', 'id':id};
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
function deleteProduct(id) {
  var res,obj = {'methode' : 'deleteProduct', 'id':id};
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
function getProductFromView(){
  var refProduct  = $('#ref_add_f').val(),
      id_box      = $('#article_p_add').val(),
      id_shop     = $('#shop_add').val();

  return {'refProduct':refProduct,'id_box':id_box,'id_shop':id_shop};
}
function getArticleFromView(){
  var name          = $('#nom_add_p').val(),
      debut         = $('#debut_add').val(),
      fin           = $('#fin_add').val(),
      description   = $('#description_add_p').val();

  return {'name':name,'debut':debut,'fin':fin,'description':description};
}
function getProductFromViewEdit(){
  var RefBox  = $('#ref_edit_f').val(),
      id_box  = $('#article_p_edit').val(),
      id_shop = $('#shop_edit').val(),
      id      = $('#id_product_edit_f').text();

  return {'RefBox':RefBox,'id_box':id_box,'id_shop':id_shop, 'id':id};
}
function getArticleFromViewEdit(){
  var name          = $('#nom_edit_p').val(),
      debut         = $('#debut_edit').val(),
      fin           = $('#fin_edit').val(),
      description   = $('#description_edit_p').val(),
      id            = $('#id_box_edit_p').text();

  return {'name':name,'debut':debut,'fin':fin,'description':description,'id':id};
}
function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    return age;
}