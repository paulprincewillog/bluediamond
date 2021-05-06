<?php
	include "../../../../initialize.php";
    require '../../../../apps/backend/_lib/db.php';
    require '../../../../apps/backend/_lib/data.php';

    $x= [];
 
    //$_POST["question"] = "what is the name of the school";
    //$_POST["answer"] = "this is the answer";

    if(isset($_POST['id'])){

        $id =  $_POST['id'];
        $id = $db->sanitize($id);

        $sql = "UPDATE faq  SET answer='$answer' WHERE id='$id'";
        $db->sql($sql);
    }

    if(isset($_POST["question"])){

            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $question= $db->sanitize($question);
            $answer = $db->sanitize($answer);


            $sql = "INSERT INTO faq(question, answer) VALUES('$question','$answer')";
        	$db->sql($sql);

            if($db->isSuccessful){

            $x['dd_success'] = true;
            $x['dd_feedback'] = "Data was submitted";
            
           

            }else{
                $x['dd_success'] = false;
                $x['dd_feedback'] = "Sorry, could not submit form please contact admin";
            }

        }

        echo json_encode($x);

