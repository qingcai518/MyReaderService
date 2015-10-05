<?php
header('Content-Type: image/png; charset=utf-8');

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

$image =  $_POST ['image'];
$userId = $_POST ['userId'];

echo $userId;
echo $image;
echo "123";

$query = "UPDATE user set image='" . $image . "' where userId='" . $userId . "'";

if ($image_query = mysql_query ( $query, $link )) {
	echo "update success.";
} else {
	echo mysql_error ();
}

// Close our MySQL Link

mysql_close ( $link );

?>
