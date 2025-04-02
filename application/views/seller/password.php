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
                        <div class="col-sm-6">
                    <h2>Change password</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">
                       <!--  <a href="<?php //echo base_url("admin/admin_profile") ?>" class="btn btn-primary"><i class="icon-arrow-left"></i></a> -->
                        </div>
                    </div>
                   
                    </div>
                </div>
                <div class="body">
              <?php echo form_open_multipart("seller/change_password"); ?>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <span>Old Password</span>
                                <input type="password" value="<?php echo set_value('oldpass') ?>" autocomplete="off"  name="oldpass" required class="form-control" placeholder="******">
                                <?php echo form_error("oldpass"); ?>
                            </div>
                            
                        </div>

                          <div class="col-sm-4">
                            <div class="form-group">
                                <span>New-password</span>
                                <input type="password" autocomplete="off"  name="newpass" value="<?php echo set_value('newpass') ?>" required class="form-control" placeholder="******">
                                <?php echo form_error("newpass"); ?>
                            </div>
                            
                        </div>
                         <div class="col-sm-4">
                            <div class="form-group">
                                <span>Confirm password</span>
                                <input type="password" autocomplete="off"  name="passconf" value="<?php echo set_value('passconf') ?>" required class="form-control" placeholder="******">
                                <?php echo form_error("passconf"); ?>
                            </div>
                            
                        </div>
                      
                    </div>
                    <div class="row clearfix">                    
                        <div class="col-sm-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change password</button>
                          <a href="<?php echo base_url("seller/setting"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
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
