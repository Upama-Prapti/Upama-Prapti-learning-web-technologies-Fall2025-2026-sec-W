<?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <span style="cursor: pointer; font-weight: bold; font-size: 1.5rem;" onclick="this.parentElement.remove();">×</span>
      </div>
      ';
   }
}
?>

<header class="header">

   <a href="index.php?route=admin&action=dashboard" class="logo">upos_blog</a>

   <div class="profile">
      <?php
         global $conn;
         $admin_id = $_SESSION['admin_id'] ?? '';
         
         if($admin_id != '' && isset($conn) && $conn){
            // Check which table the admin is from based on session
            $is_from_admin_table = $_SESSION['is_from_admin_table'] ?? 1;
            
            if($is_from_admin_table == 1) {
               // Admin from admin table
               $stmt = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
               $stmt->bind_param("i", $admin_id);
               $stmt->execute();
               $result = $stmt->get_result();
               $header_profile = $result->fetch_assoc();
            } else {
               // Admin from users table
               $stmt = $conn->prepare("SELECT * FROM `users` WHERE id = ? AND is_admin = 1");
               $stmt->bind_param("i", $admin_id);
               $stmt->execute();
               $result = $stmt->get_result();
               $header_profile = $result->fetch_assoc();
            }
            
            if($header_profile){
      ?>
      <p><?= $header_profile['name']; ?></p>
      <a href="index.php?route=admin&action=update_profile" class="btn">update profile</a>
      <?php
            }else{
      ?>
      <p>Admin not found</p>
      <?php
            }
         }else{
      ?>
      <p>Please login</p>
      <?php
         }
      ?>
   </div>

   <nav class="navbar">
      <a href="index.php?route=admin&action=dashboard"><span>home</span></a>
      <a href="index.php?route=admin&action=add_post"><span>add posts</span></a>
      <a href="index.php?route=admin&action=view_posts"><span>view posts</span></a>
      <a href="index.php?route=admin&action=admin_accounts"><span>accounts</span></a>
      <?php if($admin_id != ''){ ?>
      <a href="index.php?route=admin&action=logout" style="color:var(--red);" onclick="return confirm('logout from the website?');"><span>logout</span></a>
      <?php } ?>
   </nav>

   <?php if($admin_id == ''){ ?>
   <div class="flex-btn">
      <a href="index.php?route=admin&action=login" class="option-btn">login</a>
   </div>
   <?php } ?>

</header>

<div id="menu-btn" style="cursor: pointer; font-size: 2rem;">☰</div>
