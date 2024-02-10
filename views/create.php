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
        <form class="appform" id="applicationForm" method="post" action="../controllers/create.php">
            <h1 class="appheader">Product</h1>
            <div class="row">
                <label class="bold" for="title">Title: *</label>
                <input type="text" id="titleInput" name="title" required />
            </div>
            <div class="row">
                <label class="bold" for="price">Price: *</label>
                <input type="number" id="priceInput" name="price" step="0.01" required />
                <input type="hidden" name="id" step="0.01" required />
            </div>
            <div class="btn">
                <input type="submit" value="Confirm" />
            </div>
        </form>
    </div>
</body>

</html>