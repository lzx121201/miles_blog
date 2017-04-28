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
        require_once 'classes/Post.php';
        $query = "SELECT * FROM post ORDER BY PostID";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
        $statement->closeCursor();
        $posts = array(array());
        $i = 0;
        $j = 0;
        $count = 0;
        while ($count < sizeof($result)) {
            if ($count % 6 == 0 && $count !=0) {
                $i++;
                $j = 0;
            }
            $posts[$i][$j] = $result[$count];
            $j++;
            $count++;
        }
                $per_page = array_chunk($posts[1-1],MAX_POST_PER_ROW);
                print_r($per_page);
        ?>
    </body>
</html>
