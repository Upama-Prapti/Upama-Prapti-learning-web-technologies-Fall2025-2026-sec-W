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

   <section class="flex">

      <a href="index.php?route=home" class="logo">upos_blog</a>

      <form action="index.php?route=search" method="POST" class="search-form">
         <input type="text" name="search_box" class="box" maxlength="100" placeholder="search for blogs" required>
         <button type="submit" style="background: var(--main-color); color: white; padding: 0.8rem 1.5rem; border-radius: 0.5rem; cursor: pointer; border: none;" name="search_btn">Search</button>
      </form>

      <div class="icons">
         <div id="menu-btn" style="cursor: pointer; font-size: 2rem;">☰</div>
         <div id="search-btn" style="cursor: pointer; font-size: 2rem;">🔍</div>
         <div id="user-btn" style="cursor: pointer; font-size: 2rem;">👤</div>
      </div>

      <nav class="navbar">
         <a href="index.php?route=home"> > home</a>
         <a href="index.php?route=posts"> > posts</a>
         <a href="index.php?route=categories"> > category</a>
         <a href="index.php?route=authors"> > authors</a>
         <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''){ ?>
         <a href="index.php?route=create_post"> > create post</a>
         <?php } else { ?>
         <a href="index.php?route=login"> > login</a>
         <a href="index.php?route=register"> > register</a>
         <?php } ?>
      </nav>

      <div class="profile">
         <?php
            global $conn;
            $user_id = $_SESSION['user_id'] ?? '';
            if($user_id != '' && isset($conn) && $conn){
               $stmt = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $stmt->bind_param("i", $user_id);
               $stmt->execute();
               $result = $stmt->get_result();
               if($result->num_rows > 0){
                  $header_profile = $result->fetch_assoc();
         ?>
         <p class="name"><?= $header_profile['name']; ?></p>
         <a href="index.php?route=update" class="btn">update profile</a>
         <a href="index.php?route=logout" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
               }else{
         ?>
            <p class="name">please login first!</p>
            <a href="index.php?route=login" class="option-btn">login</a>
         <?php
               }
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="index.php?route=login" class="option-btn">login</a>
         <?php
            }
         ?>
      </div>

   </section>

</header>
