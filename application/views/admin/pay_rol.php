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
      <h2>Users list </h2>
      </div>
      <div class="col-lg-6">
          <div class="pull-right">
            <a href="<?php echo base_url("admin/payrol_report"); ?>"class="btn btn-info" target="_blank"><i class="icon-printer"></i>Print</a>
            </div>
      </div>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Profile</th>
                    <th>Full name</th>
                    <th>Phone number</th>
                    <th>Privillage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Profile</th>
                    <th>Full name</th>
                    <th>Phone number</th>
                    <th>Privillage</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($admin as $admins): ?>
            <tr>
            <td>
              <?php if ($admins->img == TRUE) {
               ?>
            <img src="<?php echo base_url().'assets/admin/img/'.$admins->img; ?>" class="rounded-circle user-photo" style="width:60px; height:60px">
             <?php }elseif ($admins->img == FALSE) {
            ?>
            <img src="<?php echo base_url() ?>assets/admin/img/wateja.png" class="rounded-circle user-photo" style="width:60px; height:60px">
            <?php  }  ?>
            </td>
            <td><?php echo $admins->full_name; ?></td>
            <td><?php echo $admins->phone_number; ?></td>
            <td><?php echo $admins->role; ?></td>
            
            <td>
           <a href="<?php echo base_url("admin/pay/{$admins->user_id}") ?>" class="btn btn-primary"><i class="icon-eye" title="view">Pay</i></a>
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

