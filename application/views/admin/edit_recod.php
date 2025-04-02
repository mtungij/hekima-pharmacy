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
<h2>Edit Record Service</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_receive_recod/{$receive_recod->receive_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Customer name</span>
            <select type="number" class="form-control kt-selectpicker" name="customer_id" data-live-search="true" required>
                 <option value="<?php echo $receive_recod->customer_id; ?>"><?php echo $receive_recod->customer_name; ?></option>
                 <?php foreach ($customer as $customers): ?>
                 <option value="<?php echo $customers->customer_id; ?>"><?php echo $customers->customer_name; ?></option>
                  <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="col-sm-6">
        <div class="form-group">
           <span>Service</span>
            <select type="number" class="form-control kt-selectpicker" name="huduma_id" data-live-search="true" required>
                 <option value="<?php echo $receive_recod->huduma_id; ?>"><?php echo $receive_recod->huduma_name; ?> <?php echo $receive_recod->huduma_price; ?>/=</option>
                 <?php foreach ($service as $services): ?>
                 <option value="<?php echo $services->huduma_id; ?>"><?php echo $services->huduma_name; ?> -  <?php echo $services->huduma_price; ?>/=</option>
                  <?php endforeach; ?>
            </select>
        </div>
    </div>  
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="<?php echo base_url("admin/recod_service"); ?>" class="btn btn-info">Back</a>
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

