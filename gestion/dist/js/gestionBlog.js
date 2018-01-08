$(function () {
	// Initialize the plugin
	$('#loading-image').popup({
		blur: false
	});

	var table_cat;
	var table_cat_n,table_temp;
	var id_post,arrCats = [];

	table_cat 	= fillCats(table_cat);

	fillCatsPosts(table_cat_n);

	table_cat_n = $("#table_categorie_post").DataTable();


	// Add event listener for opening and closing details
	$('#table_categorie_post tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		// console.log(tr);
		var row = table_cat_n.row(tr);
		// console.log(row);

		if ( row.child.isShown() ) {
			// This row is already open - close it
			// console.log('close');
			row.child.hide();
			tr.removeClass('shown');
		} else {
			// Open this row
			// console.log('Open');
			var id = $(this).data("id");
			// console.log(id);
			row.child(getPostsTableByCat(id)).show().draw();
			// console.log(getPostsTableByCat(id));
			tr.addClass('shown');
			table_temp = $("#table_categorie_"+id).DataTable();
		}
	});
	
	$("#add_post_btn").on("click", function() {

		/*tinymce.init({
			selector: "#description_post",
			setup: function (editor) {
				editor.on('change', function () {
					tinymce.triggerSave();
					$('#description_post').trigger('input');
				});
			},
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview"
		});*/
		
		tinymce.init({
			selector: "#contenu_post",
			setup: function (editor) {
				editor.on('change', function () {
					tinymce.triggerSave();
					$('#contenu_post').trigger('input');
				});
			},
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview"
		});

		addCatList('#cat_div');
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
				$('#alert_recover_ok_add_cat').css('display','none').fadeIn(1500);

				table_cat.row.add([
					id,
					cat.catTitle,
					'<button class="btn btn-primary btn-xs action" data-type="edit_cat" data-id="'+id+'" data-toggle="modal" data-target="#edit_cat" ><span class="glyphicon glyphicon-pencil"></span></button>'+
					'<button class="btn btn-danger btn-xs action" data-type="delete_cat" data-id="'+id+'" data-toggle="modal" data-target="#delete_cat" ><span class="glyphicon glyphicon-trash"></span></button>'
				]).draw(false);

				setTimeout(function(){
					$('#add_cat').modal('toggle');
					$('#alert_recover_ok_add_cat').css('display','none')
				}, 2000);
			}else{
				$('#alert_recover_ko_add_cat').css('display','none').fadeIn(1500);

				setTimeout(function(){
					$('#add_cat').modal('toggle');
					$('#alert_recover_ko_add_cat').css('display','none')
				}, 2000);
			}
		}
	})

	$('#addTagForm').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
			console.log("parent handle the invalid form...");
		} else {
			// everything looks good!
			console.log("parent everything looks good!");
			var cat = getTagFromView();
			var res = addTag(cat);
			if(res.status == 'success'){
				var id = res.inserted_id;
				$('#alert_recover_ok_add_tag').css('display','none').fadeIn(1500);

				table_cat.row.add([
					id,
					cat.catTitle,
					'<button class="btn btn-primary btn-xs action" data-type="edit_cat" data-id="'+id+'" data-toggle="modal" data-target="#edit_cat" ><span class="glyphicon glyphicon-pencil"></span></button>'+
					'<button class="btn btn-danger btn-xs action" data-type="delete_cat" data-id="'+id+'" data-toggle="modal" data-target="#delete_cat" ><span class="glyphicon glyphicon-trash"></span></button>'
				]).draw(false);

				setTimeout(function(){
					$('#add_tag').modal('toggle');
					$('#alert_recover_ok_add_tag').css('display','none')
				}, 2000);
			}else{
				$('#alert_recover_ko_add_tag').css('display','none').fadeIn(1500);

				setTimeout(function(){
					$('#add_tag').modal('toggle');
					$('#alert_recover_ko_add_tag').css('display','none')
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
				$('#alert_recover_ok_edit_cat').css('display','none').fadeIn(1500);

				$('#cat_'+cat.id+' td:nth-child(2)').html(cat.catTitle);

				setTimeout(function(){
					$('#edit_cat').modal('toggle');
					$('#alert_recover_ok_edit_cat').css('display','none')
				}, 2000);
			}else{
				$('#alert_recover_ko_edit_cat').css('display','none').fadeIn(1500);

				setTimeout(function(){
					$('#edit_cat').modal('toggle');
					$('#alert_recover_ko_edit_cat').css('display','none')
				}, 2000);
			}
		}
	});

	$('#addPostForm').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
			console.log("handle the invalid form...");
		} else {
			// everything looks good!
            e.preventDefault();
			console.log("everything looks good !?");

			var catArray = [];
			$("#cat_div input:checkbox[name=categorie]:checked").each(function(){
				catArray.push($(this).val());
			});

			// console.log(get_editor_content('description_post'));
			// console.log(get_editor_content('contenu_post'));
			// console.log($('#title_post').val());
			// console.log(catArray);
			// console.log(catArray.length);

			if(catArray.length == 0){
				alert('Veuillez choisir une catégorie ou plus !');
			}else{

                var formData = new FormData($("#addImageForm")[0]);
                console.log($("#addImageForm"));
                console.log(formData);
                var file_name= AjaxRequestNoProcess(formData);
				var desc 	= $('#description_post').val();
				var content = get_editor_content('contenu_post');
				var title 	= $('#title_post').val();
				var image 	= file_name;
				var post 	= {'title':title,'desc':desc,'content':content,'catArray':catArray,'image':image};

				var res		= addPost(post);

				if(res.status == 'success'){
					var id = res.inserted_id;
					$('#alert_recover_ok_add_post').css('display','none').fadeIn(1500);

					// $( ".details-control" ).each(function( index ) {
					// 	console.log( index + ": " + $( this ).text() );
					// 	console.log('test');
					// });

					resetCatsPostsTable();

					setTimeout(function(){
						$('#add_post').modal('toggle');
						$('#alert_recover_ok_add_post').css('display','none')
					}, 2000)
                    swal({
                        title: "Success",
                        text: "OK",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
				}else{
					$('#alert_recover_ko_add_post').css('display','none').fadeIn(1500);

					setTimeout(function(){
						$('#add_post').modal('toggle');
						$('#alert_recover_ko_add_post').css('display','none')
					}, 2000);
				}
			}
		}
	});

	$('#editPostForm').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
			console.log("parent handle the invalid form...");
		} else {
			// everything looks good!
			console.log("parent everything looks good!");

			var catArray = [];
			$("#edit_cat_div input:checkbox[name=categorie]:checked").each(function(){
				catArray.push($(this).val());
			});

			if(catArray.length == 0){
				alert('Veuillez choisir une catégorie ou plus !');
			}else{

               /* var formData = new FormData($("#addImageForm")[0]);
                console.log($("#addImageForm"));
                console.log(formData);
                var file_name = AjaxRequestNoProcess(formData);
                var desc = $('#description_post').val();
                var content = get_editor_content('contenu_post');
                var title = $('#title_post').val();
                var image = file_name;
                var post = {'title': title, 'desc': desc, 'content': content, 'catArray': catArray, 'image': image};
                var res = addPost(post);*/

                var formData = new FormData($("#editImageForm")[0]);
                var file_name = AjaxRequestNoProcess(formData);

				var desc 	= $('#description_post_edit').val();
				var content = get_editor_content('contenu_post_edit');
				var title 	= $('#title_post_edit').val();
				var post 	= {'title':title,'desc':desc,'content':content,'catArray':catArray, 'postId':id_post};
                if (file_name !== "NO_IMG_UPLOADED") {
                    post["image"] = file_name;
                }
				var res		= updatePost(post);
				var status  = res.status;
				if($(catArray).not(arrCats).length === 0 && $(arrCats).not(catArray).length === 0){
                    swal({
                        title: "Success",
                        text: "OK",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
				}else{
					var etat, diff = [];
					if(catArray.length > arrCats.length){
						diff = $(catArray).not(arrCats).get();
						etat = 'add';
					}else{
						diff = $(arrCats).not(catArray).get();
						etat = 'delete';
					}

					$.each(diff, function(ind, val) {
						switch (etat){
							case 'add' :
								resultat 	= addPostCat(id_post,val);
								status 		= resultat.result;
								break;
							case 'delete' :
								resultat 	= deletePostCatUp(id_post,val);
								status 		= resultat.result;
								break;
							default :
							break;
						}
					});
				}

				if(status == 'success'){
					var id = res.inserted_id;
					$('#alert_recover_ok_edit_post').css('display','none').fadeIn(2000);

					resetCatsPostsTable();
                    swal({
                        title: "Success",
                        text: "OK",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    alert('here');
                    location.reload();
					setTimeout(function(){
						$('#edit_post').modal('toggle');
						$('#alert_recover_ok_edit_post').css('display','none')
					}, 2000);
				}else{
                    swal({
                        title: "Success",
                        text: "OK",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
					$('#alert_recover_ok_edit_post').css('display','none').fadeIn(2000);

					setTimeout(function(){
						$('#edit_post').modal('toggle');
						$('#alert_recover_ok_edit_post').css('display','none')
					}, 2000);
				}
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
		// console.log(id);
		// console.log(res);
		if(res.result == 'success'){
			var tr = $("#cat_"+id);
			table_cat.row(tr).remove().draw();
			$("#delete_cat").modal('toggle');
		}
	});

	$('#table_categorie_post tbody').on('click', 'button', function() {
	// Do something on an existent or future .dynamicElement
		var type  = $(this).data("type"),
			id    = $(this).data("id");
		console.log(type+" - "+id);
		switch (type){
			case 'edit_post' :
				addCatList('#edit_cat_div');
				var post = getPostById(id).result[0];
				var cats = getCatsByPostId(id).result;

				id_post = post.postID;
				$('#title_post_edit').val(post.postTitle);
				$('#description_post_edit').val(post.postDesc);
				$('#contenu_post_edit').val(post.postCont);


				$.each(cats, function(key, val) {
					$("#edit_cat_div input:checkbox[value="+val.catID+"]").attr("checked", true);
					// console.log(val);
					arrCats.push(val.catID);
				});

				/*tinymce.init({
					selector: "#description_post_edit",
					setup: function (editor) {
						editor.on('change', function () {
							tinymce.triggerSave();
							$('#description_post_edit').trigger('input');
						});
					},
					plugins: [
						"advlist autolink lists link image charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste"
					],
					toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
				});*/
				
				tinymce.init({
					selector: "#contenu_post_edit",
					setup: function (editor) {
						editor.on('change', function () {
							tinymce.triggerSave();
							$('#contenu_post_edit').trigger('input');
						});
					},
					plugins: [
						"advlist autolink lists link image charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste"
					],
					toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
				});

				$('#editPostForm').validator('validate');
				break;
			case 'delete_post' :
				$("#conf_supp_post").data("id",id);
				break;
			default :

			break;
		}
	});

	$("#conf_supp_post").on("click", function() {
		var id = $(this).data("id"),
			res = deletePost(id);
		// console.log(id);
		// console.log(res);
		if(res.result == 'success'){
			resetCatsPostsTable();
			$("#delete_post").modal('toggle');
		}
	});

});

function get_editor_content(id) {
	// Get the HTML contents of the currently active editor
	// console.debug(tinyMCE.activeEditor.getContent());
	//method1 getting the content of the active editor
	// alert(tinyMCE.activeEditor.getContent());
	//method2 getting the content by id of a particular textarea
	// alert(tinyMCE.get(id).getContent());
	return tinyMCE.get(id).getContent();
}

function fillTablesCats(data){
		// console.log(data);
	$.each(data, function(key, val) {
		// console.log(val);
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
		var newRow = 	'<tr id="cat_'+val.catID+'">'+
						'<td class=" details-control" data-id="'+val.catID+'"></td>'+
						'<td>'+val.catTitle+'</td>'+
						'<td>'+val.nombre+'</td>'+
						'</tr>';
		$("#table_categorie_post tbody").append(newRow);
		// console.log(val);
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
function addTag(tag) {
	var res,obj = {'methode' : 'addTag', 'tag': tag };
	res = AjaxRequest(obj);
	return res;
}

function updateCat(cat) {
	var res,obj = {'methode' : 'updateCat', 'cat': cat };
	res = AjaxRequest(obj);
	return res;
}

function deleteCat(id) {
	var res,obj = {'methode' : 'deleteCat', 'id': id };
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

function addPost(post) {
	var res,obj = {'methode' : 'addPost', 'post': post};
	res = AjaxRequest(obj);
	return res;
}

function getCatsByPostId(id) {
	var res,obj = {'methode' : 'getCatsByPostId', 'id': id};
	res = AjaxRequest(obj);
	return res;
}

function getPostById(id) {
	var res,obj = {'methode' : 'getPostById', 'id': id};
	res = AjaxRequest(obj);
	return res;
}

function deletePost(id) {
	var res,obj = {'methode' : 'deletePost', 'id': id};
	res = AjaxRequest(obj);
	return res;
}

function updatePost(post) {
	var res,obj = {'methode' : 'updatePost', 'post': post};
	res = AjaxRequest(obj);
	console.log(res);
	return res;
}

function addPostCat(id_post,id_cat) {
	var res,obj = {'methode' : 'addPostCat', 'id_cat': id_cat,'id_post':id_post};
	res = AjaxRequest(obj);
	return res;
}

function deletePostCat(id_post) {
	var res,obj = {'methode' : 'deletePostCat', 'id_post': id_post};
	res = AjaxRequest(obj);
	return res;
}


function deletePostCatUp(id_post,id_cat) {
	var res,obj = {'methode' : 'deletePostCatUp', 'id_cat': id_cat,'id_post':id_post};
	res = AjaxRequest(obj);
	return res;
}

function AjaxRequest(obj) {
	var res = null;
    console.log(obj);
	$.ajax({
		url : "./lib/util.php",
		dataType: "json",
		type: "POST",
		data : obj,
		async : false,
		success: function(data, textStatus, jqXHR) {
			console.log(data);
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

function AjaxRequestNoProcess(obj) {
    var res = null;
    $.ajax({
        type: "POST",
        url: "./lib/uploadImage.php",
        data: obj,
        cache: false,
        contentType: false,
        processData: false,
        async:false,
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            res=data;
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
function getTagFromView(){
	var name = $('#nom_add_tag').val();
	return {'catTitle':name};
}

function getCatFromViewEdit(){
	var name 	= $('#nom_edit_cat').val(),
		id 		= $('#id_cat_edit').text();
	return {'catTitle':name,'id' : id};
}

function getPostsTableByCat(id){
	// console.log(id);
	var table = '<table id="table_categorie_'+id+'" class="table table_cat">'+
				'<thead>'+
				'<tr>'+
				'<th>ID</th>'+
				'<th>Titre</th>'+
				'<th>Date de publication</th>'+
				'<th>Actions</th>'+
				'</tr>'+
				'</thead>'+
				'<tbody>';
	var posts = getPotsByIdCat(id)['result'];
	// conf_supp_postle.log(posts);

	$.each(posts, function(key, val) {
		var newRow =  	'<tr id="post_'+id+'_'+val.postID+'">'+
						'<td>'+val.postID+'</td>'+
						'<td>'+val.postTitle+'</td>'+
						'<td>'+val.postDate+'</td>'+
						'<td>'+
						'<button class="btn btn-primary btn-xs action" data-type="edit_post" data-id="'+val.postID+'" data-toggle="modal" data-target="#edit_post" ><span class="glyphicon glyphicon-pencil"></span></button>'+
						'<button class="btn btn-danger btn-xs action" data-type="delete_post" data-id="'+val.postID+'" data-toggle="modal" data-target="#delete_post" ><span class="glyphicon glyphicon-trash"></span></button>'+
						'</td>'+
						'</tr>';
		table += newRow;
	});
	table += 	'</tbody>'+
				'<tfoot>'+
				'<tr>'+
				'<th>ID</th>'+
				'<th>Titre</th>'+
				'<th>Date de publication</th>'+
				'<th>Actions</th>'+
				'</tr>'+
				'</tfoot>'+
				'</table>';

	return table;
}

function addCatList(id_div){
	var cats = getAllCats()['result'];

	$(id_div).empty();
    $("#tag_div").empty();
    $("#edit_tag_div").empty();

	$.each(cats, function(key, val) {
        var checkbox = '<div class="checkbox"><label><input type="checkbox" name="categorie" value="' + val.catID + '">' + val.catTitle + '</label></div>';
        $(id_div).append(checkbox);

		/*if(val.type==="cat"){
            var checkbox = '<div class="checkbox"><label><input type="checkbox" name="categorie" value="' + val.catID + '">' + val.catTitle + '</label></div>';
            $(id_div).append(checkbox);
		}else{
            var checkbox = '<div class="checkbox"><label><input type="checkbox" name="categorie" value="' + val.catID + '">' + val.catTitle + '</label></div>';
            $("#tag_div").append(checkbox);
            $("#edit_tag_div").append(checkbox);
		}*/

	});



	$.each(cats, function(key, val) {

	});
}

function fillCats(table_cat){
	var cats = getAllCats();
	if(cats.status == 'success'){
		fillTablesCats(cats.result);
		table_cat = $("#table_categories").DataTable();
	}
	return table_cat;
}

function fillCatsPosts (){
	var postsByCat = getPotsByCat();
	// console.log(postsByCat);
	if(postsByCat.status == 'success'){
		fillCatTable(postsByCat['result']);
		$("#table_categorie_post").DataTable();
	}
}

function resetCatsPostsTable(){

	$('#table_categorie_post tbody').empty();
	
	fillCatsPosts ();
}