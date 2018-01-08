<?php

$query = $this->db->like('full_name',"%".$_POST["query"]."%")->get('account');

foreach ($query->result() as $row)
{
    $data[] = $row->full_name;
}
echo json_encode($data);


?>

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