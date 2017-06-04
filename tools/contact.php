<?php 
	if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['content'])){
			$name = htmlspecialchars($_POST['name']);
			$email= htmlspecialchars($_POST['email']);
			$content= htmlspecialchars($_POST['content']);

			echo $_POST['name']." ".$email." ".$content." infos";
	}
 ?>