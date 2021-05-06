<?php
	// include "../../../initialize.php";
    
    use MatthiasMullie\Minify;
    // make sure to update the path to where you cloned the projects to!
    // $path = '/path/to/libraries';
    require_once BACKEND_LIB.'minify/src/Minify.php';
    require_once BACKEND_LIB.'minify/src/CSS.php';
    require_once BACKEND_LIB.'minify/src/JS.php';
    require_once BACKEND_LIB.'minify/src/Exception.php';
    require_once BACKEND_LIB.'minify/src/Exceptions/BasicException.php';
    require_once BACKEND_LIB.'minify/src/Exceptions/FileImportException.php';
    require_once BACKEND_LIB.'minify/src/Exceptions/IOException.php';
    require_once BACKEND_LIB.'path-converter/src/ConverterInterface.php';
    require_once BACKEND_LIB.'path-converter/src/Converter.php';

    // $minifier = new Minify\JS("../../frontend/_lib/dodo.js");
    // $minifier->minify("../../frontend/_lib/dodo.min.js");
