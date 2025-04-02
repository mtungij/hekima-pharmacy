<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/select2.min.css">
<script src="<?php echo base_url('assets/admin/js/jquery.js'); ?>"></script>


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
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Add order</h2>
<div class="pull-right">
    <a href="<?php echo base_url("admin/view_supplier_order/{$supplier_detail->order_id}") ?>" class="btn btn-primary btn-sm">Back</a>
</div>
</div>

<div class="body">
  
        <?php echo form_open_multipart("admin/create_add_order/{$supplier_detail->order_id}"); ?>
<div class="row clearfix">
    <div class="col-sm-2"></div>
       <div class="col-sm-6">
        <div class="form-group">
           <span>Select Product Name</span>
           <select type="number" class="form-control select2" name="product_id" id="product">
               <option value="">Select Product</option>
               <?php foreach ($purchase as $store_products): ?>
               <option value="<?php echo $store_products->id; ?>"><?php echo $store_products->name; ?> - <?php echo $store_products->bland; ?></option>
                <?php endforeach; ?>
           </select>
        </div>
    </div>
  <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id; ?>">
  <?php $date = date("Y-m-d"); ?>
  <input type="hidden" name="date" value="<?php echo $date; ?>">
     <div class="col-sm-2"></div> 
   
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Add</button>
    <!--  <a href="<?php //echo base_url("admin/all_productStore"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a> -->
      </div>
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
<script src="<?php echo base_url('assets/admin/js/select2.min.js'); ?>"></script>


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
$('#stoo').html('<option value="">Select product</option>');
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

<script>
    $('.select2').select2();
</script>

