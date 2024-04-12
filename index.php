<!DOCTYPE html>
<html lang="en">
    <?php
include ('dbcon.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPS</title>
</head>
<body>
    <form action="code.php" method="post">
    <input name="update_fuel" type="submit"  />
    </form>
    <table>
    <tbody>
    <?php

        $ref_table = "fuel";
        $fetchData = $database->getReference($ref_table)->getValue();
        if($fetchData > 0){
            $i = 1;
            foreach($fetchData as $key => $row){
            ?>
                <tr>
                    <td><?=$i++;?></td>
                    <td><?=$key;?></td>
                    <td><?=$row['reading'];?></td>
                </tr>
                <?php
            }
        } 
        ?>
    </tbody>
    <table>
</body>
</html>