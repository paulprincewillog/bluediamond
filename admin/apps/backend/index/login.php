<?php


    require "../../../../initialize.php";
    require BACKEND_LIB."db.php";
    require BACKEND_LIB."data.php";

    $x = [];
	if (isset($_POST["password"])) {

        $password = $dt->getData("password");
        $password = $dt->encrypt($password);

        $db->sql("SELECT value FROM data WHERE title='admin_password'");
        $db->getData();
        if ($db->data["value"] == $password) {
            $_SESSION[PREFIX."_admin"] = "admin";
            $x['dd_success'] = true;
        }
                
        else {
            $x['dd_success'] = false;
            $x['dd_feedback'] = "Your password is incorrect. Try again";
        }

    }

    echo json_encode($x);