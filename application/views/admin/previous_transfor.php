<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>


<div id="main-content">
<div class="container-fluid">
<br>
<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-success">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>

<?php if ($das = $this->session->flashdata('error')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-danger">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
    <?php echo form_open(""); ?>
  <div class="row">
   
  <div class="col-lg-3">
      <h2>Previous Transfor Record</h2>
 </div>
 
  <div class="col-lg-3">
    From:
      <input type="date" name="from" class="form-control" required>
 </div>
  <div class="col-lg-3">
    To:
      <input type="date" name="to" class="form-control" required>
 </div>
 <div class="col-lg-3">
   <br>
     <button type="submit" class="btn btn-primary">Get Data</button>
     <?php if (count($data) == 0) {
     ?>
 <?php  }else{ ?>
     <a href="<?php echo base_url("admin/print_previous_trans/{$from}/{$to}"); ?>" class="btn btn-primary" target="_blank"><i class="icon-printer">Print</i></a>
    <?php  }  ?>
     <a href="<?php echo base_url("admin/dispency_product"); ?>" class="btn btn-info"><i class="icon-arrow-left">Back</i></a>    
 </div>
      <?php echo form_close(); ?>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Seller</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Seller</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($data as $transs): ?>
            <tr>
           
            <td><?php echo $transs->full_name; ?></td>
            <td><?php echo $transs->name; ?></td>
            <td>
             <?php echo $transs->trans_qnty; ?>
            <td>
             <?php echo $transs->trans_date; ?>
            </t>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>


</div>
</div>

</div>


<?php include 'incs/footer.php'; ?>

<script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>


    <script>
$(document).ready(function(){
$('#product').change(function(){
var product_id = $('#product').val();
//alert(product_id)
if(product_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{product_id:product_id},
success:function(data)
{
$('#stoo').html(data);
$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#stoo').html('<option value="">Select customer</option>');
$('#district').html('<option value="">All</option>');
}
});



// $('#region').change(function(){
// var region_id = $('#region').val();
// if(region_id != '')
// {
// $.ajax({
// url:"<?php //echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{region_id:region_id},
// success:function(data)
// {
// $('#district').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#district').html('<option value="">All</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>

