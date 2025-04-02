<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<style>
    .select2-container .select2-selection--single{
    height:34px;width:460px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>

<style>
    .select3-container .select3-selection--single{
    height:34px;width:460px !important;
}
.select3-container--default .select3-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/select2.min.css">

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
      <h2>Store Product Available</b> </h2>
      <div class="pull-right">
   <a href="<?php echo base_url("admin/product_add_Store"); ?>" class="btn btn-info"><i class="icon-pencil">Add Product</i></a> 
   <a href="<?php echo base_url("admin/adjust_product_stoo"); ?>" class="btn btn-danger"><i class="icon-pencil">Adjust Product</i></a>
    <a href="<?php echo base_url("admin/print_expired_product"); ?>" class=" btn btn-danger" target="_blank">Expired Product</a>
    <a href="<?php echo base_url("admin/print_product_available_store") ?>" class=" btn btn-primary" target="_blank">Print report</a>
</div>
</div>

<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>All Product</th>
                    <th>Unit</th>
                    <th>Transfer Product</th>
                    <th>Remaining Product</th>
                    <th>Buy price</th>
                    <th>Buy Total</th>
                    <th>Retail Sell </th>
                    <th>Total Retail Sell</th>
                    <th>Wholesell</th>
                    <th>Total Wholesell</th>
                    <th>Expire Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($buy_price->total_buy); ?></th>
                    <th></th>
                    <td><b><?php echo number_format($sell_price->total_sell); ?></b></td>
                    <td><b><?php //echo number_format($total_pricewhole->wholesale); ?></b></td>
                    <td><b><?php echo number_format($whole_sale->total_wholesale); ?></b></td>
                    <td></td>
                </tr>

                 <tr>
                    <th style="color:green;"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="color:green;"><?php //echo number_format($sell_price->total_sell - $buy_price->total_buy); ?></th>
                    <td></b></td>
                    <td></b></td>
                    <td></b></td>
                    <td></b></td>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($store_product as $stores): ?>
            <tr>
             <!--  <?php// if ($data_limit) {
                  # code...
              //} ?> -->
            <td><?php echo $stores->name; ?></td>
            <td><?php echo $stores->bland; ?></td>
            <td><?php echo $stores->quantity_product + $stores->moved_qnty ; ?></td>
            <td><?php echo $stores->unit; ?></td>
            <td><?php echo $stores->moved_qnty; ?></td>
            <td>
            <?php if($stores->stock_limit == FALSE){ ?>
                    -//-
         <?php }elseif($stores->quantity_product <= $stores->stock_limit) {
                ?>
            <p style="color:red;"><?php echo $stores->quantity_product ; ?></p> 
             <?php }else{ ?>
           <?php echo $stores->quantity_product ; ?>
                <?php } ?>  
                </td>
            <td>
           <?php echo number_format($stores->buy_price); ?>
                </td>
                  <td>
           <?php echo number_format($stores->total_buy_price); ?>
                </td>
            <td>
                <?php echo number_format($stores->price); ?>
            </td>
            <td> <?php echo number_format($stores->total_sell_price); ?></td>
            <td> <?php echo number_format($stores->ju_price); ?></td>
            <td> <?php echo number_format($stores->total_sellju_price); ?></td>
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
<script src="<?php echo base_url('assets/admin/js/select2.min.js'); ?>"></script>


<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add product</h6>
            </div>
           <?php echo form_open("admin/add_product_store"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group"> 
                       <span>Select Product Name</span>
                    <select type="number" name="product_id" class="form-control select3" data-live-search="true" required>
                        <option value="">Select Product Name</option>
                        <?php foreach ($product as $products): ?>
                        <option value="<?php echo $products->product_id; ?>"><?php echo $products->name; ?> - <?php echo $products->bland; ?></option>
                         <?php endforeach; ?>
                    </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">                                  
                    <input type="number" name="" id="cont1" required autocomplete="off" class="form-control" placeholder="Container">
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                                                            
                    <input type="number" name="customer" id="cont2" required autocomplete="off" class="form-control" placeholder="Total">
                        </div>
                    </div>
                     <div class="col-12">
                        <div class="form-group">
                                                           
                    <input type="number" name="quantity_product" id="total_cont" required autocomplete="off" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Add">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Product Adjustment</h6>
            </div>
           <?php echo form_open("admin/remove_product_store"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group"> 
                       <span>Select Product Name</span>
                    <select type="number" name="product_id" class="orm-control select2" data-live-search="true" required>
                        <option value="">Select Product Name</option>
                        <?php foreach ($product as $products): ?>
                        <option value="<?php echo $products->product_id; ?>"><?php echo $products->name; ?> - <?php echo $products->bland; ?></option>
                         <?php endforeach; ?>
                    </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">                                  
                    <input type="number" name="" id="cont1y" required autocomplete="off" class="form-control" placeholder="Container">
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                                                            
                    <input type="number" name="customer" id="cont2y" required autocomplete="off" class="form-control" placeholder="pc">
                        </div>
                    </div>
                     <div class="col-12">
                        <div class="form-group">
                                                           
                    <input type="number" name="quantity_product" id="total_conty" required autocomplete="off" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Adjust">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>





<script>
        $(document).ready(function () { 
        $("#cont1y,#cont2y").change(function() {
    $("#total_conty").val ($("#cont1y").val() * $("#cont2y").val());
            });
        });
    </script>

    <script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>

    </script>

<script>
    $('.select2').select2();
</script>
<script>
    $('.select3').select2();
</script>
<script src="<?php echo base_url('assets/admin/js/select2.min.js'); ?>"></script>


