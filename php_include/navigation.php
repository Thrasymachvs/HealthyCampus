<link rel="stylesheet" href="css/navigation.css">

<!-- Navigation Page: Displays and links the buttons -->
<?php
	require_once 'format.php';

	// Description: Add home button
	// Parameter:
	// 		- $link: The link of the button	
	function homeButton($link = "home.php") {
		echo "<a href='" . $link . "'>";
		echo "<div class='subcategory' style=\"background: url('img/button/home.png') no-repeat center; background-size: 130px 130px;\">";
		echo "<p style='padding-top: 2em;'>HOME</p>";
		echo "</div>";
		echo "</a>";		
	}

	// Description: List menu items horizontally
	// Parameter:
	// 		- $subname: The name of the button
	// 		- $link: The link of the button
	//		- $num: Define which button to use
	function menuButton($subname, $link, $num) {
		$style = (strlen($subname) >= 10) ? "1.5em" : "2em";
		echo "<a class='link' href='" . $link . "'>";
		echo "<div class='subcategory' style=\"background: url('img/button/button_" . $num . ".png') no-repeat center; background-size: 130px 130px;\">";
		echo "<p style='padding-top: " . $style . ";'>" . $subname . "</p>";
		echo "</div>";
		echo "</a>";
	}

	// Description: List menu items horizontally
	// Parameter:
	// 		- $subname: The name of the button
	// 		- $link: The link of the button
	//		- $num: Define which button to use
	function hamMenuButton($subname, $link) {
		echo "<a href='" . $link . "'>";
		echo "<li>";
		echo $subname;
		echo "</li>";
		echo "</a>";
	}

	echo "<div id='navbar'>";
	echo "<nav>";

	// '$valid_cat' is the valid category and is listed in the 'format.php'
	$valid_cat = Format::$valid_cat;
	homeButton();
	for ($i = 0; $i < count($valid_cat); $i++) { 
		$value = strtolower(str_replace(" ", "_", $valid_cat[$i]));
		$value = (strpos($value, "&") !== false) ? str_replace("&", "and", $value) : $value;
		menuButton($valid_cat[$i], "Category.php?group=" . $value, $i + 1);
	}

	echo "</nav>";
	echo "</div>";
?>

<div id='hamburger_menu'>
	<!--    Made by Erik Terwan    -->
	<!--   24th of November 2015   -->
	<!--        MIT License        -->
	<nav id="popup">
	 	<div id="menuToggle">
		    <!--
		    A fake / hidden checkbox is used as click reciever,
		    so you can use the :checked selector on it.
		    -->
		    <input type="checkbox" />
	    
		    <!--
		    Some spans to act as a hamburger.
		    
		    They are acting like a real hamburger,
		    not that McDonalds stuff.
		    -->
		    <span></span>
		    <span></span>
		    <span></span>
	    
		    <!--
		    Too bad the menu has to be inside of the button
		    but hey, it's pure CSS magic.
		    -->
		    <ul id="menu">
			      <a href="home.php"><li>HOME</li></a>
			      <?php
					for ($i = 0; $i < count($valid_cat); $i++) { 
						$value = strtolower(str_replace(" ", "_", $valid_cat[$i]));
						$value = (strpos($value, "&") !== false) ? str_replace("&", "and", $value) : $value;
						hamMenuButton($valid_cat[$i], "Category.php?group=" . $value);
					}
			      ?>
		    </ul>
		  </div>
	</nav>
</div>