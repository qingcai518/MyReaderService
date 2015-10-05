<?php
header ( "Content-Type:text/html;charset=utf-8" );

// $username = "root";
// $password = "wy03237462";
// $host = "localhost";
// $database = "myreaderserver";

$username = "LAA0626846";
$password = "wy03237462";
$host = "mysql013.phy.lolipop.lan";
$database = "LAA0626846-myreader";


// Make the connect to MySQL or die

// and display an error.

$link = mysql_connect ( $host, $username, $password );

if (! $link) {
	
	die ( 'Could not connect: ' . mysql_error () );
}

// Select your database
mysql_select_db ( $database );
mysql_query ( "set names 'utf8'", $link );
if (isset ( $_FILES ['image'] ) && $_FILES ['image'] ['size'] > 0) {
	
	// Temporary file name stored on the server
	
	$tmpName = $_FILES ['image'] ['tmp_name'];
	
	// Read the file
	
	$fp = fopen ( $tmpName, 'r' );
	
	$data = fread ( $fp, filesize ( $tmpName ) );
	
	$data = addslashes ( $data );
	
	fclose ( $fp );
	
	// Create the query and insert
	
	// into our database.
	
	$name = $_POST ['name'];
	$author = $_POST ['author'];
	$detail = $_POST ['detail'];
	$path = $_POST ['path'];
	
	$query = "INSERT INTO books ";
	$query .= "(name, author, detail, path, image) VALUES ('" . $name . "', '" . $author . "', '" . $detail . "',
			 '" . $path . "','" . $data . "')";
	
	if ($image_query = mysql_query ( $query, $link )) {
		echo "Thank you, your file has been uploaded.";
	} else {
		echo mysql_error ();
	}
} 

else {
	
	print "No image selected/uploaded";
}

// Close our MySQL Link

mysql_close ( $link );

?>
