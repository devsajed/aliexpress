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
<body>
<div class="container py-3">
  <div class="row  align-items-center">
    <div class="col-4">
      <div class="logo">
        <a href="index.php" class="text-success">AliExpress</a>
      </div>
    </div>
      <div class="col-8 d-flex justify-content-end ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#cart.php">Cart</a>
              </li>
            </ul>
          </div>
        </nav> 

      </div>
    
  </div>
</div>


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

  <!-- Footer area -->
  <footer class="text-center mt- py-5">
    <p>&copy; 2025 www.aliexpress.com. All rights reserved.</p>
  </footer>
</body>
</html>
