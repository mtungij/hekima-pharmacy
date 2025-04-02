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
<h2>Edit Use Today</h2>
</div>
<div class="body">
  
        <?php echo form_open_multipart("seller/modify_cashflow/{$cash->id}"); ?>
<div class="row clearfix">
       <div class="col-sm-3">
       <!--  <div class="form-group">
           <span>Full name</span>
            <input type="text" autocomplete="off" required name="full_name" class="form-control" placeholder="Full name">
            <?php //echo form_error("full_name"); ?>
        </div> -->
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Amount</span>
            <input type="number" autocomplete="off" value="<?php echo $cash->price; ?>" required name="price" class="form-control" placeholder="Amount">
            <?php echo form_error("price"); ?>
        </div>

        <div class="form-group">
        <span>Description</span>
            <textarea type="text" rows="6" autocomplete="off" required name="description" class="form-control" placeholder="description"><?php echo $cash->description; ?></textarea>
            <?php echo form_error("description"); ?>
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
        <button type="submit" class="btn btn-primary">Update</button>
     <a href="<?php echo base_url("seller/cash_flow"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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

