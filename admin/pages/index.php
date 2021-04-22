<?php

	require "../../initialize.php";
	$page_link = "index";
	$page_title = "Welcome back admin";
	$page_description = "Admin panel";
	$page_keywords = "Admin panel";

	loadHeader("main");

	loadUI("_begin");

	loadUI("login");
	loadUI("dashboard");
	loadUI("numbers");
	loadUI("announcement");
	
	loadUI("_end");

	loadFooter("main");
