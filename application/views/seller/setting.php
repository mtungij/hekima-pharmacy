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
<h2>Parsonal Information</h2>
</div>
   <div class="col-md-4">
<a href="<?php echo base_url("seller/profile_pc"); ?>" class="btn btn-info btn-sm"><i class=""></i>Profile picture</a>
</div>
   <div class="col-md-4">
    <div class="pull-right">
   <a href="<?php echo base_url("seller/change_password"); ?>" class="btn btn-info btn-sm"><i class="icon-key">Change password</i></a>
   </div>
</div>
</div>
</div>
<div class="body">
<?php echo form_open_multipart("seller/modify_mydata/{$my->user_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Full name</span>
            <input type="text" autocomplete="off" value="<?php echo $my->full_name; ?>" required name="full_name" class="form-control" placeholder="Full name">
            <?php echo form_error("full_name"); ?>
        </div>
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Phone number</span>
            <input type="number" autocomplete="off" value="<?php echo $my->phone_number; ?>" required name="phone_number" class="form-control" placeholder="Phone number">
            <?php echo form_error("phone_number"); ?>
        </div>
    </div>
        <div class="col-sm-3">
     <!--  <div class="form-group">
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
     <a href="<?php echo base_url("seller/index"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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

