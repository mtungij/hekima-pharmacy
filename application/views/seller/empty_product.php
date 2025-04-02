<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>
<script src="<?php echo base_url('assets/admin/js/jquery.js'); ?>"></script>

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
    <div class="col-md-6">
  <h2>Empty Item List</b> </h2>
  </div>
  <div class="col-md-6">
    <div class="pull-right">
      <a href="<?php echo base_url("seller/index"); ?>"  class="btn btn-info" ><i class="icon-arrow-left" ></i></a>
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
                    <th>Unit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
        
          
                <?php foreach ($empty as $emptys): ?>
            <tr>
            <td><?php echo $emptys->name; ?></td>
            <td><?php echo $emptys->unit; ?></td>
            <td><?php echo $emptys->balance; ?></td>
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
<script src="<?php echo base_url() ?>assets/admin/js/jquery.js"></script>
<?php include 'incs/footer.php'; ?>



