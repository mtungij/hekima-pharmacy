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
<h2>Add Or Remove product</h2>
</div>
<div class="body">
  
        <?php echo form_open_multipart("admin/modify_quantity/{$data->store_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-4">
        <div class="form-group">
           <span>Container</span>
            <input type="number" autocomplete="off" id="cont1" name="" class="form-control" placeholder="Container">
            <?php //echo form_error("full_name"); ?>
        </div>
    </div>
       <div class="col-sm-4">
        <div class="form-group">
           <label></label>
            <input type="number" autocomplete="off" id="cont2" name="" class="form-control" placeholder="">
            <?php //echo form_error("full_name"); ?>
        </div>
    </div>
       <div class="col-sm-4">
      <div class="form-group">
        <span>Quantity (<b><?php echo $data->name; ?> : <?php echo $data->balance; ?>)</b> </span>
            <input type="number" autocomplete="off" id="total_cont" required name="balance" class="form-control" placeholder="Quantity">
            <?php echo form_error("balance"); ?>
        </div>
    </div>
        <div class="col-sm-3">
    <!--   <div class="form-group">
        <span>Privillage</span>
        <select type="text" class="form-control" required name="role">
          <option value="">Select privillage</option>
          <option>admin</option>
          <option>seller</option>
        </select>
        <?php //echo form_error("role"); ?>
        </div> -->
    </div>
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Add/Remove</button>
     <a href="<?php echo base_url("admin/all_productStore"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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

<script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>

