<?php

require_once 'constants.php';
require_once ("Includes/database.php");
require_once 'classes/Post.php';
$keyword = filter_input(INPUT_POST, "keyword", FILTER_SANITIZE_STRING);
$fDate = filter_input(INPUT_POST, "fDate", FILTER_SANITIZE_STRING);
$tDate = filter_input(INPUT_POST, "tDate", FILTER_SANITIZE_STRING);
//$keyword="kyleli";
//$fDate="";
//$tDate="";
$query1 = "";
if ($keyword == "" && $fDate == "" && $tDate == "") {
    $query1 = "SELECT * FROM post ORDER BY PostID";
}

if ($keyword == "" && $fDate == "" && $tDate != "") {
    $query1 = "SELECT * FROM post WHERE DATEDIFF(time,$tDate)<=0";
}

if ($keyword == "" && $fDate != "" && $tDate == "") {
    $query1 = "SELECT * FROM post WHERE DATEDIFF(time,$fDate)>=0";
}

if ($keyword == "" && $fDate != "" && $tDate != "") {
    $query1 = "SELECT * FROM post WHERE DATEDIFF(`time`,$fDate)>=0 AND DATEDIFF(`time`,$tDate)<=0";
}

if ($keyword != "" && $fDate == "" && $tDate == "") {
    $query1 = "SELECT * FROM post WHERE title LIKE '%$keyword%' "
            . "OR content LIKE '%$keyword%' "
            . "OR hashtag LIKE '%$keyword%' "
            . "OR (SELECT name FROM user WHERE UserID = post.UserID) LIKE '%$keyword%'";
}

if ($keyword != "" && $fDate == "" && $tDate != "") {
    $query1 = "SELECT * FROM post WHERE (title LIKE '%$keyword%' "
            . "OR content LIKE '%$keyword%' "
            . "OR hashtag LIKE '%$keyword%' "
            . "OR (SELECT name FROM user WHERE UserID = post.UserID) LIKE '%$keyword%') "
            . "AND DATEDIFF(time,$tDate)<=0";
}

if ($keyword != "" && $fDate != "" && $tDate == "") {
    $query1 = "SELECT * FROM post WHERE (title LIKE '%$keyword%' "
            . "OR content LIKE '%$keyword%' "
            . "OR hashtag LIKE '%$keyword%' "
            . "OR (SELECT name FROM user WHERE UserID = post.UserID) LIKE '%$keyword%') "
            . "AND DATEDIFF(time,$fDate)>=0";
}

if ($keyword != "" && $fDate != "" && $tDate != "") {
    $query1 = "SELECT * FROM post WHERE (title LIKE '%$keyword%' "
            . "OR content LIKE '%$keyword%' "
            . "OR hashtag LIKE '%$keyword%' "
            . "OR (SELECT name FROM user WHERE UserID = post.UserID) LIKE '%$keyword%') "
            . "AND (DATEDIFF(`time`,$fDate)>=0 AND DATEDIFF(`time`,$tDate)<=0)";
}
//echo $query1;
$page = 1;
$stmt1 = $db->prepare($query1);
$stmt1->execute();
$result = $stmt1->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
$stmt1->closeCursor();
$posts = array(array());
//print_r($result);
$i = 0;
$j = 0;
$count = 0;
while ($count < sizeof($result)) {
    if ($count % (MAX_ROW_AT_ALL * MAX_POST_PER_ROW ) == 0 && $count != 0) {
        $i++;
        $j = 0;
    }
    $posts[$i][$j] = $result[$count];
    $j++;
    $count++;
}
//print_r($posts);
$pages = sizeof($posts);
$a = 0;
$per_page = array_chunk($posts[$page - 1], MAX_POST_PER_ROW);
$str='';
while ($a < sizeof($per_page)) {
    $str .= '<div class="row">';
    foreach ($per_page[$a] as $p) {
        $str .= $p->displayAtAllPost();
    }
    $str .= '</div>';
    $a++;
}

$str .= '<div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">';

$num_of_page = sizeof($posts);
$previous_page = $page - 1;
if ($previous_page < 1) {
    $previous_page = 1;
}
$next_page = $page + 1;
if ($next_page > $num_of_page) {
    $next_page = $num_of_page;
}
$str .= '   <li><a href="allPost.php?page=' . $previous_page . '">&laquo;</a> </li>';
$b = 0;
while ($b < $num_of_page) {
    if ($b + 1 == $page) {
        $str .= '<li class="active" style="color: #ffd11a !important;"><a href="allPost.php?page=' . ($b + 1) . '">' . ($b + 1) . '</a></li>';
    } else {
        $str .= '<li><a href="allPost.php?page=' . ($b + 1) . '">' . ($b + 1) . '</a></li>';
    }
    $b++;
}
$str .= '  <li><a href="allPost.php?page=' . $next_page . '">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>';
echo $str;
