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
<div class="col-lg-12">
<div class="card">
<div class="header">
      <h2>Product List</b> </h2>
          <div class="pull-right">
   <a href="<?php echo base_url("admin/product_add_Store"); ?>" class="btn btn-info"><i class="icon-pencil">Add Product</i></a> 
   <a href="<?php echo base_url("admin/adjust_product_stoo"); ?>" class="btn btn-danger"><i class="icon-pencil">Adjust Product</i></a>
    <a href="<?php echo base_url("admin/print_expired_product"); ?>" class=" btn btn-danger" target="_blank">Expired Product</a>
 <!--    <a href="<?php //echo base_url("admin/print_product_available_store") ?>" class=" btn btn-primary" target="_blank">Print report</a> -->
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>Balance</th>
                    <th>Expired status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>Balance</th>
                    <th>Expire status</th>
                   <!--  <th>Action</th> -->
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($store as $stores): ?>
            <tr>
             <!--  <?php// if ($data_limit) {
                  # code...
              } ?> -->
            <td><b><?php echo $stores->name; ?></b></td>
            <td><b><?php echo $stores->bland; ?></b></td>
            <td>
              <?php if ($stores->balance <= $stores->stock_limit){
               ?>  
        <p style="color: red"><?php echo $stores->balance; ?> <?php echo $stores->unit; ?></p>
           
        <?php }elseif($stores->balance >= $stores->stock_limit){  ?> 
        <?php echo $stores->balance; ?> <?php echo $stores->unit; ?>
                <?php } ?>  
                </td>
                <td>
                     <?php $date = date("Y-m-d"); ?>
                 <?php if($stores->exp_date == FALSE){ ?>
                        -//-
                <?php }elseif($stores->exp_date <= $date) {
                 ?>
            <a href="javascript:;" class="badge badge-danger">Expired</a>
             <?php }else{ ?>
            <a href="javascript:;" class="badge badge-success">Active</a>
                <?php } ?>
                </td>
           
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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

