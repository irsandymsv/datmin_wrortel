<?php 

foreach ($$_POST["picture"] as $key) {
	if (unlink("$key")) {
		echo "deteleted";
	}
	else{
		echo "fail";
	}
}

?>