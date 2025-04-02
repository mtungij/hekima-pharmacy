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

<?php if ($das = $this->session->flashdata('mas')): ?>
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
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Add Product</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_product"); ?>
<div class="row clearfix">
       <div class="col-sm-3">
        <div class="form-group">
           <span>Product name</span>
            <input type="text" autocomplete="off" required name="name" class="form-control" placeholder="product name">
            <?php echo form_error("name"); ?>
        </div>
    </div>
       <div class="col-sm-3">
      <div class="form-group">
        <span>Unit</span>
            <input type="text" autocomplete="off" required name="unit" class="form-control" placeholder="unit">
            <?php echo form_error("unit"); ?>
        </div>
    </div>
     <div class="col-sm-2">
      <div class="form-group">
        <span>Container</span>
            <input type="number" autocomplete="off" id="cont1" name="" class="form-control" placeholder="container">
            <?php //echo form_error("unit"); ?>
        </div>
    </div>
     <div class="col-sm-2">
      <div class="form-group">
          <span>Pc</span>
            <input type="number" autocomplete="off" id="cont2" name="" class="form-control" placeholder="pc">
            <?php //echo form_error("unit"); ?>
        </div>
    </div>

       <div class="col-sm-2">
      <div class="form-group">
        <span>Quantity</span>
            <input type="number" autocomplete="off" id="total_cont" required name="quantity" class="form-control" placeholder="quantity">
            <?php echo form_error("quantity"); ?>
        </div>
    </div>
       <div class="col-sm-3">
      <div class="form-group">
        <span>Brand</span>
            <input type="text" autocomplete="off"  name="bland" class="form-control" placeholder="Brand">
            <?php echo form_error("buy_price"); ?>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
    </div>
      <div class="col-sm-3">
      <div class="form-group">
        <span>Buy price</span>
            <input type="text" autocomplete="off" required name="buy_price" class="form-control" placeholder="buy price">
            <?php echo form_error("buy_price"); ?>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
    </div>
       <div class="col-sm-3">
      <div class="form-group">
        <span>Retail Sale price</span>
            <input type="text" autocomplete="off" required name="price" class="form-control" placeholder="Retail Sale price">
            <?php echo form_error("price"); ?>
        </div>
    </div>
      <div class="col-sm-3">
      <div class="form-group">
        <span>Whole Sale Price</span>
            <input type="text" autocomplete="off"  name="ju_price" class="form-control" placeholder="Whole Sale Price">
            <?php //echo form_error("ju_price"); ?>
        </div>
    </div>

       <div class="col-sm-6">
      <div class="form-group">
        <span>Product Stock Limit</span>
            <input type="number" autocomplete="off"  name="stock_limit" class="form-control" placeholder="Product Stock Limit">
            <?php //echo form_error("ju_price"); ?>
        </div>
    </div>

     <div class="col-sm-6">
      <div class="form-group">
        <span>Expire Date</span>
            <input type="date" autocomplete="off"  name="exp_date" class="form-control" placeholder="">
            <?php //echo form_error("ju_price"); ?>
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
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
  <div class="row">
  <div class="col-lg-6">
      <h2>Product List</b> </h2>
      </div>
       <div class="col-lg-6">
        <div class="pull-right">
       <a href="<?php echo base_url("admin/all_product"); ?>" class="btn btn-primary"><i class="icon-eye"></i>View All product</a>
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
                    <th>Brand</th>
                    <th>Buy price</th>
                    <th>Retail Sell price</th>
                    <th>WholeSell price</th>
                    <th>Expire Status</th>
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
                    <th>Retail Sell price</th>
                    <th>WholeSell price</th>
                    <th>Expire Status</th>
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

 <script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>

