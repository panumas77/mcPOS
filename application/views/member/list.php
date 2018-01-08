<?php if(($_SESSION['is_logged_in'] != TRUE) OR ($_SESSION['role'] != "Admin")) { redirect(base_url());}?>
<div class="page-header">
  <h1>
        <i class="fas fa-users"></i></span> <?PHP echo anchor("member/","สมาชิก");?> 
        <small> Membership
             <a class="btn btn-primary" href="<?php echo base_url()."index.php/signup"?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
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

<!-- Modal Edit-->
<div class="modal fade" id="edit_<?php echo $item->account_id;?>" tabindex="-1" role="dialog" aria-labelledby="edit_<?php echo $item->account_id;?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_<?php echo $item->account_id;?>">คำสั่งแก้ไข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php 
        $attributes = array('role' => 'form');
        echo form_open('member/edit/'.$item->account_id,$attributes);
      ?>
    <div class="row">       
        <div class="col-lg-12">
            <div class="form-group col-lg-12">
                <label for="full_name">ชื่อ-สกุล</label>
                <input type="text" class="form-control" id="full_name" name="full_name" maxlength="150" value="<?php echo $item->full_name;?>">
            </div>
        </div> 

        <div class="col-lg-12">
            <div class="form-group col-lg-12">
                <label for="line_id">Line ID</label>
                <input type="text" class="form-control" id="line_id" name="line_id" maxlength="30" value="<?php echo $item->line_id;?>">
            </div>
        </div> 

        <div class="col-lg-12">
            <div class="form-group col-lg-12">
                <label for="facebook_link">Facebook Link</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link" maxlength="150" value="<?php echo $item->facebook_link;?>">
            </div>
        </div> 

        <div class="col-lg-12">
            <div class="form-group col-lg-12">
                <label for="class">ระดับ</label>
                <input type="text" class="form-control" id="class" name="class" maxlength="2" value="<?php echo $item->class;?>">
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

<!-- Modal Delete-->
<div class="modal fade" id="del_<?php echo $item->account_id;?>" tabindex="-1" role="dialog" aria-labelledby="del_<?php echo $item->account_id;?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="del_<?php echo $item->account_id;?>">คำสั่งลบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php $attributes = array('role' => 'form');
        echo form_open('member/delete/'.$item->account_id,$attributes);
        ?>
            <div class="row justify-content-center">
            <h5 class="text-center">ต้องการที่จะลบข้อมูลสมาชิก
            <br>ชื่อ :<?php echo $item->first_name." ";?> ใช่หรือไม่</h5>
            </div> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
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
  echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#edit_".$item->account_id."'>แก้ไข
	</button> "; 
  echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#del_".$item->account_id."'>ลบ
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

