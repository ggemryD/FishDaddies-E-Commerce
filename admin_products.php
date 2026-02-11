<?php
   include 'config.php';
   session_start();

   $admin_id = $_SESSION['admin_id'];

   if (!isset($admin_id)) {
      header('location:login.php');
      exit();
   }

   if (isset($_POST['add_product'])) {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $price = $_POST['price'];
      $stock = $_POST['stock']; // Get the stock value
      $image = $_FILES['image']['name'];
      $category = $_POST['category']; // Use category from dropdown
      $description = mysqli_real_escape_string($conn, $_POST['description']); // Capture description
   
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'uploaded_img/' . $image;
   
      $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('Query failed');
   
      if (mysqli_num_rows($select_product_name) > 0) {
         $message[] = 'Product name already added';
      } else {
         $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, category, description) VALUES ('$name', '$price', '$image', '$category', '$description')") or die('Query failed');
   
         if ($add_product_query) {
            if ($image_size > 2000000) {
               $message[] = 'Image size is too large';
            } else {
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'Product added successfully!';
            }
         } else {
            $message[] = 'Product could not be added!';
         }
      }
   }

   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
  
      // Delete reviews related to the product
      $delete_reviews_query = mysqli_query($conn, "DELETE FROM `reviews` WHERE product_id = '$delete_id'") or die('Query failed');
  
      // Delete the product image if it exists
      $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('Query failed');
      $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
  
      if ($fetch_delete_image && !empty($fetch_delete_image['image'])) {
          $image_path = 'uploaded_img/' . $fetch_delete_image['image'];
          if (file_exists($image_path)) { // Ensure the file exists
              unlink($image_path); // Delete the image file
          }
      }
  
      // Delete the product after removing related reviews
      $delete_product_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('Query failed');
  
      header('Location: admin_products.php'); // Redirect after deletion
      exit();
  }
       

   if (isset($_POST['update_product'])) {
      $update_p_id = $_POST['update_p_id'];
      $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
      $update_price = $_POST['update_price'];
      $update_stock = $_POST['update_stock']; // Get the updated stock value
      $update_category = $_POST['update_category']; 
      $update_description = mysqli_real_escape_string($conn, $_POST['update_description']); // Capture updated description
   
      mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', stock = '$update_stock', category = '$update_category', description = '$update_description' WHERE id = '$update_p_id'") or die('Query failed');
   
      $update_image = $_FILES['update_image']['name'];
      $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
      $update_folder = 'uploaded_img/' . $update_image;
      $update_old_image = $_POST['update_old_image'];

      if (!empty($update_image)) {
         if ($update_image_size > 2000000) {
            $message[] = 'Image size is too large';
         } else {
            mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('Query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploaded_img/' . $update_old_image);
         }
      }

      header('location:admin_products.php');
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom admin CSS file link -->
   <!-- <link rel="stylesheet" href="css/admin_style.css"> -->
   <link rel="stylesheet" href="css/admin_products.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<div class="container">

   <div class="add-product-header">
      <h1 class="title">Shop Products</h1>
      <button id="add-product-btn" class="btn"><i class="fas fa-plus"></i> Add New Product</button>
   </div>

   <section class="add-products-modal" id="add-product-modal">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="modal-header">
            <h3>Add New Product</h3>
            <i class="fas fa-times" id="close-add-modal"></i>
         </div>
         <input type="text" name="name" class="box" placeholder="Enter product name" required>
         <div class="price-stock-container">
            <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
            <input type="number" min="0" name="stock" class="box" placeholder="Enter stock quantity" required>
         </div>
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
         <select name="category" class="box" required>
            <option value="" disabled selected>Choose Category</option>
            <option value="Guppy">Guppy</option>
            <option value="Goldfish">Goldfish</option>
            <option value="Betta">Betta</option>
            <option value="Koi">Koi</option>
         </select>
         <textarea name="description" class="box" placeholder="Enter product description" required></textarea>
         <input type="submit" value="Add Product" name="add_product" class="btn">
      </form>
   </section>

   <section class="show-products">

      <div class="search-container">
         <form action="" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search products by name or category..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
            <?php if(isset($_GET['search'])): ?>
               <a href="admin_products.php" class="clear-btn"><i class="fas fa-times"></i></a>
            <?php endif; ?>
         </form>
      </div>

      <div class="products-table-container">
         <table class="products-table">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
               $query = "SELECT * FROM `products`";
               if(!empty($search)){
                  $query .= " WHERE name LIKE '%$search%' OR category LIKE '%$search%'";
               }
               $query .= " ORDER BY id DESC";
               
               $select_products = mysqli_query($conn, $query) or die('Query failed');
               if (mysqli_num_rows($select_products) > 0) {
                  while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                     ?>
                     <tr>
                        <td data-label="Image">
                           <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="table-img">
                        </td>
                        <td data-label="Name" class="name"><?php echo $fetch_products['name']; ?></td>
                        <td data-label="Category">
                           <span class="category-badge"><?php echo $fetch_products['category']; ?></span>
                        </td>
                        <td data-label="Price" class="price">₱<?php echo number_format($fetch_products['price'], 2); ?></td>
                        <td data-label="Stock">
                           <span class="stock-status <?php echo ($fetch_products['stock'] <= 5) ? 'low-stock' : ''; ?>">
                              <?php echo $fetch_products['stock']; ?>
                           </span>
                        </td>
                        <td data-label="Actions">
                           <div class="actions">
                              <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="edit-icon" title="Edit Product">
                                 <i class="fas fa-edit"></i>
                              </a>
                              <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-icon" onclick="return confirm('Delete this product?');" title="Delete Product">
                                 <i class="fas fa-trash"></i>
                              </a>
                           </div>
                        </td>
                     </tr>
                     <?php
                  }
               } else {
                  echo '<tr><td colspan="6" class="empty">No products found!</td></tr>';
               }
               ?>
            </tbody>
         </table>
      </div>

   </section>

   <section class="edit-product-form">
      <?php
      if (isset($_GET['update'])) {
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('Query failed');
         if (mysqli_num_rows($update_query) > 0) {
            while ($fetch_update = mysqli_fetch_assoc($update_query)) {
               ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-header">
                     <h3>Update Product</h3>
                     <a href="admin_products.php"><i class="fas fa-times"></i></a>
                  </div>
                  
                  <!-- Hidden fields to track product ID and image -->
                  <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
                  <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
                  
                  <!-- Product image preview -->
                  <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="" class="update-image">
                  
                  <!-- Product name input -->
                  <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" required class="box" placeholder="Enter product name">
                  
                  <!-- File input for updating image -->
                  <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box" placeholder="Choose a file">

                  <!-- Container for "price" and "category" to align them beside each other -->
                  <div class="inline-fields"> 
                     <input type="number" min="0" name="update_price" value="<?php echo $fetch_update['price']; ?>" required class="box" placeholder="Enter product price">
                     <input type="number" min="0" name="update_stock" value="<?php echo $fetch_update['stock']; ?>" required class="box" placeholder="Enter stock quantity">
                     <!-- Category dropdown -->
                     <select name="update_category" class="box" required>
                        <option value="Guppy" <?php echo $fetch_update['category'] == "Guppy" ? "selected" : ""; ?>>Guppy</option>
                        <option value="Goldfish" <?php echo $fetch_update['category'] == "Goldfish" ? "selected" : ""; ?>>Goldfish</option>
                        <option value="Betta" <?php echo $fetch_update['category'] == "Betta" ? "selected" : ""; ?>>Betta</option>
                        <option value="Koi" <?php echo $fetch_update['category'] == "Koi" ? "selected" : ""; ?>>Koi</option>
                     </select>
                  </div>
                  
                  <!-- Product description -->
                  <textarea name="update_description" class="box" placeholder="Enter product description" required><?php echo $fetch_update['description']; ?></textarea>
                  
                  <!-- Update and Cancel buttons -->
                  <input type="submit" value="Update" name="update_product" class="btn">
                  <a href="admin_products.php" class="option-btn">Cancel</a>
               </form>

               <?php
            }
         }
      } else {
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
      ?>
   </section>
</div>

<!-- Custom admin JavaScript file link -->
<script src="js/admin_script.js"></script>

<script>
   // Add Product Modal Logic
   const addProductBtn = document.querySelector('#add-product-btn');
   const addProductModal = document.querySelector('#add-product-modal');
   const closeAddModal = document.querySelector('#close-add-modal');

   if(addProductBtn) {
      addProductBtn.onclick = () => {
         addProductModal.classList.add('active');
      };
   }

   if(closeAddModal) {
      closeAddModal.onclick = () => {
         addProductModal.classList.remove('active');
      };
   }

   // Close modal on outside click
   window.onclick = (event) => {
      if (event.target == addProductModal) {
         addProductModal.classList.remove('active');
      }
      // Handle existing update form close if needed
      const updateModal = document.querySelector('.edit-product-form');
      if (event.target == updateModal) {
         updateModal.style.display = "none";
         window.location.href = 'admin_products.php';
      }
   };
</script>

</body>
</html>
