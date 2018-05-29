// Get the modal
var modal = document.getElementById('myModal');

// Get the buttons that opens the modal
var btns = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks the button, open the modal, accurately displaying the correct information about the selected organization
function openModal(organization){
	// Get the right information about the 'organization'
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
        	document.getElementById("modal").innerHTML = this.responseText;
    	}
	};

	xmlhttp.open("GET", "summary.php?orgName=" + organization.replace("&", "and"), true);
	xmlhttp.send();

	// Open Modal
	modal.style.display = "block";
}

// When the user clicks on 'X' (located on the top right of the modal), close the modal
function closeModal() {
	modal.style.display = "none";
}
// span.onclick = function() {
//     modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.id == "myModal") {
        modal.style.display = "none";
    }
}