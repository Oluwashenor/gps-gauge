<?php

include ('dbcon.php');

if(isset($_POST['update_fuel'])){
    $data = [
        'reading'=> 50
    ];
    $table = "fuel";
    $result = $database->getReference($table)->push($data);
    if($result){
        echo "Yes";
        return;
        header('Location: /gps-gauge');
    }
    else{
        echo "No";
        return;
        header('Location: /gps-gauge');
    }
}

