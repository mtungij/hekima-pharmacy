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
<h2>Edit form / <?php echo $request->name; ?> </h2>
<div class="pull-right">
    <a href="<?php echo base_url("admin/view_supplier_order/{$supplier_detail->order_id}") ?>" class="btn btn-primary btn-sm">Back</a>
</div>
</div>

<div class="body">
  
        <?php echo form_open_multipart("admin/modify_order/{$request->req_id}"); ?>
<div class="row clearfix">
    <div class="col-sm-4">
         <span>Pack size/Unit</span>
        <input type="text" name="pack_size" class="form-control" value="<?php echo $request->pack_size; ?>" placeholder="Enter Pack size">
    </div>
       <div class="col-sm-4">
        <div class="form-group">
           <span>Quantity</span>
             <input type="number" name="quantity_pack" value="<?php echo $request->quantity_pack; ?>" class="form-control" placeholder="Quantity">
        </div>
    </div>
    <div class="col-sm-4">
          <div class="form-group">
           <span>Buy price</span>
             <input type="number" name="buy_price_pack" value="<?php echo $request->buy_price_pack; ?>" class="form-control" placeholder="Buy price">
        </div>
     </div>
     <div class="col-sm-4">
          <div class="form-group">
           <span>Container</span>
             <input type="number" name="" value="" id="cont1"  class="form-control" placeholder="Container">
        </div>
     </div> 
      <div class="col-sm-4">
          <div class="form-group">
           <span>Pc</span>
             <input type="number" name="" value="" id="cont2" class="form-control" placeholder="pc">
        </div>
     </div> 
      <div class="col-sm-4">
          <div class="form-group">
           <span>Total</span>
             <input type="number" name="total"  id="total_cont" class="form-control" readonly placeholder="Total">
        </div>
     </div>
        
   
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
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
<script src="<?php //echo base_url('assets/admin/js/select2.min.js'); ?>"></script>


<script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>


