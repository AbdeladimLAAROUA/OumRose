$(function () {
 
  // Initialize the plugin
  $('#loading-image').popup({
    blur: false
  });
  
  var table_cat_n,table_temp;
  var postsByCat = getPotsByCat()['result'];
  console.log(postsByCat);
  fillCatTable(postsByCat);

  table_cat_n = $("#table_categorie_post").DataTable();
  // Add event listener for opening and closing details
  $('#table_categorie_post tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table_cat_n.row( tr );

      if ( row.child.isShown() ) {
          // This row is already open - close it
          row.child.hide();
          tr.removeClass('shown');
      }
      else {
          // Open this row
          var id = $(this).data("id");
          row.child( getPostsTableByCat(id)).show();
          tr.addClass('shown');
          table_temp = $("#table_categorie_"+id).DataTable();
      }
  });

  $("#add_post_btn").on("click", function() {
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
  });


  $('#addPostForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // alert("handle the invalid form...");
      console.log("handle the invalid form...");
    } else {
      // everything looks good!
      console.log("everything looks good!");

      // console.log(tinyMCE.getContent('description_post'));
      // console.log(tinyMCE.getContent('contenu_post'));

      get_editor_content();
    }
  });
});

function get_editor_content() {
  // Get the HTML contents of the currently active editor
  console.debug(tinyMCE.activeEditor.getContent());
  //method1 getting the content of the active editor
  alert(tinyMCE.activeEditor.getContent());
  //method2 getting the content by id of a particular textarea
  alert(tinyMCE.get('description_post').getContent());
}

function getPotsByCat() {
  var res,obj = {'methode' : 'getNumberPostsByCat'};
  res = ajaxRequest(obj);
  return res;
}

function getPotsByIdCat(id) {
  var res,obj = {'methode' : 'getPostsByCatId', 'id': id};
  res = ajaxRequest(obj);
  return res;
}

function ajaxRequest(obj) {
  var res = null;
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

function fillCatTable(data){
  $.each(data, function(key, val) {
    var newRow = '<tr id="cat_'+val.catID+'">'+
                '<td class=" details-control" data-id="'+val.catID+'"></td>'+
                '<td>'+val.catTitle+'</td>'+
                '<td>'+val.nombre+'</td>'+
                '</tr>';
    $("#table_categorie_post tbody").append(newRow);
    console.log(val);
  });
}

function getPostsTableByCat(id){
  console.log(id);
  var table = '<table id="table_categorie_'+id+'" class="table table_cat">'+
              '<thead>'+
              '<tr>'+
              '<th>ID</th>'+
              '<th>Titre</th>'+
              '<th>Date de publication</th>'+
              '</tr>'+
              '</thead>'+
              '<tbody>';
  var posts = getPotsByIdCat(id)['result'];
  console.log(posts);

  $.each(posts, function(key, val) {
    var newRow =  '<tr id="post_'+id+'_'+val.postID+'">'+
                  '<td>'+val.postID+'</td>'+
                  '<td>'+val.postTitle+'</td>'+
                  '<td>'+val.postDate+'</td>'+
                  '</tr>';
    table += newRow;
    console.log(val);
  });
  table +=  '</tbody>'+
            '<tfoot>'+
            '<tr>'+
            '<th>ID</th>'+
            '<th>Titre</th>'+
            '<th>Date de publication</th>'+
            '</tr>'+
            '</tfoot>'+
            '</table>';
  return table;
}