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
<h2>Edit Product</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_product/{$productE->id}"); ?>
<div class="row clearfix">
       <div class="col-sm-3">
        <div class="form-group">
           <span>Product name</span>
            <input type="text" autocomplete="off" value="<?php echo $productE->name; ?>" required name="name" class="form-control" placeholder="product name">
            <?php echo form_error("name"); ?>
        </div>
    </div>
       <div class="col-sm-3">
      <div class="form-group">
        <span>Unit</span>
            <input type="text"  autocomplete="off" value="<?php echo $productE->unit; ?>" required name="unit" class="form-control" placeholder="unit">
            <?php echo form_error("unit"); ?>
        </div>
    </div>

      <div class="col-sm-3">
      <div class="form-group">
        <span>Brand</span>
            <input type="text"  autocomplete="off" value="<?php echo $productE->bland; ?>" required name="bland" class="form-control" placeholder="bland">
            <?php echo form_error("bland"); ?>
        </div>
    </div>

     
       <div class="col-sm-3">
      <div class="form-group">
        <span>Buy price</span>
            <input type="number" autocomplete="off" required name="buy_price" class="form-control" value="<?php echo $productE->buy_price; ?>" placeholder="buy price">
            <?php echo form_error("buy_price"); ?>
        </div>
       
    </div>
       <div class="col-sm-3">
      <div class="form-group">
        <span>Retail sale Price</span>
            <input type="number" autocomplete="off" value="<?php echo $productE->price; ?>" required name="price" class="form-control" placeholder="Retail sale Price">
            <?php echo form_error("price"); ?>
        </div>
    </div>
     <div class="col-sm-3">
      <div class="form-group">
        <span>Whole sale Price</span>
            <input type="number" autocomplete="off" value="<?php echo $productE->ju_price; ?>" required name="ju_price" class="form-control" placeholder="Whole sale Price">
            <?php //echo form_error("ju_price"); ?>
        </div>
    </div>
      <div class="col-sm-3">
      <div class="form-group">
        <span>Product Stock Limit *</span>
            <input type="number" autocomplete="off" value="<?php echo $productE->stock_limit; ?>" required name="stock_limit" class="form-control" placeholder="Whole sale Price">
            <?php //echo form_error("ju_price"); ?>
        </div>
    </div> 
     <div class="col-sm-3">
      <div class="form-group">
        <span>Expire Date *</span>
            <input type="date" autocomplete="off" value="<?php echo $productE->exp_date; ?>" required name="exp_date" class="form-control" placeholder="">
            <?php //echo form_error("ju_price"); ?>
        </div>
    </div> 
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
  <a href="<?php echo base_url("admin/all_product"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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

