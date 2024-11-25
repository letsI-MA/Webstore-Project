<?php
include_once("mysql.php");

function getCatergorieFromID($CatID) {
    global $conn;

    // Prepare the SQL query
    $sql = "SELECT * FROM Categories WHERE CategoryID = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL preparation failed: " . $conn->error);
    }

    // Bind the parameter
    if (!$stmt->bind_param("i", $CatID)) {
        die("Parameter binding failed: " . $stmt->error);
    }

    // Execute the query
    if (!$stmt->execute()) {
        die("Query execution failed: " . $stmt->error);
    }

    // Fetch the results
    $result = $stmt->get_result();
    $data = [];

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Check and encode binary data
        if (isset($data['Picture'])) {
            $data['Picture'] = base64_encode($data['Picture']);
        }
    } else {
        echo("No category found for ID: " . $CatID);
    }

    // Close the statement
    $stmt->close();

    // Return JSON-encoded data
    return $data;
}

function fillCategorieCards(){
    global $conn;
    $resultString = "";
    $sql = "SELECT * FROM Categories;";
    $stmt = $conn->prepare($sql);
    $stmt-> execute();
    $result = $stmt->get_result();
    $data = $result -> fetch_all();
    foreach ($data as $cate) {
        $img = base64_encode($cate[3]);

        $resultString .= '<div class="card mb-3 m-4" style="height: 150px; overflow: hidden;" href="/categorie.php?catID=' . $cate[0] . '">
        <div class="row g-0 align-items-center h-100" >
            <div class="col-md-2 d-none d-lg-block" style="height: 100%;">
                <img src="data:image/png;base64,'.$img.'"
                     class="img-fluid rounded-start"
                     style="height: 100%; width: 100%; object-fit: cover;"
                     alt="'.$cate[1].'">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">'.$cate[1].'</h5>
                    <p class="card-text">'.$cate[2].'</p>
                </div>
            </div>
            <div class="col-sm-4 text-end d-flex justify-content-end align-items-center p-5">
                <a class="btn btn-success" href="/categorie.php?catID=' . $cate[0] . '">Besuchen</a>
            </div>
        </div>
    </div>';

    }
    return $resultString;
}



function fillItemCards($CategoryID){
    global $conn;
    $resultString = "";
    $sql = "SELECT * FROM Products WHERE CategoryID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $CategoryID);
    $stmt-> execute();
    $result = $stmt->get_result();
    $data = $result -> fetch_all();

    foreach ($data as $item) {
        $ID = $item[0];
        $ProductName = $item[1];
        $CategoryOfItem = $item[3];
        $Subtitle = $item[4];
        $stars  = random_int(1,5);

        $stars_str = str_repeat('<span class="text-warning me-1"><i class="bi bi-star-fill"></i></span>', $stars);
        $stars = 5-$stars;
        if($stars>0){
            $stars_str .= str_repeat('<span class="text-secondary"><i class="bi bi-star"></i></span>', $stars);
        }

        $resultString .= '<div class="card mb-3 " style="height: 150px; overflow: hidden;">
        <div class="row g-0 align-items-center h-100" href="/item.php?itemID=' . $ID . '">
            <div class="col-md-2 d-none d-lg-block" style="height: 100%;">
                <img src="'.getImageForItemInCategory($CategoryOfItem).'"
                     class="img-fluid rounded-start"
                     style="height: 100%; width: 100%; object-fit: cover;"
                     alt="'.$ProductName.'">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">'.$ProductName.'</h5>
                    <p class="card-text">Beschreibung: '.$Subtitle.'</p>
                    <div>
                        '.$stars_str.'
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-end d-flex justify-content-end align-items-center">
                <a class="btn btn-success" href="/item.php?itemID=' . $ID . '">Besuchen</a>
            </div>
        </div>
    </div>';
    }
    return $resultString;
}