<?php
require_once "connect.php";

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "assets/img/$image");
        $conn->query("UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$id");
    }

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
  <h2>Edit Product</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Product Name</label>
      <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Current Image:</label><br>
      <img src="assets/img/<?= $product['image'] ?>" width="100"><br>
      <label class="mt-2">Change Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
