<div class="part1">
	<div class="title">Notre programme</div>
	<div class="timeline-wrapper clearfix">
	    <div class="timeline-content-day">
	        <div class="timeline-line"></div>
	        <div id="programme1" class="timeline-content-item" >
	            <span>Enceinte : 3 à 7 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide1.png">
	                    <span>Guide "Mon journal de Grossesse"</span>
	                </a>
	            </div>
	        </div>

	        <div id="programme2" class="timeline-content-item" >
	            <span>Enceinte : 3 à 7 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide1box.png">
	                    <span>Box "Je suis enceinte" </span>
	                </a>
	            </div>
	        </div>

	        <div id="programme3" class="timeline-content-item" >
	            <span>Bébé : de la naissance à 2 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide2box.png">
	                    <span>Guide + Box "Bébé est là!"</span>
	                </a>
	            </div>
	        </div>

	        <div id="programme4" class="timeline-content-item" > <!-- data-timeline="hour-11" -->
	            <span>Bébé : 6 à 8 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide3box.png">
	                    <span>Box "Bébé grandit"</span>
	                </a>
	            </div>
	        </div>        
	    </div>
	</div>
</div>

	<script type="text/javascript">
		/*$(".timeline-wrapper .timeline-content-item > span").on("mouseenter mouseleave", function(e){
		  $(this).parent().addClass("active");
		   setTimeout(function(){
		        $('.timeline-wrapper .timeline-content-item.active').removeClass('active');}, 2000);
		});*/

		/*for (var i = 0; i < 1000000; i++) {
			$("#programme1").addClass("active");
		    setTimeout(function(){
		        $('#programme1').removeClass('active');}, 2000);

		    $("#programme2").addClass("active");
		    setTimeout(function(){
		        $('#programme2').removeClass('active');}, 2000);
		};*/

		/*function animate() {
		        $("#programme1").addClass("active");
		    setTimeout(function(){
		        $('#programme1').removeClass('active');}, 2000);

		    $("#programme2").addClass("active");
		    setTimeout(function(){
		        $('#programme2').removeClass('active');}, 2000);
		    animate();
		    }
		    animate();*/

		/* $(".timeline-wrapper .timeline-content-item > span").on("mouseenter mouseleave", function(e){
		   $(".timeline-wrapper .timeline-content-item.active").removeClass("active");
		   $(this).parent().delay(3000).addClass("active");
		 });*/

		var slideCount = 4;
		var currentID = 1;
		var previousId =4;
		
		$('#programme' + currentID).addClass("active");
		//Processing
		setInterval(function(){
		    var nextID = currentID + 1;
		    if (nextID > slideCount) {
		        nextID = 1;
		        previousId=3;
		    }
		    $('#programme' + currentID).addClass("active");
		    $('#programme' + nextID).removeClass("active");
		     $('#programme' + previousId).removeClass("active");
		    previousId=currentID;
		    currentID = nextID;
		},3000);
	</script>