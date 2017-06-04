<script type="text/javascript" src="js/jquery.min.js"></script>
<script sync type="text/javascript">

 $.ajax({
  url: "https://api.speedbox.ma/api/listevilles/", 
  type:'POST',
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
                   /*for (var i = 0; i < result.length; i++) {
                    	$.ajax({
                    	  url: "https://api.speedbox.ma/api/listeprville/?ville="+result[i], 
                    	  type:'POST',
                    	  ville1:result[i],
                    	  headers: {
                    	        'Content-Type':'application/json'
                    	  },
                    	  success: function(result1){
                    	            var myData = {relais:{relaisList:result1,ville:this.ville1}, methode:'updateRelais' };
                    	            $.ajax({
                    	             url: "gestion/lib/util.php", 
                    	             type:'POST',
                    	             data : myData,
                    	             success: function(data1){
                    	                   console.log(data1);         
                    	             },
                    	             error : function() {
                    	             
                    	               console.log(data);
                    	             }
                    	           });                    	             
                    	  }});
                   };     */
             },
             error : function() {
             
               console.log(data);
             }
           });
                
             
  }});

/* $.ajax({
  url: "https://api.speedbox.ma/api/listeprville/?ville=fes", 
  type:'POST',
  headers: {
        'Content-Type':'application/json'
  },
  success: function(result){
            var myData = {relais:result, methode:'updateRelais' }
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
             
  }});*/

	     
</script>