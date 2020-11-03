<?php
session_start();
if(isset($_POST)){
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    if($_SESSION['reviews'] === null)
        $_SESSION['reviews'] =  array();
    $_SESSION['reviews'][$name] = $rating;
    header('location: ../');
}
