<?php

	require "../initialize.php";
	$page_link = "contact";
	$page_title = "Contact us";
	$page_description = "Contact Blue Diamond schools to make inquiries on your child's enrollment or to partner with our school for a program. Call us, send an email or locate our Effurun address";
	$page_keywords = "contact blue diamond, visit our school, schools in effurun";
	
	define("REF_NAME","");
	define("ACTIVE_CTA","cta_schedule");

	loadHeader("index");
	loadUI("index/loader");
	loadUI("main");

	loadUI("index/cta");
	loadCSS("index/cta");
	loadScript("index/cta");
	loadFooter("main");
