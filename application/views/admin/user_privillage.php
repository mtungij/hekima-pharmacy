<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/select2.min.css">
<script src="<?php //echo base_url('assets/admin/js/jquery.js'); ?>"></script>


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

<?php if ($das = $this->session->flashdata('error')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-danger">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>



     <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Privillage List</h2>
                        </div>
                        <div class="body">
                            <?php echo form_open("admin/create_privillage/{$user_id}"); ?>
                                <div class="form-group">
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="privillage[]" value="seller">
                                        <span>SELLER</span>
                                    </label>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="privillage[]" value="product">
                                        <span>MANAGE PRODUCT</span>
                                    </label>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="privillage[]" value="store">
                                        <span>MANAGE STORE</span>
                                    </label>
                                </div>
                               
                              
                                <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url("admin/users") ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Privillage (<?php echo $cutomer->full_name; ?>)</h2>
                        </div>
                        <div class="body">
                            <form id="advanced-form" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <?php if ($priv): ?>
                                    <?php foreach ($priv as $privs): ?>
                                    <label class="control-inline fancy-checkbox">
                                        <input type="checkbox" name="checkbox2" checked>
                                        <span>
                                        <?php if ($privs->privillage == 'seller') {
                                             ?>
                                          <a href="<?php echo base_url("admin/remove_privillage/{$privs->id}") ?>"  onclick="return confirm('Are you sure?')"> SELLER </a> 
                                         <?php }elseif ($privs->privillage == 'store') {
                                          ?>
                                         <a href="<?php echo base_url("admin/remove_privillage/{$privs->id}") ?>"  onclick="return confirm('Are you sure?')"> MANAGE STORE </a>
                                      <?php }elseif ($privs->privillage == 'product') {
                                       ?>
                                       <a href="<?php echo base_url("admin/remove_privillage/{$privs->id}") ?>" onclick="return confirm('Are you sure?')">MANAGE PRODUCT</a>
                                       <?php } ?>
                                                
                                            </span>
                                    </label>
                                   <?php endforeach; ?>
                                   <?php else: ?>
                                    <p style="color:red;">No Privillage</p>
                                    <?php endif; ?> 
                                   
                                </div>
                             
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>


</div>
</div>

</div>

<?php include 'incs/footer.php'; ?>







