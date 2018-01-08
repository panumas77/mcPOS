<div class="row justify-content-center">
<h1 class="text-center">เพิ่มสินค้าใหม่</h1>
</div>

<div class="row justify-content-center">
  <form class="container col-12 col-lg-4" method="post" action="<?php echo base_url()."index.php/product/add";?>">

    <div class="form-group">
        <label for="product_name">ชื่อสินค้า</label>
        <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo set_value('product_name');?>" placeholder="ชื่อสินค้า เช่น ยาแก้ไอน้ำดำตราเสือ">
        <?php echo form_error('product_name', '<div class="text-danger">', '</div>');?>

        <?php
           
            echo "<div class='form-group'>";
            echo form_label('ประเภทสินค้า','product_cat_list' )." : ";
            echo form_dropdown('product_cat_list', $product_cat_options, '', 'class="form-control"')." ";
            echo form_error('product_cat_list', '<div class="text-danger">', '</div>');
            echo "</div>"; 
            
        ?>
       
            <div class="form-group">
            <label for="product_price_by_unit">ราคาต่อหน่วย</label>
            <input type="text" class="form-control" name="product_price_by_unit" maxlength="150" placeholder="10, 55.25">
            <?php echo form_error('product_price_by_unit', '<div class="text-danger">', '</div>');?>
            
        </div>
    </div>


  <button class="btn btn-primary col-12" type="submit">เพิ่มสินค้าใหม่</button>

  </form>
</div>

