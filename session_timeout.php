<?php
session_start();
if(isset($_SESSION['timeout']) && $_SESSION['timeout'] + TIMEOUT_DURATION <=time())
{
    header("location: logout.php");
}
if(!isset($_SESSION['timeout']))
{
        header("location: logout.php");
}
