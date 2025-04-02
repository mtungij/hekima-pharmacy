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
<div class="col-lg-8">
<div class="card">
<div class="header">
  <div class="row">
    <div class="col-md-6">
  <h2>Use Today</b> </h2>
  </div>
  <div class="col-md-6">
    <div class="pull-right">
      <!-- <a href="" class="btn btn-info"><i class="icon-printer"></i>Print</a> -->
    </div>
  </div>
  </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover j-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        
          
                <?php foreach ($today as $todays_date): ?>
            <tr>
            <td><?php echo $todays_date->description; ?></td>
            <td><?php echo number_format($todays_date->price); ?>/= </td>
            <td><?php echo substr($todays_date->created, 0,10); ?></td>
            <td><a href="<?php echo base_url("cashire/edit_cashflow/{$todays_date->id}") ?>" class="btn btn-primary btn-sm"><i class="icon-pencil" title="Edit"></i></a></td>
              </tr>
        <?php endforeach; ?>
        <tr>
          <th></th>
          <th style="color: blue">Total Cash Out: <?php echo number_format($matumizi->matumiz); ?>/=</th>
          <th style="color:orange">Total Cash In : <?php echo number_format($today_SalesData->TotalItemsOrdered); ?>/=</th>
          <th></th>
        </tr>
        <tr>
          <th></th>
          <th></th>
          <th><p style="color: green">Gross Total : <?php echo number_format($today_SalesData->TotalItemsOrdered - $matumizi->matumiz);  ?>/=</p></th>
          <th></th>

        </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
<div class="col-md-4">
  <div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Use Today</h2>
</div>
<div class="body">
<?php echo form_open_multipart("cashire/create_useToday"); ?>
<div class="row clearfix">
       <div class="col-sm-12">
        <div class="form-group">
           <span>Amount</span>
            <input type="number" autocomplete="off" required name="price" class="form-control" placeholder="Amount">
            <?php echo form_error("price"); ?>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
        </div>
    </div>
       <div class="col-sm-12">
      <div class="form-group">
        <span>Description</span>
            <textarea type="text" rows="4" autocomplete="off" required name="description" class="form-control" placeholder="description"></textarea>
            <?php echo form_error("description"); ?>
        </div>
    </div>
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
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
<script src="<?php echo base_url() ?>assets/admin/js/jquery.js"></script>
<?php include 'incs/footer.php'; ?>



