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
  <div class="row">
    <div class="col-md-4">
<h2>Shop Information</h2>
</div>
   <div class="col-md-4">
</div>
   <div class="col-md-4">
    <div class="pull-right">
   <a href="<?php echo base_url("admin/setting"); ?>" class="btn btn-info btn-sm"><i class="icon-arrow-left"></i></a>
   </div>
</div>
</div>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_shop_info/{$shop_info->id}"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Shop Name</span>
            <input type="text" autocomplete="off" value="<?php echo $shop_info->shop_name; ?>" required name="shop_name" class="form-control" placeholder="Shop name">
            <?php echo form_error("shop_name"); ?>
        </div>
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>PO.Box</span>
            <input type="text" autocomplete="off" value="<?php echo $shop_info->po_box; ?>"  name="po_box" class="form-control" placeholder="po box">
            <?php echo form_error("po_box"); ?>
        </div>
    </div>
        <div class="col-sm-4">
     <div class="form-group">
        <span>Location</span>
            <input type="text" autocomplete="off" value="<?php echo $shop_info->location; ?>" required name="location" class="form-control" placeholder="Phone number">
            <?php echo form_error("location"); ?>
        </div>
    </div>

      <div class="col-sm-4">
     <div class="form-group">
        <span>Phone number</span>
            <input type="text" autocomplete="off" value="<?php echo $shop_info->phone; ?>" required name="phone" class="form-control" placeholder="Phone number">
            <?php echo form_error("phone"); ?>
        </div>
    </div>
    <div class="col-sm-4">
     <div class="form-group">
        <span>Email</span>
            <input type="email" autocomplete="off" value="<?php echo $shop_info->email; ?>" required name="email" class="form-control" placeholder="email">
            <?php echo form_error("phone"); ?>
        </div>
    </div>
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary">save</button>
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

</div>


<?php include 'incs/footer.php'; ?>

