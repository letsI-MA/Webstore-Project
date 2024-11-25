<?php
include_once("./php/itemsHandler.php");
include_once("./php/categorieHandler.php");

if(!isset($_GET["catID"]))
{
    header("Location: ./OhNo.html");
    exit;
}

$Cat = getCatergorieFromID($_GET["catID"]);
$Cards = fillItemCards($_GET["catID"]);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tab icon for multiple platforms -->
    <link rel="icon" type="image/png" href="assets/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg"/>
    <link rel="shortcut icon" href="assets/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png"/>
    <link rel="manifest" href="assets/site.webmanifest"/>

    <title>Byteburger eShop</title>
    <style>
        .rounded-top-sidebar{
            border-top-right-radius: 0px;
            border-top-left-radius: %;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<nav id="header"></nav>

<div class="container-fluid row">
    <div class="col-md-3 row">
        <!--<div class="col-md-2"></div>-->
        <div class="col-md-12">
            <div class="w-100 h-100 rounded-top-sidebar"></div>
        </div>
        <!--<div class="col-md-2"></div>-->
    </div>
    <div class="col-md-6">
        <h1> <?php echo $Cat["CategoryName"]; ?> Artikel:</h1>
        <?php echo $Cards; ?>
    </div>
    <div class="col-md-3"></div>
</div>

<footer id="footer">
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js/footerHeader.js"></script>
</body>
</html>
