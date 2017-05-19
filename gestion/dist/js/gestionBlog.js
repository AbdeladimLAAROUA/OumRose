$(function () {
	// Initialize the plugin
	$('#loading-image').popup({
		blur: false
	});

	var table_cat,table_post;
	var cats = getAllCats();
	if(cats.status == 'success'){
		// console.log('success');
		// console.log(cats.result);
		fillTablesCats(cats.result);
		table_cat = $("#table_categories").DataTable();
	}

	var table_cat_n,table_temp;
	var postsByCat = getPotsByCat();
	console.log(postsByCat);
	if(postsByCat.status == 'success'){
		fillCatTable(postsByCat['result']);
		table_cat_n = $("#table_categorie_post").DataTable();
	}

	// Add event listener for opening and closing details
	$('#table_categorie_post tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table_cat_n.row( tr );

		if ( row.child.isShown() ) {
			// This row is already open - close it
			row.child.hide();
			tr.removeClass('shown');
		} else {
			// Open this row
			var id = $(this).data("id");
			row.child( getPostsTableByCat(id)).show();
			tr.addClass('shown');
			table_temp = $("#table_categorie_"+id).DataTable();
		}
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

	$('#addCatForm').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
			console.log("parent handle the invalid form...");
		} else {
			// everything looks good!
			console.log("parent everything looks good!");
			var cat = getCatFromView();
			var res = addCat(cat);
			if(res.status == 'success'){
				var id = res.inserted_id;
				$('#alert_recover_ok_add_cat').css('visibility','visible').fadeIn(1500);

				table_cat.row.add([
					id,
					cat.catTitle,
					'<button class="btn btn-primary btn-xs action" data-type="edit_cat" data-id="'+id+'" data-toggle="modal" data-target="#edit_cat" ><span class="glyphicon glyphicon-pencil"></span></button>'+
					'<button class="btn btn-danger btn-xs action" data-type="delete_cat" data-id="'+id+'" data-toggle="modal" data-target="#delete_cat" ><span class="glyphicon glyphicon-trash"></span></button>'
				]).draw(false);

				setTimeout(function(){
					$('#add_cat').modal('toggle');
					$('#alert_recover_ok_add_cat').css('visibility','hidden');
				}, 2000);
			}else{
				$('#alert_recover_ko_add_cat').css('visibility','visible').fadeIn(1500);

				setTimeout(function(){
					$('#add_cat').modal('toggle');
					$('#alert_recover_ko_add_cat').css('visibility','hidden');
				}, 2000);
			}
		}
	});

	$('#editCatForm').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
			console.log("parent handle the invalid form...");
		} else {
			// everything looks good!
			console.log("parent everything looks good!");
			var cat = getCatFromViewEdit();
			var res = updateCat(cat);
			if(res.result == 'success'){
				$('#alert_recover_ok_edit_cat').css('visibility','visible').fadeIn(1500);

				$('#cat_'+cat.id+' td:nth-child(2)').html(cat.catTitle);

				setTimeout(function(){
					$('#edit_cat').modal('toggle');
					$('#alert_recover_ok_edit_cat').css('visibility','hidden');
				}, 2000);
			}else{
				$('#alert_recover_ko_edit_cat').css('visibility','visible').fadeIn(1500);

				setTimeout(function(){
					$('#edit_cat').modal('toggle');
					$('#alert_recover_ko_edit_cat').css('visibility','hidden');
				}, 2000);
			}
		}
	});

	$("#table_categories tbody" ).on( "click", 'button',function() {
		var type  = $(this).data("type"),
			id    = $(this).data("id");
		console.log(type+" - "+id);
		switch (type){
			case 'edit_cat' :
				// console.log(getCatById(id));
				var cat = getCatById(id).result[0];
				$('#id_cat_edit').text(cat.catID);
				$('#nom_edit_cat').val(cat.catTitle);
				$('#editCatForm').validator('validate');
				break;
			case 'delete_cat' :
				$("#conf_supp_cat").data("id",id);
				break;
			default :

			break;
		}
	});

	$("#conf_supp_cat").on("click", function() {
		var id = $(this).data("id"),
			res = deleteCat(id);
		console.log(res);
		if(res.result == 'success'){
			var tr = $("#cat_"+id);
			table_cat.row(tr).remove().draw();
			$("#delete_cat").modal('toggle');
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

function fillTablesCats(data){
		console.log(data);
	$.each(data, function(key, val) {
		console.log(val);
		var newRow = '<tr id="cat_'+val.catID+'">'+
		'<td>'+val.catID+'</td>'+
		'<td>'+val.catTitle+'</td>'+
		'<td width="25%">'+
		'<button class="btn btn-primary btn-xs action" data-type="edit_cat" data-id="'+val.catID+'" data-toggle="modal" data-target="#edit_cat" ><span class="glyphicon glyphicon-pencil"></span></button>'+
		'<button class="btn btn-danger btn-xs action" data-type="delete_cat" data-id="'+val.catID+'" data-toggle="modal" data-target="#delete_cat" ><span class="glyphicon glyphicon-trash"></span></button>'+
		'</td>'+
		'</tr>';
		$("#table_categories tbody").append(newRow);
	});
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

function getAllCats() {
	var res,obj = {'methode' : 'getAllCats'};
	res = AjaxRequest(obj);
	return res;
}

function getCatById(id) {
	var res,obj = {'methode' : 'getCatById', 'id': id };
	res = AjaxRequest(obj);
	return res;
}

function addCat(cat) {
	var res,obj = {'methode' : 'addCat', 'cat': cat };
	res = AjaxRequest(obj);
	return res;
}

function updateCat(cat) {
	var res,obj = {'methode' : 'updateCat', 'cat': cat };
	res = AjaxRequest(obj);
	return res;
}

function deleteCat(id) {
	var res,obj = {'methode' : 'updateCat', 'id': id };
	res = AjaxRequest(obj);
	return res;
}

function getPotsByCat() {
	var res,obj = {'methode' : 'getNumberPostsByCat'};
	res = AjaxRequest(obj);
	return res;
}

function getPotsByIdCat(id) {
  var res,obj = {'methode' : 'getPostsByCatId', 'id': id};
  res = AjaxRequest(obj);
  return res;
}

function AjaxRequest(obj) {
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

function getCatFromView(){
	var name = $('#nom_add_cat').val();
	return {'catTitle':name};
}

function getCatFromViewEdit(){
	var name 	= $('#nom_edit_cat').val(),
		id 		= $('#id_cat_edit').text();
	return {'catTitle':name,'id' : id};
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