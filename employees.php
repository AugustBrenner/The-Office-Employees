<!--August Ryan Brenner
	abrenn10@my.smccd.edu
	CIS 380 OL
	Assignment #6
	employees.php
	December 14th, 2012-->

<?php

$page_title = 'August Brenner CIS 380 View the Current Employees';

// Page header:
echo '<h1>Employees</h1>';

require ('./mysqli_oop_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT CONCAT(user_id, '|', first_name, ' ', last_name, '|', title, '|', location, '|', work_phone, '|', cell_phone, '|', email) AS employees, CONCAT(first_name, '_', last_name, '.jpg') AS photos FROM employee ORDER BY user_id ASC";
$r = $mysqli->query($q); // Run the query.

// Count the number of returned rows:
$num = $r->num_rows;

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><b>Photo</b></td><td align="left"><b>ID, Name, Position, Location, Work Number, Cell Number, Email Address</b></td></tr>
';
	
	// Fetch and print all the records:
	while ($row = $r->fetch_object()) {
		echo '<tr><td align="left"><img src="./pics/' . $row->photos . '"</td><td align="left">' . $row->employees . '</td></tr>
		';

	}

	echo '</table>'; // Close the table.
	
	$r->free(); // Free up the resources.
	unset($r);	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

// Close the database connection.
$mysqli->close();
unset($mysqli);

?>