<div class="part1">
	<div class="title">Notre programme</div>
	<div class="timeline-wrapper clearfix">
	    <div class="timeline-content-day">
	        <div class="timeline-line"></div>
	        <div class="timeline-content-item active" data-timeline="hour-8">
	            <span>Enceinte : 3 à 7 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="#">
	                    <img src="img/guide1.png">
	                    <span>Guide "Mon journal de Grossesse</span>
	                </a>
	            </div>
	        </div>

	        <div class="timeline-content-item" data-timeline="hour-9">
	            <span>Enceinte : 3 à 7 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="#">
	                    <img src="img/guide1box.png">
	                    <span>Box "Je suis enceinte" </span>
	                </a>
	            </div>
	        </div>

	        <div class="timeline-content-item" data-timeline="hour-10">
	            <span>Bébé : de la naissance à 2 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="#">
	                    <img src="img/guide2box.png">
	                    <span>Guide + Box "Bébé est là!"</span>
	                </a>
	            </div>
	        </div>

	        <div class="timeline-content-item" data-timeline="hour-11">
	            <span>Bébé : 6 à 8 mois</span>
	            <div class="timeline-content-item-reveal">
	                <a href="#">
	                    <img src="img/guide3box.png">
	                    <span>Box "Bébé grandit"</span>
	                </a>
	            </div>
	        </div>        
	    </div>
	</div>
</div>

	<script type="text/javascript">
		$(".timeline-wrapper .timeline-content-item > span").on("mouseenter mouseleave", function(e){
		  $(".timeline-wrapper .timeline-content-item.active").removeClass("active");
		  $(this).parent().addClass("active");
		});
	</script>