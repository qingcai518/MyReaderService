<?php
header ( "Content-Type:text/html;charset=utf-8" );
$con = mysql_connect ( "mysql013.phy.lolipop.lan", "LAA0626846", "wy03237462" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

$id = $_REQUEST ["id"];
// mysql_select_db ( "myreaderserver", $con );
mysql_select_db ( "LAA0626846-myreader", $con );
mysql_query ( "set names 'utf8'", $con );
$q = "select t2.userName, t2.image, t1.star, t1.commit, t1.commitDate from commits t1, user t2 where t1.id=" . $id . " and t1.userId=t2.userId order by t1.commitDate desc";
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