<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once ("Includes/database.php");

$query = "SELECT * FROM user";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'User');
    $statement->closeCursor();        
     foreach($result as $vehicle)
            {
                echo $vehicle . "<br>";
            }   
    ?>
    </body>
</html>
