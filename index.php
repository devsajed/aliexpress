<?php require_once "connect.php"; ?>
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
  <title>Admin Dashboard</title>
  <!-- Boostrap 5.3.0  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Main CSS  -->
  <link rel="stylesheet" href="assets/css/style.css"> 
</head>
<body>
<!-- Navigation Bar -->
 <div class="container py-3 bg-light">
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

<!-- Hero Section  -->

<div class="container mt-5 py-4">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h1 class="display-4">Welcome to the Admin Dashboard</h1>
      <p class="lead">Manage your products efficiently.</p>
      <a href="#" class="btn btn-success text-capitalize">contact me</a>
    </div>
    <div class="col-md-6">
      <img src="assets/img/clark-street-mercantile-qnKhZJPKFD8-unsplash.jpg" alt="Admin Dashboard" class="img-fluid">
    </div>
  </div>
</div>
<!-- All products  -->
<div class="container">
  <div class="row">
    <div class="col-12 text-center mt-5 mb-5">
      <h4>All Products</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
  </div>
 <!-- products card  -->
</div>

<div class="container">
  <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-12 col-sm-6 col-md-4 mb-4'>";
        echo "<div class='card h-100'>";
        echo "<img src='assets/img/{$row['image']}' class='card-img-top' alt='{$row['name']}'>";  
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$row['name']}</h5>";
        echo "<p class='card-text'>Price: \${$row['price']}</p>";
        echo "<a href='view.php?id={$row['id']}' class='btn btn-warning btn-sm'>Details</a> ";
        echo "<a href='cart.php?id={$row['id']}' class='btn btn-success btn-sm'>Add to Cart</a>";
        echo "</div></div></div>";
    }
    ?>
  </div>
</div>



<!-- admin Dashboard  -->
<!-- <div class="container mt-5">
  <h2 class="mb-4 "> Product Admin Dashboard</h2>

  <a href="add.php" class="btn btn-success mb-3">+ Add Product</a>

  <table class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $res = $conn->query("SELECT * FROM products ORDER BY id DESC");
    while ($row = $res->fetch_assoc()) { ?>
      <tr>
        <td><img src="assets/img/<?= $row['image'] ?>" width="120"></td>
        <td><?= $row['name'] ?></td>
        <td>$<?= $row['price'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
      </tr>
    <?php } ?>

      
    </tbody>
  </table>
</div> -->
  <!-- Footer area -->
  <footer class="text-center mt- py-5">
    <p>&copy; 2025 www.aliexpress.com. All rights reserved.</p>
  </footer>
</body>
</html>
