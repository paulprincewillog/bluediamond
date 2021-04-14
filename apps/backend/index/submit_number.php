<?php

    require "../../../initialize.php";
    require '../_lib/db.php';

    $x = [];

    // Check if this person was referred
    if (isset($_SESSION['referral']) && $_SESSION['referral'] !='') {
        $referral = $db->sanitize($_SESSION['referral']);
    } else {
        $referral = "direct";
    }

    $full_name = $db->sanitize($_POST['full_name']);
    $phone_number = $db->sanitize($_POST['phone_number']);
    $schedule = $db->sanitize($_POST['schedule']);
    
    if ($db->getUser($phone_number)) {
        $db->sql("UPDATE contacts SET full_name='$full_name', phone_number='$phone_number' WHERE phone_number='$phone_number'");
    } else {
        $db->sql("INSERT INTO contacts (full_name, phone_number, source, type, schedule) VALUES('$full_name','$phone_number', '$referral','lead','$schedule')");
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