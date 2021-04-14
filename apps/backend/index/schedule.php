<?php

    require "../../../initialize.php";
    require '../_lib/db.php';

    $x = [];

    // Don't continue if phone number has not been submitted
    if (isset($_SESSION['phone_number']) && $_SESSION['phone_number'] != "") {
            
        $phone_number = $db->sanitize($_SESSION['phone_number']);
        $schedule = $db->sanitize($_POST['schedule']);
        
        $db->sql("UPDATE contacts SET schedule='$schedule' WHERE phone_number='$phone_number'");
    
        if ($db->isSuccessful) {
            $x['dd_success'] = true;
            $x['dd_feedback'] = ""; //$_SESSION['contact_name']; 
        } else {
            $x['dd_success'] = false;
            $x['dd_feedback'] = "An error occured, contact admin";//$db->feedback; 
        }
    } 
    
    echo json_encode($x);