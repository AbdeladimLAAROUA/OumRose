$(function () {
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var clr = ['#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d6de'];
  var obj = {'methode' : 'getCustomerType'}
$.ajax({
   url: './lib/util.php',
   dataType: "json",
   method: "post",
   data: obj,
   async : 'false'}).done(function(data) {
      var PieData = [];
      // console.log(data.result);
      $.each(data.result, function(key, val) {   
        var obj = {'value':val.poucentage, 'color':clr[key], 'highlight':clr[key], 'label':val.type};
        // console.log(obj);
        PieData.push(obj);
      });
      var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);

   }).fail(function(xhr, textStatus, error){
       console.log(xhr.statusText);
       console.log(textStatus);
       console.log(error);
   });

var obj_1 = {'methode' : 'getCustomerAgeRange'}
$.ajax({
   url: './lib/util.php',
   dataType: "json",
   method: "post",
   data: obj_1,
   async : 'false'}).done(function(data) {
      var PieData = [];
      // console.log(data.result);
      $.each(data.result, function(key, val) {   
        var obj = {'value':val.nbr, 'color':clr[key], 'highlight':clr[key], 'label':val.ageband};
        // console.log(obj);
        PieData.push(obj);
      });
      var pieChartCanvas = $("#pieChart2").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);

   }).fail(function(xhr, textStatus, error){
       console.log(xhr.statusText);
       console.log(textStatus);
       console.log(error);
   });

var obj_2 = {'methode' : 'getCustomerVille'}
$.ajax({
   url: './lib/util.php',
   dataType: "json",
   method: "post",
   data: obj_2,
   async : 'false'}).done(function(data) {
      var PieData = [];
      // console.log(data.result);
      $.each(data.result, function(key, val) {   
        var obj = {'value':val.poucentage, 'color':clr[key], 'highlight':clr[key], 'label':val.name};
        // console.log(obj);
        PieData.push(obj);
      });
      var pieChartCanvas = $("#pieChart3").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);

   }).fail(function(xhr, textStatus, error){
       console.log(xhr.statusText);
       console.log(textStatus);
       console.log(error);
   });

var obj_3 = {'methode' : 'getBabySex'}
$.ajax({
   url: './lib/util.php',
   dataType: "json",
   method: "post",
   data: obj_3,
   async : 'false'}).done(function(data) {
      var PieData = [];
      // console.log(data.result);
      $.each(data.result, function(key, val) {   
        var obj = {'value':val.poucentage, 'color':clr[key], 'highlight':clr[key], 'label':val.sexe};
        // console.log(obj);
        PieData.push(obj);
      });
      var pieChartCanvas = $("#pieChart4").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);


      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);

   }).fail(function(xhr, textStatus, error){
       console.log(xhr.statusText);
       console.log(textStatus);
       console.log(error);
   });
    var obj = {'methode' : 'getClientDash'}
    $.ajax({
       url: './lib/util.php',
       dataType: "json",
       method: "post",
       data: obj,
       async : 'false'}).done(function(data) {
          // console.log(data.result);
          $.each(data.result, function(key, val) {
            var newRow = '<tr>'+
                        '<td>'+val.id+'</td>'+
                        '<td>'+val.nom+'</td>'+
                        '<td>'+val.prenom+'</td>'+
                        '<td>'+val.gsm+'</td>'+
                        '<td>'+val.name+'</td>'+
                        '<td>'+val.age+'</td>'+
                        '</tr>';
            $("#client_table tbody").append(newRow);
            // console.log(val);
          });


       }).fail(function(xhr, textStatus, error){
           console.log(xhr.statusText);
           console.log(textStatus);
           console.log(error);
       });
    var obj = {'methode' : 'getBabyDash'}
    $.ajax({
       url: './lib/util.php',
       dataType: "json",
       method: "post",
       data: obj,
       async : 'false'}).done(function(data) {
          console.log(data.result);
          $.each(data.result, function(key, val) {
            var newRow = '<tr>'+
                        '<td>'+val.id+'</td>'+
                        '<td>'+val.naissance+'</td>'+
                        '<td>'+val.prenom+'</td>'+
                        '<td>'+val.sexe+'</td>'+
                        '<td>'+val.nom+'</td>'+
                        '<td>'+val.type+'</td>'+
                        '</tr>';
            $("#baby_table tbody").append(newRow);
            console.log(val);
          });


       }).fail(function(xhr, textStatus, error){
           console.log(xhr.statusText);
           console.log(textStatus);
           console.log(error);
       });

});