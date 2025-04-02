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
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Edit Form</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_supplier/{$data_supplier->id}"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Supplier Name</span>
            <input type="text" autocomplete="off" required name="supplier_name" value="<?php echo $data_supplier->supplier_name; ?>" class="form-control" placeholder="Supplier name">
            <?php echo form_error("supplier_name"); ?>
        </div>
    </div>
    <?php $date = date("Y-m-d"); ?>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Supplier Phone Number</span>
            <input type="number" autocomplete="off" required name="supplier_phone" value="<?php echo $data_supplier->supplier_phone; ?>" class="form-control" placeholder="Supplier Phone Number">
            <?php echo form_error("supplier_phone"); ?>
        </div>
    </div>
   
      
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
      </div>
    </div>
</div>
<?php form_close(); ?>
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

