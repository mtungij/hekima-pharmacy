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
      <h2>Order History</b> </h2>
          <div class="pull-right">
<!--    <a href="<?php //echo base_url("admin/product_add_Store"); ?>" class="btn btn-info"><i class="icon-pencil">Add Product</i></a> 
   <a href="<?php //echo base_url("admin/adjust_product_stoo"); ?>" class="btn btn-danger"><i class="icon-pencil">Adjust Product</i></a>
    <a href="<?php //echo base_url("admin/print_expired_product"); ?>" class=" btn btn-danger" target="_blank">Expired Product</a> -->
 <!--    <a href="<?php //echo base_url("admin/print_product_available_store") ?>" class=" btn btn-primary" target="_blank">Print report</a> -->
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Supplier Name</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Supplier Name</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($order_history as $order_historys): ?>
            <tr>
            
            <td><b><?php echo $order_historys->supplier_name; ?></b></td>
            <td><b>#<?php echo $order_historys->order_id; ?></b></td>
            <td><?php echo $order_historys->date; ?></td>
            <td><a href="<?php echo base_url("admin/view_supplier_order/{$order_historys->order_id}") ?>" class="btn btn-primary btn-sm"><i class="icon-eye">View</i></a></td>
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


