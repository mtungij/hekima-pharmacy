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
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>Buy price</th>
                    <th>Retail Sale Price</th>
                    <th>WholeSale Price</th>
                    <th>Expire Staus</th>
                    <th>Stock Limit</th>
                    <th>Expire Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>Buy price</th>
                    <th>Retail Sale Price</th>
                    <th>WholeSale Price</th>
                    <th>Expire Staus</th>
                    <th>Stock Limit</th>
                    <th>Expire Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($product as $products): ?>
            <tr>
           
            <td><?php echo $products->name; ?></td>
            <td><?php echo $products->bland; ?></td>
            <td>Tsh.<?php echo number_format($products->buy_price); ?>/=</td>
            <td>Tsh.<?php echo number_format($products->price); ?>/=</td>
            <td>Tsh.<?php echo number_format($products->ju_price); ?>/=</td>
            <td>
                <?php $date = date("Y-m-d"); ?>
                 <?php if($products->exp_date == FALSE){ ?>
                        -//-
                <?php }elseif($products->exp_date <= $date) {
                 ?>
            <a href="javascript:;" class="badge badge-danger">Expired</a>
             <?php }else{ ?>
            <a href="javascript:;" class="badge badge-success">Active</a>
                <?php } ?>
            </td>
            <td><?php echo $products->stock_limit; ?> /<?php echo $products->unit; ?></td>
            <td><?php echo $products->exp_date; ?></td>
            <td>
                 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                             
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo base_url("admin/edit_product/{$products->id}"); ?>">Edit</a>
                       <a class="dropdown-item" href="<?php echo base_url("admin/delete_product/{$products->id}"); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
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

