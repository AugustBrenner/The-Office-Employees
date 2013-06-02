<!--August Ryan Brenner
	abrenn10@my.smccd.edu
	CIS 380 OL
	Final
	office.php
	December 19th, 2012-->

	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>August Brenner CIS 380 View the Current Employees</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<style>
		img.fullscreen {
			max-height: 100%;
			max-width: 100%;
		}		
	</style>
</head>
<body>
<div data-role="page" id="photos">
	<header data-role="header">
		<?php echo '<h1>Employees</h1>'; ?>
	</header>
	<article data-role="content">
		<ul data-role="listview"  data-filter="true">

			<?php

				require ('./mysqli_oop_connect.php'); // Connect to the db.
		
				// Make the query:
				$q = "SELECT CONCAT(first_name, ' ', last_name) AS employees, CONCAT(first_name, '_', last_name, '.jpg') AS photos, last_name AS name, title AS title FROM employee ORDER BY last_name ASC";
				$r = $mysqli->query($q); // Run the query.

				// Count the number of returned rows:
				$num = $r->num_rows;

				if ($num > 0) { // If it ran OK, display the records.
	
					// Fetch and print all the records:
					while ($row = $r->fetch_object()) {
						echo
							'<li>
								<a href="#' . $row->name . '">
								<h1>' . $row->employees . '</h1>
								<img src="pics/' . $row->photos . '" alt="?" />
								<p>' . $row->title . '</p>
								</a>
							</li>';

						}
						echo 

							'</ul>
						</article>
						<footer data-role="footer" data-position="fixed">
							<nav data-role="navbar">
								<ul>
									<li><a href="home" data-icon="home">Home</a></li>
									<li><a href="Photos" data-icon="grid">Photos</a></li>
									<li><a href="Info" data-icon="info">Info</a></li>
								</ul>
							</nav>
						</footer>
					</div><!-- Page Photos -->';

					$r->free(); // Free up the resources.
					unset($r);						


				} else { // If no records were returned.

					echo '<p class="error">There are currently no registered users.</p>';

				}

				// Make the query:
				
				$q = "SELECT CONCAT(first_name, ' ', last_name) AS employees, CONCAT(first_name, '_', last_name, '.jpg') AS photos, last_name AS name, title AS title, location AS location, work_phone AS work, cell_phone AS cell, email AS email FROM employee ORDER BY last_name ASC";
				$r = $mysqli->query($q); // Run the query.

				// Count the number of returned rows:
				$num = $r->num_rows;
				if ($num > 0) { // If it ran OK, display the records.

					while ($row = $r->fetch_object()) {
						echo 
							'<div data-role="page" id="' . $row->name . '">
								<header data-role="header">
									<h1>' . $row->employees . '</h1>
									<a href="#photos" data-icon="grid" data-iconpos="notext">Photos</a>
								</header>
								<img src="pics/' . $row->photos . '" alt="?" />
								<p>' . $row->title . '</p>
								<p>' . $row->location . '</p>
								<p>' . $row->work . '</p>
								<p>' . $row->cell . '</p>
								<p>' . $row->email . '</p>
							</div>';
					}
					echo '
						</body>
					</html>';

					$r->free(); // Free up the resources.
					unset($r);	

				}	else { // If no records were returned.

					echo '<p class="error">There are currently no registered users.</p>';

				}

			// Close the database connection.
			$mysqli->close();
			unset($mysqli);
		?>
