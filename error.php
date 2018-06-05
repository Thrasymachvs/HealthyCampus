<?php

	// Get 'organization_error' content
	$orgPathName = "database/ERROR/organization_error.txt";
	$catPathName = "database/ERROR/category_error.txt";
	$file = fopen($orgPathName, "r");
	$size = filesize($orgPathName);
	$text = fread($file, $size);
	$organization = explode("|", $text);
	$organization_time = $organization[0];
	$organization_error = $organization[1];
	$organization_location = trim($organization[2]);
	fclose($file);

	// Get 'category_error' content
	$file = fopen($catPathName, "r");
	$size = filesize($catPathName);
	$text = fread($file, $size);
	$category = explode("|", $text);
	$category_time = $category[0];
	$category_error = $category[1];
	$category_location = trim($category[2]);
	fclose($file);
?>

<style type="text/css">
	body {
		margin: 0 auto;
		height: 100%;
		background-color: #1764A4;
	}

	body > * {
		margin: 0 auto;
	}

	#logo {
		height: 300px;
		width: 300px;
	}

	#logo img {
		width: 100%;
	}

	#container {
		width: 700px;
		height: auto;
		display: flex;
		justify-content: space-between;
	}

	#container > div {
		background-color: white;
	}

	.log {
		padding: 5px 5px;
		width: 300px;
		height: auto;
	}

	.log span {

	}

</style>

<body>
	<div id="logo">
		<img src="img/logo.png" />
	</div>
	<div id="container">
		<div class="log">
			<h2>Organization Log</h2>
			<?php
				echo "<h4>" . $organization_time . "</h4>";
				echo "<h4>" . $organization_error . "</h4>";
				if (strtoupper($organization_location) != "ERROR") { echo "<h4 style='color: #adadad;'>Located in '" . $organization_location . "' row</h4>"; }
			?>
		</div>
		<div class="log">
			<h2>Category Log</h2>
			<?php
				echo "<h4>" . $category_time . "</h4>";
				echo "<h4>" . $category_error . "</h4>";
				if (strtoupper($category_location) != "ERROR") { echo "<h4 style='color: #adadad;'><i>Located in '<span>" . strtoupper($category_location) . "</span>' row</i></h4>"; }
			?>			
		</div>
	</div>
</body>