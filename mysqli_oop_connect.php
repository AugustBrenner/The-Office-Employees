<!--August Ryan Brenner
	abrenn10@my.smccd.edu
	CIS 380 OL
	Assignment #6
	mysqli_oop_connect.php
	December 14th, 2012-->

<?php

// Set the database access information as constants:
DEFINE ('DB_USER', 'user');
DEFINE ('DB_PASSWORD', 'password');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'name');

// Make the connection:
$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verify the connection:
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	unset($mysqli);
} else { // Establish the encoding.
	$mysqli->set_charset('utf8');
}