<?php
header ( "Content-Type:text/html;charset=utf-8" );
$con = mysql_connect ( "mysql013.phy.lolipop.lan", "LAA0626846", "wy03237462" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

$userId = $_REQUEST ["userId"];
mysql_select_db ( "LAA0626846-myreader", $con );
mysql_query ( "set names 'utf8'", $con );
$q = "SELECT * FROM user where userId='" . $userId . "'";
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