<?php

    $person_list = array(
        "admin" => "admin",
        "Hermer" => "ahermer",
        "marina"=> "99hazapi"
    );

    if(!empty($_POST["login"]) && !empty($_POST["password"]))
    {
        foreach($person_list as $person)
        {
            if(
                $person === $_POST["login"] &&
                $person["$person"] === $_POST["password"])
                {
                    setcookie("login",$_POST["login"],50000);
                    setcookie("password", $_POST["password"],50000);
                    header("Location: ".$_SERVER["HTTP_HOST"].'/main/');
                    exit();
                }
        }       
    }
    $_SESSION["wrong-pass"] = true;
    header("Location: ");