<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url();?>">
      <img src="<?php echo base_url()."images/logo2.jpg";?>" width="30" height="30" class="d-inline-block align-top" alt="">
      ASO
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php $attributes = array('class' => 'nav-link');?>  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">หน้าแรก <span class="sr-only">(current)</span></a> <!--Everyone Menu -->
      </li>
<?php
switch ($_SESSION['role'] == "Admin") {
  case "Admin"://------------------------- Admin Menu --------------------------------------//
?>      
      <li class="nav-item">
        <?php echo anchor("member","สมาชิก",$attributes);?> <!--Admin Menu -->
      </li>
      <li class="nav-item dropdown">  <!--Admin Menu -->
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          สินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url()."index.php/product";?>">รายการสินค้า</a>  <!--Admin Menu -->
          <a class="dropdown-item" href="<?php echo base_url()."index.php/product/cat";?>">ประเภทสินค้า</a>  <!--Admin Menu -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url()."index.php/order";?>">คำสั่งซื้อ</a>  <!--Admin Menu -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url()."index.php/stock";?>">คลังสินค้า</a> 
        </div>
      </li>

      <li class="nav-item dropdown">  <!--Admin Menu -->
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          รายงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">ยอดสั่งซื้อ</a>
          <a class="dropdown-item" href="#">สินค้าขายดี</a>
          <a class="dropdown-item" href="#">ตัวแทน</a>
        </div>
      </li>
<?php
  break;
  default:
}
?>      
      <li class="nav-item">  <!--Member Menu -->
        <?php echo anchor("member/info","ข้อมูลของฉัน",$attributes);?> <!--Admin Menu -->
      </li>
      <li class="nav-item"> <!--Everyone Menu -->
        <?php echo anchor("login/logout","ออกจากระบบ",$attributes);?>
      </li>

    </ul>
    <!--Search Menu 
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
  </div>
  </nav>
</div>

<br>
<div class="container">
