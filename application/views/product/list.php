<?php if(($_SESSION['is_logged_in'] != TRUE) OR ($_SESSION['role'] != "Admin")) { redirect(base_url());}?>
<div class="page-header">
<h1>
      <i class="fas fa-cubes"></i></span> <?PHP echo anchor("product","รายการสินค้า");?> 
      <small> Product 
      <a class="btn btn-primary" href="<?php echo base_url()."index.php/product/add_form"?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> ใหม่</a>
           <!-- <a class="btn btn-primary" href="#new" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i> ใหม่</a>
-->
      </small>
   </h1>
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
<div class="modal fade" id="edit_<?php echo $item->product_id;?>" tabindex="-1" role="dialog" aria-labelledby="edit_<?php echo $item->product_id;?>" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="edit_<?php echo $item->product_id;?>">แก้ไขประเภทสินค้า</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

    <?php 
      $attributes = array('role' => 'form');
      echo form_open('product/edit/'.$item->product_id,$attributes);
    ?>
      <div class="row">
            
      <div class="col-lg-5">
          <div class="form-group">
              <label for="product_name">ชื่อสินค้า</label>
              <input type="text" class="form-control" name="product_name" maxlength="150" value="<?php echo $item->product_name;?>">
          </div>
       </div>   
      <?php
              echo "<div class='col-lg-4'>";
              echo "<div class='form-group'>";
              echo form_label('ประเภทสินค้า','product_cat_list' )." : ";
              echo form_dropdown('product_cat_list', $product_cat_options, $item->product_cat_id, 'class="form-control"')." ";
              echo "</div>"; 
              echo "</div>"; 
      ?>
          <div class="col-lg-2">
              <div class="form-group">
              <label for="product_price_by_unit">ราคาต่อหน่วย</label>
              <input type="text" class="form-control" name="product_price_by_unit" maxlength="4" value="<?php echo $item->product_price_by_unit;?>">
              </div>
          </div>
 

      </div> <!-- Row -->
    

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
  <div class="modal fade" id="del_<?php echo $item->product_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h2 class="modal-title" id="myModalLabel">ลบ <small> Delete </small></h2>
                    </div>
                    <div class="modal-body">
                       <?php
                          $attributes = array('role' => 'form');
                          echo form_open('product/delete/'.$item->product_id,$attributes);
                        ?>
                        <div class="row">
                            <h4 class="text-center">ต้องการที่จะลบข้อมูลรายการ
                             <br>ชื่อ :<?php echo $item->product_name." ";?> ใช่หรือไม่</h4>
            
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
case "photo":
  $filename = "images/product/".$item->product_id.".jpg";
  if (file_exists($filename)) {
      echo "<a href='#Modal_photo".$no."' data-toggle='modal' data-target='#Modal_photo".$no."'><img src='".base_url()."/".$filename."' width='80' height='80' class='img-thumbnail'></a>";
  } else {
      echo "<a href='".base_url()."index.php/product/upload/".$item->product_id."'><i class='far fa-image fa-3x'></i></a>";
     // echo "<i class='fa fa-picture-o fa-3x' aria-hidden='true'></i>";
  }   
break;
case "action":
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#edit_".$item->product_id."'>แก้ไข
  </button> "; 
echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#del_".$item->product_id."'>ลบ
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