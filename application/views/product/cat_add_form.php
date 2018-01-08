<div class="row justify-content-center">
<h1 class="text-center">เพิ่มประเภทสินค้าใหม่</h1>
</div>

<div class="row justify-content-center">
  <form class="container col-12 col-lg-4" method="post" action="<?php echo base_url()."index.php/product/cat_add";?>">

    <div class="form-group">
        <label for="product_cat_name">ชื่อประเภทสินค้าใหม่</label>
        <input type="text" class="form-control" name="product_cat_name" maxlength="150" value="<?php echo set_value('product_cat_name');?>" placeholder="ชื่อประเภทสินค้า เช่น ยาแก้ไอ">
        <?php echo form_error('product_cat_name', '<div class="text-danger">', '</div>');?>
            
    </div>


  <button class="btn btn-primary col-12" type="submit">เพิ่มประเภทสินค้าใหม่</button>

  </form>
</div>

