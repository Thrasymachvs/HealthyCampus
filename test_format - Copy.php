<?php
	include 'format.php';

	$category_data = formatSubcategoryContent(rawContent("database/subcategory.txt"), $valid_sub_col, $valid_cat);
	print_r($category_data);



?>