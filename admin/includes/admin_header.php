<?php ob_start();// send the info all together ?>
<?php include "../includes/db.php"; ?>
<?php include "./functions.php"; ?>

<?php session_start();// star session ?>

<?php

 if(!isset($_SESSION['role'])){
   header("Location: ../index.php");
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Company Name | Admin/Client</title>

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <link href="css/styles.css" rel="stylesheet">
    
    <!-- Google Chart Library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
     <!-- CKEditor5 for textarea -->
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</head>

<body>