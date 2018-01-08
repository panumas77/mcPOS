
<div class="row justify-content-center">
<h1 class="text-center">เข้าสู่ระบบ / Login</h1>
</div>

<div class="row justify-content-center">

  <form class="col-12 col-lg-5" id="needs-validation"  method="post" action="<?php echo base_url()."index.php/login/validate_credentials";?>">
  
    <div class="form-group">
      <label for="username">อีเมล์ / เบอร์มือถือ</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="ใส่ email หรือ เบอร์มือถือ" value="<?php echo set_value('username');?>">
      <small id="emailHelp" class="form-text text-muted">ใช้เบอร์อีเมล์ หรือ เบอร์มือถือของท่านที่เคยลงทะเบียนไว้</small>
      <?php echo form_error('username', '<div class="text-danger">', '</div>');?>
    </div>
    <div class="form-group">
    <label for="password">พาสเวิร์ด</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <?php echo form_error('password', '<div class="text-danger">', '</div>');?>
    </div>
    <p><a href="#" aria-pressed="true">ลืมรหัสผ่าน</a></p>

    <button type="submit" class="btn btn-secondary col-12">เข้าสู่ระบบ</button>
 
    </form>

</div>
<!--
<div class="row justify-content-center">

  <div class="col-12 col-lg-5">
  <div class="text-center">Or</div>
      <button type="button" class="btn btn-primary col-12">เข้าสู่ระบด้วย Facebook</button>
  </div>
</div>

-->
