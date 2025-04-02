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
<h2>Edit Service</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_huduma/{$huduma->huduma_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Service name</span>
            <input type="text" autocomplete="off" required name="huduma_name" value="<?php echo $huduma->huduma_name; ?>" class="form-control" placeholder="service name">
            <?php echo form_error("huduma_name"); ?>
        </div>
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Service Price</span>
            <input type="number" autocomplete="off" value="<?php echo $huduma->huduma_price; ?>" required name="huduma_price" class="form-control" placeholder="Service price">
            <?php echo form_error("huduma_price"); ?>
        </div>
    </div>
   
      
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="<?php echo base_url("admin/service"); ?>" class="btn btn-info btn-sm">Back</a>
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

