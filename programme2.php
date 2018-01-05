<div class="part1">
	<div class="title">Notre programme</div>
	<div class="timeline-wrapper container">
	    <div class="timeline-content-day">
	        <div class="timeline-line"></div>
	        <div id="programme1" class="timeline-content-item" >
	            <span>Enceinte : 3 à 9 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide1.png">
	                    <span class="programe-description">Guide "Mon journal de Grossesse"</span>
	                </a>
	            </div>
	        </div>

	        <div id="programme2" class="timeline-content-item" >
	            <span>Enceinte : 5 à 9 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide1box.png">
	                    <span class="programe-description">Box "Je suis enceinte" </span>
	                </a>
	            </div>
	        </div>

	        <div id="programme3" class="timeline-content-item" >
	            <span>Bébé : de la naissance à 5 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide2box.png">
	                    <span class="programe-description">Guide + Box "Bébé est là!"</span>
	                </a>
	            </div>
	        </div>

	        <div id="programme4" class="timeline-content-item" > <!-- data-timeline="hour-11" -->
	            <span>Bébé : 6 à 12 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="oxProgramme.php">
	                    <img src="img/guide3box.png">
	                    <span class="programe-description">Box "Bébé grandit"</span>
	                </a>
	            </div>
	        </div>        
	    </div>
	</div>
</div>

	<script type="text/javascript">
        var enable = true;
		if(enable){
            var slideCount = 4;
            var currentID = 1;
            var previousId = 4;

            $('#programme' + currentID).addClass("active");
            $('#programme' + currentID + ' > span').css("display", "none");
            setInterval(function () {

                var nextID = currentID + 1;
                if (nextID > slideCount) {
                    nextID = 1;
                    previousId = 3;
                }
                $('#programme' + currentID).addClass("active");
                $('#programme' + currentID + ' > span').css("display", "none");

                $('#programme' + nextID).removeClass("active");
                $('#programme' + nextID + ' > span').css("display", "");

                $('#programme' + previousId).removeClass("active");
                $('#programme' + previousId + ' > span').css("display", "");
                previousId = currentID;
                currentID = nextID;
            }, 3000);
        }
	</script>