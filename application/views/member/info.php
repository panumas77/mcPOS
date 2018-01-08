<?php if($_SESSION['is_logged_in'] != TRUE) { redirect(base_url());}?>
<div class="page-header">
<h1>
      <i class="fas fa-user-circle"></i></span> สวัสดี <?php echo $_SESSION['full_name']; ?>
      <small><?php echo $_SESSION['role'];?></small>
   </h1>
</div>