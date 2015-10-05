<?php
header("Content-Type: text/html; charset=UTF-8");

$serverName = "mysql013.phy.lolipop.lan";
$userName = "LAA0626846";
$password = "wy03237462";
$databaseName = "LAA0626846-myreader";

$eventName = urldecode($_POST['eventName']);
$place = urldecode($_POST['place']);
$startTime = urldecode($_POST['startTime']);
$endTime = urldecode($_POST['endTime']);
$owner = urldecode($_POST['owner']);
$image = urldecode($_POST['image']);

echo "eventName = " . $eventName;
echo "place = " . $place;
echo "startTime = " . $startTime;
echo "endTime = " . $endTime;
echo "owner = " . $owner;
echo "image = " . $image;

// connect to Server.
$conn = mysql_connect($serverName, $userName, $password);
if (!$conn) {
	echo "Cann't connect to Server : " . $serverName . "<br/>";
	echo mysql_error();
} else {
	// choose database.
	$canAccessDB = mysql_select_db($databaseName, $conn);

	if (!$canAccessDB) {
		echo "Cann't connect to database " . $databaseName;
	} else {
		mysql_set_charset("utf8", $conn);

		$sql = "insert into myteam_event (eventName, place, startTime, endTime, owner, image)
		 values ('" . $eventName . "', '" . $place . "', '" . $startTime . "', '" . $endTime . "', '" . $owner . "', '" . $image . "')";

		$result_flag = mysql_query($sql);
		if (!$result_flag) {
			die('INSERTクエリーが失敗しました。' . mysql_error());
		}
	}

	mysql_close($conn);
}
?>
