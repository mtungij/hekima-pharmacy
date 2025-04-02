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
<div class="col-lg-12">
<div class="card">
<div class="header">
    <div class="row">
        <div class="col-lg-6">
            <?php $date = date("Y-m-d"); ?>
      <h2>product frequency movement / <?php echo $date;  ?> </b> </h2>
      </div>
      <div class="col-lg-6">
          <div class="pull-right">

             <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-sm btn-primary"><i class="icon-magnifier"></i></a>
          </div>
          
      </div>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover j-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>S/no.</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Retail price</th>
                    <th>wholesale price</th>
                    <th>Date</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $no = 1; ?>
              <?php foreach ($trending_product as $transs): ?>
            <tr>
              <td><?php echo $no++; ?>.</td>
            <td><?php echo $transs->name; ?></td>
            <td><?php echo $transs->total_qnty; ?></td>
            <td>
             <?php echo number_format($transs->price); ?>
            </td>

            <td>
            <?php echo number_format($transs->ju_price); ?>
            </td>
            <td>
             <?php echo $transs->sell_day; ?>
            </td>
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


</script>

<script>
    $('.select2').select2();
</script>



<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="title" id="defaultModalLabel">Filter</h6>
</div>
<?php echo form_open("admin/filter_product_tranding/"); ?>
<div class="modal-body">
<div class="row clearfix">
    <?php $date = date("Y-m-d"); ?>
    <div class="col-md-6 col-6">
      <span>From</span>
      <input type="date" class="form-control" value="<?php echo $date; ?>" name="from" required>
    </div>
    <div class="col-md-6 col-6">
      <span>To</span>
      <input type="date" class="form-control" value="<?php echo $date; ?>" name="to" required>
    </div>
    </div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Filter</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>

