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
<body class="p-4 bg-light">
<div class="container">
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
</div>
</body>
</html>
