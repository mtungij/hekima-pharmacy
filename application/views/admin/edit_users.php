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
<h2>Edit Users</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_admin/{$admin->user_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-4">
        <div class="form-group">
           <span>Full name</span>
            <input type="text" autocomplete="off" required name="full_name" class="form-control" value="<?php echo $admin->full_name; ?>" placeholder="Full name">
            <?php echo form_error("full_name"); ?>
        </div>
    </div>
       <div class="col-sm-4">
      <div class="form-group">
        <span>Phone number</span>
            <input type="number" autocomplete="off" value="<?php echo $admin->phone_number; ?>" required name="phone_number" class="form-control" placeholder="phone number">
            <?php echo form_error("phone_number"); ?>
        </div>
    </div>
        <div class="col-sm-4">
      <div class="form-group">
        <span>Privillage</span>
        <select type="text" class="form-control" required name="role">
          <option value="<?php echo $admin->role; ?>"><?php echo $admin->role; ?></option>
          <option>admin</option>
          <option>seller</option>
          <option>cashier</option>
        </select>
        <?php echo form_error("role"); ?>
        </div>
    </div>
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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

