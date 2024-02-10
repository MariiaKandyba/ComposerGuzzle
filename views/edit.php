<?php
require_once "../services/requestService.php";
require_once "../models/Product.php";
require '../vendor/autoload.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id != null) {
    $requestService = new RequestService("http://api/products");
    $data = json_decode($requestService->getEntityById($id), true);
    $product = $data['product'][0];
    if ($product != null) {
        $productObj = new Product($product['title'], $product['price'], $product['id']);

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Application</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <link rel="stylesheet" href="/style/form.css">
        </head>

        <body>
            <div id="container">
                <?php require_once "../templates/navbar-products.php"; ?>

                <form id="applicationForm" class="appform" method="post" action="../controllers/edit.php">
                    <h1 class="appheader">Product</h1>
                    <div class="row">
                        <label class="bold" for="title">Title: *</label>
                        <input type="text" id="titleInput" name="title" value="<?php echo $product['title'] ?>" required />
                    </div>
                    <div class="row">
                        <label class="bold" for="price">Price: *</label>
                        <input type="number" id="priceInput" name="price" value="<?php echo $product['price'] ?>" step="0.01" required />
                        <input type="hidden" name="id" value="<?php echo $id ?>" step="0.01" required />
                    </div>
                    <div class="btn">
                        <input type="submit" value="Confirm" />
                    </div>
                </form>
            </div>
        </body>

        </html>
<?php

    } else {
        header("Location: /productPart/views/notFound.php");
        exit;
    }
}
