<?php
	include "../../../../initialize.php";
    require '../../../../apps/backend/_lib/db.php';

    $x = [];
    $sql="";

    if(isset($_POST['query'])){

    $query = $_POST['query'];
    $query = $db->sanitize($query);

        $sql = "SELECT * FROM faq WHERE question  LIKE '%$query%' OR question LIKE '$query%' OR question LIKE '%$query'";
    }
    else{
        $sql = "SELECT * FROM faq";
    }

    $db->sql($sql);
	if ($db->there_is_data()) {
		$x = $db->getAllData();
	}
    
echo json_encode($x);