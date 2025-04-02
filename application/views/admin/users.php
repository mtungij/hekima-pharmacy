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
<h2>Register Users</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_admin"); ?>
<div class="row clearfix">
       <div class="col-sm-4">
        <div class="form-group">
           <span>Full name</span>
            <input type="text" autocomplete="off" required name="full_name" class="form-control" placeholder="Full name">
            <?php echo form_error("full_name"); ?>
        </div>
    </div>
       <div class="col-sm-4">
      <div class="form-group">
        <span>Phone number</span>
            <input type="number" autocomplete="off" required name="phone_number" class="form-control" placeholder="phone number">
            <?php echo form_error("phone_number"); ?>
        </div>
    </div>
        <div class="col-sm-4">
      <div class="form-group">
        <span>Privillage</span>
        <select type="text" class="form-control" required name="role">
          <option value="">Select privillage</option>
          <option>admin</option>
          <option>seller</option>
          <option>cashier</option>
        </select>
        <?php echo form_error("role"); ?>
        </div>
    </div>
  <input type="hidden" name="password" value="1234">
  <!-- <input type="hidden" name="user_id" value="<?php //echo $_SESSION['user_id']; ?>"> -->
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
      </div>
    </div>
</div>
<?php form_close(); ?>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
      <h2>Users list</b> </h2>
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
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Profile</th>
                    <th>Full name</th>
                    <th>Phone number</th>
                    <th>Privillage</th>
                    <th>Date</th>
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
            <td><?php echo substr($admins->created_at, 0,10); ?></td>
            <td>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Action
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    <a class="dropdown-item" href="<?php echo base_url("admin/edit_user/{$admins->user_id}"); ?>">Edit</a>
    <a class="dropdown-item" href="<?php echo base_url("admin/delete_user/{$admins->user_id}"); ?>" onclick="return confirm('Are you sure?')">Delete</a>
     <a class="dropdown-item" href="<?php echo base_url("admin/privillage/{$admins->user_id}"); ?>">User Privilage</a>
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

