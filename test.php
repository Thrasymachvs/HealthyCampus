<?php
	
	// Access text file
	// echo file_get_contents("http://centaurus-2.ics.uci.edu:8926/hcampus/database.txt");
	$itcUrl = 'https://www.youtube.com/watch?v=9JziNKA1wPk';
	$itc_headers = @get_headers($itcUrl);
	if(!$itc_headers || $itc_headers[0] == 'HTTP/1.1 404 Not Found') {
	    echo "Not exists";
	} else {
	    echo "Exists";
	}

?>

<!-- Javascript process
- Open the file from the server
- Format it to make sure it's easily usable
NOTE: When users try to open and format the file, ensure that the new file will only work if it meets the right format. If it doesn't make sure to use a backup database.
NOTE: Backup database are made when new files are added. It contains the last version before the upodate.
NOTE: This happens in the beginning of the loading process.
NOTE: To save time, this update of the backup database only occurs when changes are made. This is to save time. -->