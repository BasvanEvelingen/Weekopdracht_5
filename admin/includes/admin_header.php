<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['user_role'])) {
} else {
header("location: ../index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/newpaper.css" rel="stylesheet">
   <!-- <link href="css/sb-admin.css" rel="stylesheet">-->
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://www.google.com/jsapi"></script>
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
<body>
