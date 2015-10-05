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

// into our database.

$userId = $_POST ['userId'];
$userType = $_POST ['userType'];
$userName = $_POST ['userName'];
$password = $_POST ['password'];
$sex = $_POST ['sex'];

$query = "INSERT INTO user ";
$query .= "(userId, userType, userName, password, sex) VALUES ('" . $userId . "', '" . $userType . "', '" . $userName . "', '" . $password . "',
			 '" . $sex . "')";

if ($image_query = mysql_query ( $query, $link )) {
	echo "insert success.";
} else {
	echo mysql_error ();
}

// Close our MySQL Link

mysql_close ( $link );

?>
