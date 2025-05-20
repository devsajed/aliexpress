<?php 
require_once "connect.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "assets/img/$image");

    $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Admin Dashboard for Product Management">
  <meta name="author" content="sajedul islam  ">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta name="google" content="notranslate">
  <meta name="revisit-after" content="1 days">
  <meta name="language" content="English">
  <meta name="keywords" content="Admin, Dashboard, Product, Management">
  <title>Add Product</title>
  <!-- Boostrap 5.3.0  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main CSS  -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Product</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Product Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Image</label>
      <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="index.php" class="btn btn-danger">Back</a>
  </form>
</div>
</body>
</html>
