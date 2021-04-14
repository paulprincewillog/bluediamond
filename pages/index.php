<?php

	require "../initialize.php";
	include BACKEND_LIB."db.php";
	$page_link = "index";
	$page_title = "Pick the right school for your child";
	$page_description = "Blue Diamond schools, based in Effurun, strives to make quality education affordable while still committing to a high standard of education. Creche, primary and secondary facilities available.";
	$page_keywords = "schools in effurun, top schools in effurun, schools in uvwie, schools along pti road, affordable schools in warri, creche in effurun";
	
	// Personalize title for referral
	if (isset($_GET['ref'])) {

		$ref_number = $db->sanitize($_GET['ref']);
		$ref = $db->getUser($ref_number);
		$ref_name =  $ref['title']." ".$ref['full_name'];
		$page_title = $ref_name." is inviting you to check out our website";
		define("REF_NAME",", ".$ref_name.", ");
		define("ACTIVE_CTA","cta_referral");

		$_SESSION['referral'] = $ref_number;

	} else if (isset($_GET['utm_source']) && strtolower($_GET['utm_source']) == 'facebook') {
		
		$page_title = "Welcome to our school";
		define("REF_NAME", "Facebook");
		define("ACTIVE_CTA","cta_facebook");
		$_SESSION['referral'] = "facebook";

	}

	else {
		define("REF_NAME","");
		define("ACTIVE_CTA","none");
	}

	loadHeader('main');
	// loadUI('header');
	
	
	loadUI('description');
	loadUI('about');
	loadUI('testimonial');
	
	loadUI('features');

	loadUI('contact');
	loadUI('cta');

	
	loadUI('transition');
	loadFooter('main');
    