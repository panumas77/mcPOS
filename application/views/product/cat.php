<?php if(($_SESSION['is_logged_in'] != TRUE) OR ($_SESSION['role'] != "Admin")) { redirect(base_url());}?>
<div class="page-header">
<h1>
      <i class="fas fa-cube"></i></span> <?PHP echo anchor("product/cat/","ประเภทสินค้า");?> 
      <small> Category
      <a class="btn btn-primary" href="<?php echo base_url()."index.php/product/cat_add_form"?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> ใหม่</a>
      <!-- <a class="btn btn-primary" href="#new" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i> ใหม่</a> -->
       </small>
   </h1>
</div>

<!-- Modal New-->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="new">เพิ่มประเภทสินค้าใหม่</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <?php 
          $attributes = array('role' => 'form');
          echo form_open('product/cat_add/',$attributes);
        ?>
            <div class="row">
              
          <div class="col-lg-7">
              <div class="form-group col-lg-12">
                <label for="product_cat_name">ชื่อประเภทสินค้า</label>
                <input type="text" class="form-control" name="product_cat_name" maxlength="150" placeholder="ชื่อประเภทสินค้า เช่น ยาแก้ไอ">
              </div>
          </div>            
     
      </div> 

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      <button type="submit" class="btn btn-primary">เพิ่ม</button>
    </div>
    <?php echo form_close();?>  
  </div>
</div>
</div>


<!--//ตารางแสดงข้อมูล -//--> 
<table class="table table-responsive-md" id="dataTable">
<thead>
 <tr>
  <?php foreach($fields as $field_name => $field_display) { ?>
  <th> 
   <?php echo  $field_display; ?>
  </th>
  <?php } ?>
 </tr>
</thead>
<tbody>
 <?php 
$no=$this->uri->segment(5)+1;
foreach($rs as $item) { ?>
 <tr>

<!-- Modal edit-->
<div class="modal fade" id="edit_<?php echo $item->product_cat_id;?>" tabindex="-1" role="dialog" aria-labelledby="edit_<?php echo $item->product_cat_id;?>" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="edit_<?php echo $item->product_cat_id;?>">แก้ไขประเภทสินค้า</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

    <?php 
      $attributes = array('role' => 'form');
      echo form_open('product/cat_edit/'.$item->product_cat_id,$attributes);
    ?>
      <div class="row">
         <div class="col-lg-7">
        <div class="form-group col-lg-12">
            <label for="product_cat_name">ชื่อประเภทสินค้า</label>
            <input type="text" class="form-control" name="product_cat_name" maxlength="150" value="<?php echo $item->product_cat_name;?>">
        </div>
      </div> 
     
      </div>  
    

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
    <?php echo form_close();?>  
  </div>
</div>
</div>


<!-- Modal Action Delete -->
  <div class="modal fade" id="del_<?php echo $item->product_cat_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h2 class="modal-title" id="myModalLabel">ลบ <small> Delete </small></h2>
            </div>
            <div class="modal-body">
                       <?php
                          $attributes = array('role' => 'form');
                          echo form_open('cat/delete/'.$item->product_cat_id,$attributes);
                        ?>
                        <div class="row">
                            <h4 class="text-center">ต้องการที่จะลบข้อมูลรายการ
                             <br>ชื่อ :<?php echo $item->product_cat_name." ";?> ใช่หรือไม่</h4>
            
                      </div> 
                      </div>  <!--  #modal-body -->   
                      <div class="modal-footer">
                        <input type="submit" name="btnSave" class="btn btn-primary" value="ใช่">
                        <a class="btn btn-default" data-dismiss = "modal">ยกเลิก</a>
                      </div>
                      <?php echo form_close();?>  
            </div>
        </div>
</div>
      
<!-- Modal Action Delete -->  

 <?php foreach($fields as $field_name => $field_display) { ?>
  <td>    
   <?php 

switch ($field_name) {
case "#":
echo $no;   
$no++;
break;
case "action":
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#edit_".$item->product_cat_id."'>แก้ไข
</button> "; 
echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#del_".$item->product_cat_id."'>ลบ
</button> ";  
break;
default:
echo $item->$field_name;
}

   ?>
  </td>
  <?php } ?>
 </tr>
 <?php } ?>
</tbody>
 
</div>
</table>


<!--// end ตารางแสดงข้อมูล -//-->