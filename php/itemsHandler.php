<?php
    include_once("mysql.php");
    @session_start();

    function __getRelatedItems()
    {
        global $conn;
        $sql = "SELECT * FROM Products ORDER BY RAND() LIMIT 6;";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();

            $data = [];
            if ($result->num_rows > 0) {
                $data = $result -> fetch_all();
            }

            $stmt->close();

            if (!empty($data)) {
                return $data;
            }
        }
        //Failed
        return "";
    }
    function getRelatedItemsHTML(){
        $resultStr = "";
        $data = __getRelatedItems();
        if($data === ""){
            die("RelatedDataError");
        }
        foreach ($data as $card) {
            $resultStr .= '
                <div class="col-6 col-md-4 col-lg-2 align-items-stretch">
                    <div class="card mb-4 w-100">
                        <img src="'.getImageForItemInCategory($card[3]).'" class="card-img-top img-fluid" alt="' . htmlspecialchars($card[1]) . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($card[1]) . '</h5>
                            <p class="card-text">€' . htmlspecialchars(number_format((float)$card[5], 2, ',', '')) . '</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success" href="/item.php?itemID='.$card[0].'">Besuchen</a>
                        </div>
                    </div>
                </div>
                ';
        }
        return $resultStr;
    }

    function __getItemByID($ItemID){
        global $conn;
        $sql = "SELECT * FROM Products WHERE ProductID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ItemID);
        $stmt-> execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }
        return null;
    }

    function getItemByIDInNamedArray($ItemID){
        $data = __getItemByID($ItemID);
        if($data === null)
        {
            die("Wrong Item ID");
        }
        $new_Price = number_format((float)$data["UnitPrice"], 2, '.', '');
        $data["UnitPrice"] = $new_Price;
        return $data;
    }

    function getFolderNameForCategory($CategoryID){
        global $conn;
        $sql = "SELECT folder_name FROM Categories WHERE CategoryID=?;";
        $stmt = $conn -> prepare($sql);
        if(!$stmt){
            die("Something is wrong");
        }
        $stmt -> bind_param("i",$CategoryID);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data["folder_name"];
        } else {
            die();
        }
        return "";
    }

    function __getRandomImageFromFolder($folder_name){
        $File_array = [];
        $File_array = scandir("./assets/".$folder_name);
        $selected = random_int(2,count($File_array)-1);
        return $File_array[$selected];
    }

    function getImageForItemInCategory($CategoryID): string
    {
        $folder = getFolderNameForCategory($CategoryID);
        return "./assets/".$folder."/".__getRandomImageFromFolder($folder);
    }