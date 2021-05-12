<?php

	require "../initialize.php";
	include BACKEND_LIB."db.php";
	$page_link = "index";
	$page_title = "Pick the right school for your child";
	$page_description = "Blue Diamond schools, based in Effurun, strives to make quality education affordable while still committing to a high standard of education. Creche, primary and secondary facilities available.";
	$page_keywords = "schools in effurun, best schools in effurun, schools in pti road, schools along pti road, affordable schools in warri, creche in effurun";
	
	// Personalize title for referral
	if (isset($_GET['ref'])) {

		$ref_number = $db->sanitize($_GET['ref']);
		$ref = $db->getUser($ref_number);
		$ref_name =  $ref['title']." ".$ref['full_name'];
		$page_title = $ref_name." is inviting you to check out our website";
		define("REF_NAME",", ".$ref_name.", ");
		define("ACTIVE_CTA","cta_referral");

		$_SESSION['source_type'] = "Referred";
		$_SESSION['source_details'] = $ref_number;

	} else if (isset($_GET['utm_source']) && strtolower($_GET['utm_source']) == 'facebook') {
		
		$page_title = "Welcome to our school";
		define("REF_NAME", "facebook");
		define("ACTIVE_CTA","cta_facebook");

	}

	else {
		define("REF_NAME","");
		define("ACTIVE_CTA","none");
	}

	if (isset($_GET['utm_source'])) {
		$_SESSION['source_type'] = $_GET['utm_source'];
	}

	if (isset($_GET['utm_campaign'])) {
		$_SESSION['source_details'] = $_GET['utm_campaign'];
	}

	loadHeader('index');
	loadUI('loader');
	
	
	loadUI('description');
	loadUI('about');
	loadUI('testimonial');
	
	loadUI('features');

	loadUI('contact');
	loadUI('cta');

	loadUI("updates");
	
	//loadUI('transition');
	loadFooter('main');
    