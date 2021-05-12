<?php
	header("HTTP/1.0 404 Not Found");
	require "../initialize.php";
	$page_link = "404";
	$page_title = "404 - Page not found";
	$page_description = "This is the page that displays when you use a misspelled or broken link.";
	$page_keywords = "404 error page";

	loadHeader("main");
	loadUI("main");
	loadFooter("main");
