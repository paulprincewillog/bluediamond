<?php

	require "../initialize.php";
	$page_link = "refer";
	$page_title = "Refer someone";
	$page_description = "If you know anyone who lives along PTI Road, Osubi, Okuokoko, Alegbo, UTI Road, Ebrumede and other neighbouring environment, refer them to us if they are looking for an affordable high standard school for their child";
	$page_keywords = "schools in pti road, refer parent for school, blue diamond schools, enroll my child, schools in effurun, best schools in effurun";

	loadHeader("main");
	loadUI('index/loader');

	loadUI("description");
	loadUI("submit_details");
	
	// loadUI("refer_successful");
	loadUI("share_link");
	loadUI("refer_parent");
	loadFooter("main");
