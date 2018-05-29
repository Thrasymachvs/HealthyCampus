<!-- Navigation Page: Displays and links the buttons -->
<?php
	require_once 'format.php';

	// Description: List menu items horizontally
	// Parameter: $subname: The name of the button
	//			  $link: The link of the button
	//			  $num: Define which button to use
	function menuButton($subname, $link, $num) {
		$style = (strlen($subname) >= 10) ? "1.2em" : "1.6em";
		echo "<a href='" . $link . "'>";
		echo "<div class='subcategory' style=\"background-image: url('img/button/button_" . $num . ".png'); background-size: 100% auto\">";
		echo "<p style='padding-top: " . $style . ";'>" . $subname . "</p>";
		echo "</div>";
		echo "</a>";
	}

	echo "<div id='navbar'>";
	echo "<nav>";

	// '$valid_cat' is the valid category and is listed in the 'format.php'
	for ($i = 0; $i < count($valid_cat); $i++) { 
		$value = strtolower(str_replace(" ", "_", $valid_cat[$i]));
		menuButton($valid_cat[$i], "Category.php?group=" . $value, $i + 1);
	}

	echo "</nav>";
	echo "</div>";
?>