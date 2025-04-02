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
    <div class="row">
        <div class="col-lg-6">
      <h2>Buying  price Report</b> </h2>
      </div>
      <div class="col-lg-6">
          <div class="pull-right">
              <a href="<?php echo base_url("admin/print_buyingprice"); ?>" class="btn btn-info btn-sm" target="_blank"><i class="icon-printer"></i>Print</a>
          </div>
      </div>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Product name</th>
                    <th>Buy price</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Product name</th>
                    <th>Buy price</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($all_product as $products): ?>
            <tr>
           
            <td><?php echo $products->name; ?></td>
            <td>Tsh.<?php echo number_format($products->buy_price); ?>/=</td>
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

