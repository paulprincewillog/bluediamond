<?php

    require "../../../../initialize.php";
    require BACKEND_LIB.'db.php';
    require 'access.php';

    $x = [];
    $extra_sql = "";
    // $_POST['search'] = "Justice";
    
    if (isset($_POST['search'])) {
        $query = $db->sanitize($_POST['search']);
        $extra_sql = "WHERE full_name LIKE '%$query%' AND type !='referrer'  OR phone_number LIKE '%$query%' AND type !='referrer'";
    } else {
        $extra_sql =  "WHERE type !='referrer'";
    }

    // Add pagination
    if (isset($_POST['dd_page']) && $_POST['dd_page'] > 1) {
		$limit = $db->sanitize($_POST['dd_page']);
		$pagination = " LIMIT $limit, 8";
	} else {
        $pagination = " LIMIT 0, 8";
    }
    
    $db->sql("SELECT * FROM contacts $extra_sql ORDER BY id DESC $pagination");
    if ($db->there_is_data()) {

        $db->getAllData();
	    foreach ($db->eachData as $item) {

            $item['source'] = strtolower($item['source']);
            // Get referral details if contact was referred
            if ($item['source'] == 'referred') {
                $referral = $item['source_details'];
                $db->sql("SELECT * FROM contacts WHERE phone_number='$referral'");
                $referral = $db->getData();
                $item['source_details'] = "by ".$referral['title'].' '.$referral['full_name'].' - '.$referral['phone_number'];
                $item['referral_number'] = $referral['phone_number'];
            }

            $item['date'] = date('M jS', strtotime($item['date']));

            if ($item['schedule'] !='' AND $item['schedule'] !='none') {
                $item['schedule'] = "Scheduled for ".$item['schedule'];
            } else {  
                $item['schedule'] = "No schedule booked";
            }
            
            array_push($x, $item);
        }
    } 
    
    echo json_encode($x);