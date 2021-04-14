<?php

    require "../../../initialize.php";
    require BACKEND_LIB."db.php";
    require BACKEND_LIB."data.php";
    
    // $_POST['title'] = "Mrs";
    // $_POST['full_name'] = "SHoe";
    // $_POST['relationship'] = "parent";
    // $_POST['phone_number'] = "07061988182";

    if (!isset($_POST['phone_number'])) {
        return;
    }

    // First we get form details and validate
    $title = $dt->getData("title");
    $dt->maximum=10; $dt->minimum=2;
    $dt->check("if_empty,if_alphabelt,if_minimum,if_maximum");

    $full_name = $dt->getData("full_name");
    $dt->maximum=50; $dt->minimum=3;
    $dt->check("if_empty,if_alphabelt,if_minimum,if_maximum");

    $phone_number = $dt->getData("phone_number");
    $dt->maximum=15; $dt->minimum=11;
    $dt->check("if_empty,if_number,if_minimum,if_maximum");

    $relationship = $dt->getData("relationship");
    $dt->maximum=100; $dt->minimum=5;
    $dt->check("if_empty,if_alphabelt,if_minimum,if_maximum");

    // Don't proceed if there is an error
    if ($dt->there_is_error()) {
        $x['dd_success'] = false;
        $x['dd_feedback'] = $dt->error;
    } else {
        
        // Update if this contact already exists
        $db->sql("SELECT id FROM contacts WHERE phone_number='$phone_number'");
        if ($db->getTotal() > 0) {

            $sql = "UPDATE contacts SET full_name='$full_name', title = '$title', type='$relationship' WHERE phone_number='$phone_number'";

        } else { 
            // Insert data into database
            $sql = "INSERT INTO contacts (full_name, phone_number, title, type) VALUES('$full_name','$phone_number','$title','$relationship')";
        }

        $db->sql($sql);
        if ($db->isSuccessful) {
            
            $x['dd_success'] = true;
            $x['dd_feedback'] = "Submission successful";

            // Save details in session
            $_SESSION['referrer'] = $phone_number;

        } else {
            $x['dd_success'] = false;
            $x['dd_feedback'] = "An error occured, contact admin";
        }
    }


    echo json_encode($x);