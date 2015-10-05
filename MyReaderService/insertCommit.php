<?php
header ( "Content-Type:text/html;charset=utf-8" );

$username = "LAA0626846";
$password = "wy03237462";
$host = "mysql013.phy.lolipop.lan";
$database = "LAA0626846-myreader";

$link = mysql_connect ( $host, $username, $password );

if (! $link) {
	
	die ( 'Could not connect: ' . mysql_error () );
}

// Select your database
mysql_select_db ( $database );
mysql_query ( "set names 'utf8'", $link );

// into our database.

$bookId = $_POST ['bookId'];
$userId = $_POST ['userId'];
$star = $_POST ['star'];
$commit = $_POST ['commit'];

$query = "INSERT INTO commits ";
$query .= "(id, userId, star, commit) VALUES (" . $bookId . ", '" . $userId . "', " . $star . ", '" . $commit . "')";

if ($commit_query = mysql_query ( $query, $link )) {
	echo "insert success.";
} else {
	echo mysql_error ();
}

$query2 = "select star from commits where id=" . $bookId;
$result2 = mysql_query ( $query2, $link );
if (! $result2) {
	// roll back
	mysqli_rollback($link);
	echo mysql_error ();
}

$score = 0.0;
$count = 0;
while ( $row = mysql_fetch_row ( $result2 ) ) {
	$score = floatval($row[0]) + $score;
	$count = $count + 1;
}

$average = $score / $count;
mysql_free_result ( $result2 );

$query3 = "update books set score=" . $average . " where id=" . $bookId;

if ($commit_query3 = mysql_query ( $query3, $link )) {
	echo "update success.";
} else {
	// roll back
	mysqli_rollback($link);
	echo mysql_error ();
}

// Close our MySQL Link
mysql_close ( $link );

?>
