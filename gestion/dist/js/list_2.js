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

  var obj = {'methode' : 'getAllClient2'};
  $.ajax({
    url : "./lib/util.php",
    dataType: "json",
    type: "POST",
    data : obj,

    success: function(data, textStatus, jqXHR) {
      console.log(data.result);

    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });

});
$(document).ready(function() {
  $('#table_clients').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "./lib/server_processing.php"
  } );
} );
