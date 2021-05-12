<?php

	// Loading session
	ob_start();
	session_start();

	$relative_root = '';
	$path = '../';
	$root = '../';
	$config = 'config.php';
	$headerIsLoaded = false;

	
	// This special setting is for subfolder linking
	if (!file_exists($root.$config)) {
		$root = "../../";
		$relative_root = "../";
		if (!file_exists($root.$config)) {
			$root = "../../../";
			$relative_root = "../../";

			if (!file_exists($root.$config)) {
				$root = "../../../../";
				$path = "../../../";
				$relative_root = "../../../";

			}
		}	
	}

	require($root.$config);

	// Define URLs
	define("UI", $path._UI);
	define("APP", $path.BACKEND);
	define("JS", $path.FRONTEND);
	define("DODO", $root."dodo/");
	define("ROOT", $root);
	define("RELATIVE_ROOT", $relative_root);
	define("PATH", $path);
	define("FRONTEND_LIB", $relative_root._FRONTEND_LIB);
	define("BACKEND_LIB", $root._BACKEND_LIB);

	// This will get the current link of this page
	if (!isset($page_link)) {
	  	$page_link = basename($_SERVER['REQUEST_URI']);
	  	$page_link = explode('?', $page_link);
	  	$page_link = $page_link[0];
	} else if ($page_link == 'index') {
	 	$page_link = $page_link;
	}

	function loadUI($link, $root = '') {
		global $page_link;
		
		if ($root == "root") {
			include PATH.UI.$link.'.php';
		}
		else if (file_exists(UI.$page_link.'/'.$link.'.php')) {
			include UI.$page_link.'/'.$link.'.php';
		}
		else if (file_exists(UI.$link.'.php')) {
			include UI.$link.'.php';
		}
	}
    
    function loadPage($link, $type="internal") {
        global $page_link;
        if (file_exists(UI.$page_link.'/'.$link.'.php')) {
            $final_link = $page_link.'/'.$link.'.php';
		}
		else if (file_exists(UI.$link.'.php')) {
			$final_link = $link.'.php';
		}
        
        if ($type == "internal") {
            
            echo "<ddpage url='hash_$link' type='$type' style='display: none'>";
            include UI.$final_link;
            echo "</ddpage>";
        }
	
    }

    function loadTemplate($link) {
        global $page_link;
        if (file_exists(UI.$page_link.'/'.$link.'.php')) {
            $final_link = $page_link.'/'.$link.'.php';
		}
		else if (file_exists(UI.$link.'.php')) {
			$final_link = $link.'.php';
		}
        

        echo "<ddtemplate for='$link' style='display: none'>";
        include UI.$final_link;
        echo "</ddtemplate>";
        
	
    }

	// This guy checks if this page is requested using ajax
	// If it is, don't load the header, only the styles
	function loadHeader($link = 'main') {
		global $page_link; global $page_title; global $website; global $page_description; global $page_keywords; global $page_icon;
        

		if (!isset($_SERVER['HTTP_DODO'])) {
            
            header_is_loaded();
			include UI ."headers/$link.php";
            
		} else {
			echo "<link rel='stylesheet' href='".UI."/$page_link/_styles.dd.css?v=".VERSION."'>";
		}
	}

	function loadFooter($link = 'main') {
		global $path; global $page_link; global $website;

		echo "<script async src='".ROOT_URL."apps/frontend/_lib/dodo.min.js?v=".VERSION."'></script>";
		echo "<script async src='". FRONTEND ."$page_link/_scripts.dd.js?v=".VERSION."'></script>";

		if (!isset($_SERVER['HTTP_DODO'])) {
			include UI ."footers/$link.php";
		}
	}

	
	function loadCSS($link, $root = '') {
        
		global $page_link;
		
		if ($root =="root") {
            echo "<link rel='stylesheet' href='". ROOT_URL._UI ."$link.css?v=". VERSION."'>";
		}

		else if (file_exists(UI.$page_link.'/'.$link.'.css')) {
			echo "<link rel='stylesheet' href='". _UI ."$page_link/$link.css?v=". VERSION."'>";
		}
		else if (file_exists(UI.$link.'.css')) {
            echo "<link rel='stylesheet' href='". _UI ."$link.css?v=". VERSION."'>";
		}
	}

	function loadScript($link, $root = '') {
        
		global $page_link;
		
		if ($root =="root") {
            echo "<script src='". ROOT_URL. FRONTEND ."$link.js?v=".VERSION."'></script>";
		}

		else if (file_exists(JS.$page_link.'/'.$link.'.js')) {
			echo "<script src='". FRONTEND ."$page_link/$link.js?v=".VERSION."'></script>";
		}
		else if (file_exists(JS.$link.'.js')) {
            echo "<script src='". FRONTEND ."$link.js?v=".VERSION."'></script>";
		}
	}

    function header_is_loaded() {
        global $page_link;
        include BACKEND_LIB.'dd_compile.php';
    }
