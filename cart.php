<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $product = $result->fetch_assoc();
} else {
    echo "No product selected.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >
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
  <h2>Cart</h2>
  <div class="alert alert-success">
    ✅ <strong><?= $product['name'] ?></strong> has been added to your cart!
  </div>
  <a href="index.php" class="btn btn-primary">Continue Shopping</a>
</div>

  <!-- Footer area -->
  <footer class="text-center mt- py-5">
    <p>&copy; 2025 www.aliexpress.com. All rights reserved.</p>
  </footer>
</body>
</html>
