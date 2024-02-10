<?php
require_once "../services/requestService.php";
require '../vendor/autoload.php';


$requestService = new RequestService("http://api/products");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"]; 
    $price = $_POST["price"]; 

    $entityData = [
        "title" => $title,
        "price" => $price,
    ];

    $response = $requestService->createEntity($entityData);
    $response = json_decode($response);
    $id = $response->product[0]->title;
    header("Location: ../index.php?id=" . $id);
    exit;
}
