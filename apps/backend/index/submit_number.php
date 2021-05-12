<?php

    require "../../../initialize.php";
    require '../_lib/db.php';

    $x = [];

    // Check if this person was referred
    if (isset($_SESSION['source_type']) && $_SESSION['source_type'] !='') {
        $source = $db->sanitize($_SESSION['source_type']);
    } else {
        $source = "direct";
    }

    // Check details of visior's source
    if (isset($_SESSION['source_details']) && $_SESSION['source_details'] !='') {
        $source_details = $db->sanitize($_SESSION['source_details']);
    } else {
        $source_details = "";
    }

    $full_name = $db->sanitize($_POST['full_name']);
    $phone_number = $db->sanitize($_POST['phone_number']);
    $schedule = $db->sanitize($_POST['schedule']);
    
    if ($db->getUser($phone_number)) {
        $db->sql("UPDATE contacts SET full_name='$full_name', phone_number='$phone_number' WHERE phone_number='$phone_number'");
    } else {
        $db->sql("INSERT INTO contacts (full_name, phone_number, source, source_details, type, schedule) VALUES('$full_name','$phone_number', '$source','$source_details','lead','$schedule')");
    }

    if ($db->isSuccessful) {
        $x['dd_success'] = true;
        $x['dd_feedback'] = "success"; 
        $_SESSION['phone_number'] = $phone_number;
    } else {
        $x['dd_success'] = false;
        $x['dd_feedback'] = "An error occured, contact admin";//$db->feedback; 
    }
    
    echo json_encode($x);