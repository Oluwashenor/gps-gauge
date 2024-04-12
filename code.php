<?php

include ('dbcon.php');
session_start();
$fuel = "fuel";


if(isset($_POST['update_fuel'])){
    $data = [
        'reading'=> rand(10, 100)
    ];
    $table = "fuel";
    if (isset($_SESSION[$fuel])){
        $update_ref = $table."/".$_SESSION[$fuel];
        $result = $database->getReference($update_ref)->update($data);
        header('Location: /gps-gauge');
    }
    else{
        $records = $database->getReference($table)->getValue();
        if($records > 0){
            $broken_records = array_keys($records);
            $key = $broken_records[0];
            $_SESSION[$fuel] = $key;
            header('Location: /gps-gauge');
        }
        else{
            $result = $database->getReference($table)->push($data);
            if($result){
                header('Location: /gps-gauge');
            }
        }   
    }
        
}