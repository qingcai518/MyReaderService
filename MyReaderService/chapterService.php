<?php
header ( "Content-Type:text/html;charset=utf-8" );
// $con = mysql_connect ( "localhost:3306", "root", "wy03237462" );
$con = mysql_connect ( "mysql013.phy.lolipop.lan", "LAA0626846", "wy03237462" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

$id = $_REQUEST ["id"];
// mysql_select_db ( "myreaderserver", $con );
mysql_select_db ( "LAA0626846-myreader", $con );
mysql_query ( "set names 'utf8'", $con );
$q = "SELECT * FROM chapters where id=" . $id;
$rs = mysql_query ( $q, $con );
if (! $rs) {
	die ( "Valid result!" );
}

$item = array ();
while ( $row = mysql_fetch_row ( $rs ) ) {
	array_push ( $item, $row );
}

echo json_encode ( $item );
mysql_free_result ( $rs );
?>
</body>
</html>