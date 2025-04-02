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
    <div class="col-md-6">
<h2>profile picture</h2>
</div>
   <div class="col-md-6">
    <div class="pull-right">
   <a href="<?php echo base_url("admin/setting"); ?>" class="btn btn-info btn-sm"><i class="icon-arrow-left"></i></a>
   </div>
</div>
</div>
</div>
<div class="body">
<?php echo form_open_multipart("admin/modify_profilepc/{$my->user_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-4">
        <?php if ($my->img == TRUE) {
         ?>
        <img src="<?php echo base_url().'assets/admin/img/'.$my->img; ?>" class="rounded-circle user-photo" style="width:200px; height:200px">
      <?php }elseif ($my->img == FALSE) {
       ?>
    <img src="<?php echo base_url() ?>assets/admin/img/wateja.png" class="rounded-circle user-photo" style="width:180px; height:180px">
       <?php } ?>
    </div>
       <div class="col-sm-6">
        <br><br>
      <div class="form-group">
        <span>profile picture</span>
            <input type="file" autocomplete="off" required name="img" class="form-control" placeholder="Phone number">
            <?php echo form_error("img"); ?>
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
    <!--  <a href="<?php //echo base_url("admin/index"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a> -->
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

