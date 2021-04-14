<?php
	require "../../../initialize.php";
	require '../_lib/db.php';

	$x = [];
	$sql = "SELECT * FROM announcements ORDER BY date DESC";

	$db->sql($sql);
	if ($db->there_is_data()) {
		$x = $db->getData();
	}

    echo json_encode($x);
