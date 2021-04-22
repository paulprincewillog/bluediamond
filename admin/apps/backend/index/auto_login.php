<?php
    
    require "../../../../initialize.php";
    $x = [];   

    if (isset($_SESSION[PREFIX."_admin"])) {
        $x['dd_success'] = true;
    } else {
        $x['dd_success'] = false;
    }
    
    echo json_encode($x);