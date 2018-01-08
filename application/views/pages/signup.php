<div class="row justify-content-center">
<h1 class="text-center">การลงทะเบียน / Registration</h1>
</div>

<div class="row justify-content-center">
  <form class="container col-12 col-lg-4" method="post" action="<?php echo base_url()."index.php/signup/create_account";?>">

    <div class="form-group">
      <label for="full_name">ชื่อ นามสกุล</label>
      <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo set_value('full_name');?>" placeholder="ชื่อ นามสกุล">
      <?php echo form_error('full_name', '<div class="text-danger">', '</div>');?>

      <label for="username">อีเมล์ หรือ เบอร์มือถือ</label>
      <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username');?>" placeholder="อีเมล์ หรือ เบอร์มือถือ">
      <?php echo form_error('username', '<div class="text-danger">', '</div>');?>
    
      <label for="password">พาสเวิร์ด</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="พาสเวิร์ด">
      <?php echo form_error('password', '<div class="text-danger">', '</div>');?> 
      
      <label for="under_id">ชื่อสมาชิกที่สมัครผ่าน</label>
      <input type="text" class="form-control" name="under_id" id="under_id" autocomplete="off" value="<?php echo set_value('under_id');?>" placeholder="ชื่อสมาชิกที่สมัครผ่าน">

      <label for="line_id">Line ID</label>
      <input type="text" class="form-control" name="line_id" id="line_id" value="<?php echo set_value('line_id');?>" placeholder="Line ID">

      <label for="facebook_link">Facebook</label>
      <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="<?php echo set_value('facebook_link');?>" placeholder="Facebook">
    </div>


  <button class="btn btn-primary col-12" type="submit">ส่งข้อมูลลงทะเบียน</button>

  </form>
</div>
<script type="text/javascript">
$(document).type(function() {  
  $('#under_id').typeshead({
        source: function(query, result)
        {
          $.ajax({
            url:"<?php echo base_url()."index.php/signup/fetch";?>",
            method:"POST",
            data:{query:query},
            dataType:"json",
            success:function(data)
            {
              result($.map(data,function(item){
                return item;
              }));
            }
        })  
      }
  });
});
</script>  

