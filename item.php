<?php
include_once("./php/itemsHandler.php");

if (!isset($_GET["itemID"])) {
    //header("Location: ./OhNo.html");
    //exit;
    $_GET["itemID"] = 27;
}

$product = getItemByIDInNamedArray($_GET["itemID"]);
$ImgLink = getImageForItemInCategory($product["CategoryID"]);
?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="./css/style.css">

    <title>Byteburger eShop</title>
    <!-- Tab icon for multiple platforms -->
    <link rel="icon" type="image/png" href="assets/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg"/>
    <link rel="shortcut icon" href="assets/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png"/>
    <link rel="manifest" href="assets/site.webmanifest"/>
    
    <style>
        .product{
            border: 1px solid #dddddd;
            height: 321px;
        }

        .product>img{
            max-width: 230px;
        }

        .product-rating{
            font-size: 20px;
            margin-bottom: 25px;
        }

        .product-title{
            font-size: 20px;
        }

        .product-desc{
            font-size: 14px;
        }

        .product-price{
            font-size: 22px;
        }

        .product-stock{
            color: #74DF00;
            font-size: 20px;
            margin-top: 10px;
        }

        .product-info{
            margin-top: 50px;
        }

        /*********************************************
                            VIEW
        *********************************************/



        .service1-item > img {
            max-height: 110px;
            max-width: 110px;
            opacity: 0.6;
            transition: all .2s ease-in;
            -o-transition: all .2s ease-in;
            -moz-transition: all .2s ease-in;
            -webkit-transition: all .2s ease-in;
        }

        .service1-item > img:hover {
            cursor: pointer;
            opacity: 1;
        }

        .service-image-left > center > img,.service-image-right > center > img{
            max-height: 155px;
        }

        @media (max-width: 768px) {
            .carousel-inner .carousel-item > div {
                display: none;
            }
            .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(33.333%);
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left{
            transform: translateX(0);
        }

        .card {
            min-height: 150px; /* Ensures uniform card height */
            height: 100%;

        }
        .card-img-top {
            object-fit: cover;
            height: 200px; /* Adjust to fit your design */
            width: 100%;   /* Ensures it spans the card width */
        }

    </style>
</head>
<body>
<nav id="header"></nav>

<div class="container mt-5 p-2">
    <div class="row">
        <div class="col-md-4 text-center">
            <?php
                echo '<img id="item-display" class="img-fluid" src="'.$ImgLink.'" alt="'.$product["ProductName"].'">'
            ?>
        </div>
        <div class="col-md-3">
            <div class="d-flex flex-column align-items-center">
                <a id="item-1" class="mb-2">
                    <img src="https://placehold.co/600x400?text=Coming+Soon!" class="img-fluid" alt="Thumbnail 1">
                </a>
                <a id="item-2" class="mb-2">
                    <img src="https://placehold.co/600x400?text=Kommt+bald!" class="img-fluid" alt="Thumbnail 2">
                </a>
                <a id="item-3">
                    <img src="https://placehold.co/600x400?text=¡Muy+pronto!" class="img-fluid" alt="Thumbnail 3">
                </a>
            </div>
        </div>
        <div class="col-md-5">
            <h2 class="product-title" id="itemName"><?php echo $product["ProductName"] ?></h2>
            <p class="text-muted"><?php echo $product["QuantityPerUnit"] ?></p>
            <div>
                <span class="text-warning me-1"><i class="bi bi-star-fill"></i></span>
                <span class="text-warning me-1"><i class="bi bi-star-fill"></i></span>
                <span class="text-warning me-1"><i class="bi bi-star-fill"></i></span>
                <span class="text-warning me-1"><i class="bi bi-star-fill"></i></span>
                <span class="text-secondary"><i class="bi bi-star"></i></span>
            </div>
            <p class="h4 text-success" id="itemPrice">€<?php echo $product["UnitPrice"] ?></p>
            <?php
                if($product["UnitsInStock"] >=1){
                    echo '<p id="inStock" class="text-success">Verfügbar</p>';
                } else {
                    echo '<p id="outOfStock" class="text-danger">Ausverkauft</p>';
                }
            ?>
            <hr />
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <h3>Inhaltsangabe:</h3>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco</li>
                                <li>Duis aute irure dolor in reprehenderit in voluptate velit</li>
                                <li>Excepteur sint occaecat cupidatat non proident</li>
                                <li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
                                <li>Curabitur pretium tincidunt lacus</li>
                                <li>Vestibulum ante ipsum primis in faucibus orci luctus et</li>
                                <li>Aliquam erat volutpat, nulla facilisi etiam dignissim</li>
                                <li>Proin faucibus arcu quis ante</li>
                                <li>Vivamus aliquet elit ac nisl</li>
                                <li>Suspendisse potenti nullam porttitor lacus at</li>
                            </ul>

                        </div>
                        <div class="tab-pane fade" id="product-info" role="tabpanel" aria-labelledby="product-info-tab">
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="d-flex float-end">
                <button type="button" class="btn btn-success me-2" id="addToCard">zum Warenkorb hinzufügen</button>
            </div>
        </div>
    </div>
    <!-- Product Info Tabs -->
    <hr/>
        <br/>
            <h2 class="text-center"> Produkte die Ihnen gefallen könnten</h2>
        <br/>
    <hr/>
    <div class="container mt-4">
        <div class="row d-flex">
            <?php echo getRelatedItemsHTML(); ?>
        </div>
    </div>
</div>

<footer id="footer">
</footer>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src='js/shoppingCard.js'></script>
<script src='js/footerHeader.js'></script>
<script>
    $(document).ready(function () {
        console.log("Kappador use splash. .... it does nothing...")

    });
</script>
</body>
</html>
