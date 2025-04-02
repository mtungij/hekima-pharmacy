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
<h2>Stock Limit</h2>
</div>
<div class="body">
   <?php if (count($stock) == 0) {
         ?>
        <?php echo form_open_multipart("admin/create_stock_limit"); ?>
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
        <span>Stock limit </span>
            <input type="number" autocomplete="off" required name="stock" class="form-control" placeholder="Stock limit">
            <?php echo form_error("stock"); ?>
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
        <button type="submit" class="btn btn-primary">Add</button>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
      </div>
    </div>
</div>
<?php form_close(); ?>
       <?php }else{ ?>
       <?php echo form_open_multipart("admin/create_stock_limit"); ?>
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
        <span>Stock limit</b> </span>
            <input type="number" autocomplete="off" autocomplete="off"  readonly name="stock" class="form-control" placeholder="<?php echo $stock_data->stock; ?>">
            <?php echo form_error("stock"); ?>
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
        <a href="<?php echo base_url("admin/edit_stock_limit/{$stock_data->id}") ?>" class="btn btn-primary">Add</a>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
      </div>
    </div>
</div>
<?php form_close(); ?>
        <?php } ?>

</div>

</div>
</div>
</div>




</div>
</div>

</div>


<?php include 'incs/footer.php'; ?>

