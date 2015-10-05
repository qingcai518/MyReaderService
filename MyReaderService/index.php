<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
</head>
<body>
Books:
<?php
header ( "Content-type: text/html; charset=utf-8" );

// $con = mysql_connect ( "localhost:3306", "root", "wy03237462" );
$con = mysql_connect ( "mysql013.phy.lolipop.lan", "LAA0626846", "wy03237462" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

// mysql_select_db ( "myreaderserver", $con );
mysql_select_db ( "LAA0626846-myreader", $con );
mysql_query ( "set names 'utf8'", $con );
$q = "SELECT * FROM books";
$rs = mysql_query ( $q, $con );
if (! $rs) {
	die ( "Valid result!" );
}

echo "<table border=1>";
echo "<tr><td>#</td><td>bookName</td><td>path</td><td>detail</td></tr>";

$item = array ();
while ( $row = mysql_fetch_row ( $rs ) ) {
	array_push ( $item, $row );
	$result = base64_encode ( $row [5] );
	echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[2]</td><td>$result</td></tr>";
}

echo "</table>";
mysql_free_result ( $rs );

$q1 = "SELECT * FROM user";
$rs1 = mysql_query ( $q1, $con );
if (! $rs1) {
	die ( "Valid result!" );
}
echo "<br>";
echo "<table border=1>";
echo "<tr><td>userId</td><td>userType</td><td>userName</td><td>sex</td><td>point</td></tr>";

$item1 = array ();
while ( $row1 = mysql_fetch_row ( $rs1 ) ) {
	array_push ( $item1, $row1 );
	echo "<tr><td>$row1[0]</td><td>$row1[1]</td><td>$row1[2]</td><td>$row1[4]</td><td>$row1[5]</td></tr>";
}

echo "</table>";
mysql_free_result ( $rs1 );
?>
</body>
</html>