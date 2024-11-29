<?php
// Connection dür db gerufen
include_once("./php/mysql.php");
global $conn;

// Get-Werte
$productID = $_POST['ProductID'] ?? null;
$productName = $_POST['ProductName'] ?? null;
$categoryID = $_POST['CategoryID'] ?? null;
$QuantityPerUnit = $_POST['QuantityPerUnit'] ?? null;
$price = $_POST['UnitPrice'] ?? null;
$UnitsInStock = $_POST['UnitsInUnitsInStock'] ?? null;
$action = $_POST['submit'] ?? null;

// Switch-Case was gemacht werden soll
switch ($action) {
    case "add":
        // Hinzufügen 
        $sql = "INSERT INTO Products (ProductID, ProductName, CategoryID, QuantityPerUnit, UnitPrice, UnitsInStock) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isisdi", $productID, $productName, $categoryID, $QuantityPerUnit, $price, $UnitsInStock);

        if ($stmt->execute()) {
            echo "Produkt erfolgreich hinzugefügt.";
        } else {
            echo "Fehler beim Hinzufügen des Produkts: " . $conn->error;
        }
        $stmt->close();
        break;

    case "edit":
        // Ändern
        $sql = "UPDATE Products SET 
                CategoryID = ?, 
                QuantityPerUnit = ?, 
                UnitPrice = ?, 
                UnitsInStock = ? 
                WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isdis",  $categoryID, $QuantityPerUnit, $price, $UnitsInStock, $productName);

        if ($stmt->execute()) {
            echo "Produkt erfolgreich geändert.";
        } else {
            echo "Fehler beim Ändern des Produkts: " . $conn->error;
        }
        $stmt->close();
        break;

    case "delete":
        // Löschen
        $sql = "DELETE FROM Products WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);

        if ($stmt->execute()) {
            echo "Produkt erfolgreich gelöscht.";
        } else {
            echo "Fehler beim Löschen des Produkts: " . $conn->error;
        }
        $stmt->close();
        break;

    default:
        echo "Ungültige Aktion.";
        break;
}

header("Location: input_page.html");

?>
