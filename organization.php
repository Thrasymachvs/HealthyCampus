<link rel="stylesheet" href="css/organization.css">

<?php
	$org = "This is my name";
?>

<script type="text/javascript">
	function test(name){
		var xmlhttp = new XMLHttpRequest();
    	xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
            	document.getElementById("summary").innerHTML = this.responseText;
        	}
    	};
    	xmlhttp.open("GET", "summary.php?orgName=" + name, true);
    	xmlhttp.send();

	}
</script>

<a href="#" onclick="test('Anteater Recreation Center')">Anteater Recreation Center</a><br>
<a href="#" onclick="test('UC Irvine Health')">UC Irvine Health</a><br>
<a href="#" onclick="test('ZotWheels Program')">ZotWheels Program</a>


<div id="summary">
<!-- 	<p>organization: <span id="org"></span></p>
	<p>Website: </p>
	<p>Category: </p> -->
<!-- 	<p>Description: </p>
	<p>Users: </p>
	<p>HOF: </p>
	<p>Image:</p>
	<p>Phonenumber</p>
	<p>email</p>
	<p>location</p>
	<p>geotag</p> -->
</div>