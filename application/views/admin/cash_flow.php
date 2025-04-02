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
    <div class="col-md-4">
  <h2>Today's Cashflow</b> </h2>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
      <a href="<?php echo base_url("admin/today_cashflow"); ?>" class="btn btn-info"><i class="icon-clock"></i>Today Cashflow</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
      <a href="<?php echo base_url("admin/genel_cashflow"); ?>" class="btn btn-info"><i class="icon-calendar"></i>General Cashflow</a>
    </div>
  </div>
  </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                  
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        
                <?php foreach ($data_cash as $data_cashs): ?>
            <tr>
            <td><?php echo $data_cashs->full_name; ?></td>
            <td><?php echo $data_cashs->description; ?></td>
            <td><?php echo number_format($data_cashs->price); ?>/=</td>
            <td><?php echo date('F, j, Y, g:j a', strtotime($data_cashs->created)); ?>
                
            </td>
            <td>
              <?php if ($data_cashs->role == 'admin') {
              ?>
              <a href="<?php echo base_url("admin/edit_cashflow/{$data_cashs->id}"); ?>" class="btn btn-info btn-sm"><i class="icon-pencil"></i></a>
            <?php  }else{ ?>
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
<div class="col-md-4">
  <div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Use Today</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_useToday"); ?>
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
            <textarea type="text" rows="4" autocomplete="off" required name="description" class="form-control" placeholder="Description"></textarea>
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



