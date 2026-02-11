<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="users-table-container">
      <table class="users-table">
         <thead>
            <tr>
               <th>User ID</th>
               <th>Username</th>
               <th>Email Address</th>
               <th>User Type</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $select_users = mysqli_query($conn, "SELECT * FROM `users` ORDER BY user_type ASC, id DESC") or die('query failed');
               if(mysqli_num_rows($select_users) > 0){
                  while($fetch_users = mysqli_fetch_assoc($select_users)){
                     $type_class = ($fetch_users['user_type'] == 'admin') ? 'admin' : 'user';
            ?>
            <tr>
               <td data-label="User ID"><?php echo $fetch_users['id']; ?></td>
               <td data-label="Username">
                  <div class="user-info">
                     <i class="fas fa-user-circle"></i>
                     <span><?php echo $fetch_users['name']; ?></span>
                  </div>
               </td>
               <td data-label="Email Address"><?php echo $fetch_users['email']; ?></td>
               <td data-label="User Type">
                  <span class="user-badge <?php echo $type_class; ?>">
                     <?php echo $fetch_users['user_type']; ?>
                  </span>
               </td>
               <td data-label="Actions">
                  <?php if($fetch_users['id'] != $admin_id){ ?>
                     <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-icon" title="Delete User">
                        <i class="fas fa-trash"></i>
                     </a>
                  <?php }else{ echo '<span class="current-user">Current</span>'; } ?>
               </td>
            </tr>
            <?php
                  }
               }else{
                  echo '<tr><td colspan="5" class="empty">no users found!</td></tr>';
               }
            ?>
         </tbody>
      </table>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>