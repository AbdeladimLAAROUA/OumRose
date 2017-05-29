<script type="text/javascript" src="js/jquery.min.js"></script>
<script sync type="text/javascript">

 $.ajax({
  url: "https://api.speedbox.ma/api/listevilles/", 
  type:'POST',
  data : {ville:'Casablanca'},
  headers: {
        'Content-Type':'application/json'
  },
  success: function(result){
            var myData = {villes:result, methode:'updateVilles' }
            $.ajax({
             url: "gestion/lib/util.php", 
             type:'POST',
             data : myData,
             success: function(data){
                   console.log(data);         
             },
             error : function() {
             
               console.log(data);
             }
           });     
             
  }});
</script>