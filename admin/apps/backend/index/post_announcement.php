<?php

    require "../../../../initialize.php";
    require 'access.php';

    require BACKEND_LIB."db.php";
    require BACKEND_LIB."data.php";
    
	// require APP."user/access.php";
    // accessible_only("user", "dont_redirect");
    // $user = $GLOBALS['loggeduser']['id'];
	
    $x = [];

    $content = $dt->getData('announcement');	$dt->check("if_empty");
    $dt->maximum=320; $dt->minimum=50;
    $dt->check("if_minimum,if_maximum");

    $link = $dt->getData('link');	
    $dt->maximum=255; $dt->minimum=3;
    $dt->check("if_url,if_minimum,if_maximum");
    
    if ($dt->there_is_error()) {

        $x['dd_success'] = false;
        $x['dd_feedback'] = $dt->error;
        
    } else {
    
        $db->sql("INSERT INTO announcements (content, link) VALUES('$content','$link')");
        if ($db->isSuccessful) {
            $x['dd_success'] = true;
            $x['dd_feedback'] = "<span class='announcement_success'> Your announcement was updated </span> "; 
        } else {
            $x['dd_success'] = false;
            $x['dd_feedback'] = $db->feedback; 
        }
    }

    echo json_encode($x);