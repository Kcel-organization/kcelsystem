<?php
session_start();

if(isset($_SESSION['Teacher_ID'])){
    unset($_SESSION['Teacher_ID']);
}

header("location: login.php");
die;