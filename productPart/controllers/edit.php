<?php
require_once "../../shared/services/requestService.php";
require '../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestService = new RequestService("http://api/products");
    $id = $_POST["id"];
    $title = $_POST["title"];
    $price = $_POST["price"];

    $entityData = [
        "title" => $title,
        "price" => $price,
    ];

    $response = $requestService->updateEntity($id, $entityData);
    $response = json_decode($response);
    $id = $response->product[0]->id;
    header("Location: ../products.php?id=" . $id);
    exit;
}
