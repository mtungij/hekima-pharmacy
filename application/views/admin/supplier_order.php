<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
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
      <h2>Supplier Name : <?php echo @$supplier_detail->supplier_name; ?> /phone Number : <?php echo $supplier_detail->supplier_phone;  ?> / Order Date : <?php echo @$supplier_detail->date ?> </b> </h2>
          <div class="pull-right">
       <a href="<?php echo base_url("admin/print_daily_purchase/{$supplier_detail->order_id}") ?>" class="btn btn-primary" target="_blank"><i class="icon-printer">print</i></a>
       <a href="<?php echo base_url("admin/order_record"); ?>" class="btn btn-info"><i class="icon-arrow-left">Back</i></a>
       <a href="<?php echo base_url("admin/add_order_product/{$supplier_detail->order_id}"); ?>" class="btn btn-info"><i class="icon-pencil">Add</i></a>
      
</div>
</div>
<div class="body">
    <div class="table-responsive">

<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    
                    <th>Product name</th>
                    <th>Brand</th>
                    <th>Pack Size</th>
                    <th>Qnty</th>
                    <th>Buy Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                   
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format(@$total_order_amount->total_order); ?></th>
                    <th></th>
                </tr>
                <tr>
                   
                    <th>TOTAL PAID AMOUNT</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format(@$total_order_amount->paid_amount); ?></th>
                    <th></th>
                </tr>
                 <tr>
                   
                    <th>REMAIN AMOUNT</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format(@$total_order_amount->total_order - @$total_order_amount->paid_amount); ?></th>
                    <th></th>
                </tr>
            </tfoot>

            <tbody>
              <?php foreach ($order_list as $stores): ?>
            <tr id="loan_<?= $stores->req_id; ?>">
            <td><?php echo $stores->name; ?></td>
            <td><?php echo $stores->bland; ?></td>
            <td><?php echo $stores->pack_size; ?> </td> 
            <td> <?php echo $stores->quantity_pack; ?></td>
            <td><?php echo number_format($stores->buy_price_pack); ?></td>
            <td><?php echo number_format($stores->total_amount); ?></td>  
            <td> <a href="<?php echo base_url("admin/edit_puechase/{$stores->req_id}/{$stores->order_id}") ?>" class="btn btn-primary btn-sm"><i class="icon-pencil" title="Edit"></i></a> | <a href="<?php echo base_url("admin/delete_request_order/{$stores->req_id}"); ?>" class="btn btn-danger  btn-sm" onclick="return confirm('Are you Sure?')"><i class="icon-trash" title="Delete"></i></a></td>  
                
                </tr>
                <div class="modal fade" id="addcontact<?php echo $stores->req_id ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit form</h6>
            </div>
            <?php echo form_open("admin/modify_order/{$stores->req_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-6">
                        <span>Pack size/Unit</span>
                        <div class="form-group">                                    
                            <input type="text" name="pack_size" value="<?php echo @$stores->pack_size; ?>" autocomplete="off" class="form-control" placeholder="Enter pack size" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <span>Quantity</span>
                        <div class="form-group">                                   
                            <input type="number" name="quantity_pack" value="<?php echo @$stores->quantity_pack; ?>" class="form-control" autocomplete="off" placeholder="Enter quantity" required>
                        </div>
                    </div>
                      <div class="col-4">
                        <span>Container</span>
                        <div class="form-group">                                   
                            <input type="number" name="" id="item" onkeyup="calCulate_datas(this.value,this)"  value="<?php echo @$stores->quantity_pack; ?>" class="form-control" autocomplete="off" placeholder="Enter quantity" required>
                        </div>
                    </div>
                      <div class="col-4">
                        <span>Pc</span>
                        <div class="form-group">                                   
                            <input type="number" name="" id="quntity" onkeyup="calCulate_datas(this.value,this)"  value="<?php echo @$stores->quantity_pack; ?>" class="form-control" autocomplete="off" placeholder="Enter quantity" required>
                        </div>
                    </div>
                      <div class="col-4">
                        <span>Total</span>
                        <div class="form-group">                                   
                            <input type="number" name="total" id="subtotal" value="<?php echo @$stores->quantity_pack; ?>" class="form-control" autocomplete="off" placeholder="Total" required>
                        </div>
                    </div>
                     <div class="col-12">
                        <span>Buy Price</span>
                        <div class="form-group">                                   
                            <input type="number" name="buy_price_pack" value="<?php echo @$stores->buy_price_pack; ?>" class="form-control" autocomplete="off" placeholder="Enter Buy Price" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>


            <?php echo form_close(); ?>
        </div>
    </div>
</div>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
      <h2>Payment Order Summary</h2>
          <div class="pull-right">
       <!-- <a href="" class="btn btn-primary"><i class="icon-pencil">Pay record</i></a> -->
       <button type="button" class="btn btn-outline-primary m-t-10" data-toggle="modal" data-target="#addcontact"><i class="icon-pencil"></i>Pay record</button>
    <div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Payment Form</h6>
            </div>
            <?php echo form_open("admin/create_order_payment/{$supplier_detail->order_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-6">
                        <span>Amount</span>
                        <div class="form-group">                                    
                            <input type="number" name="pay_amount" autocomplete="off" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id;  ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <?php $date = date("Y-m-d"); ?>
                    <input type="hidden" name="pay_date" value="<?php echo $date; ?>">
                    <div class="col-6">
                        <span>Payment Method</span>
                        <div class="form-group">                                   
                            <input type="text" name="pay_by" class="form-control" autocomplete="off" placeholder="Enter Payment method" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Pay</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<div class="modal fade" id="addcontact_2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Payment Form</h6>
            </div>
            <?php echo form_open("admin/create_order_payment/{$supplier_detail->order_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-6">
                        <span>Amount</span>
                        <div class="form-group">                                    
                            <input type="number" name="pay_amount" autocomplete="off" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id;  ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <?php $date = date("Y-m-d"); ?>
                    <input type="hidden" name="pay_date" value="<?php echo $date; ?>">
                    <div class="col-6">
                        <span>Payment Method</span>
                        <div class="form-group">                                   
                            <input type="text" name="pay_by" class="form-control" autocomplete="off" placeholder="Enter Payment method" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Pay</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</div>
</div>
<div class="body">
    <div class="table-responsive"><div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Payment Form</h6>
            </div>
            <?php echo form_open("admin/create_order_payment/{$supplier_detail->order_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-6">
                        <span>Amount</span>
                        <div class="form-group">                                    
                            <input type="number" name="pay_amount" autocomplete="off" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id;  ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <?php $date = date("Y-m-d"); ?>
                    <input type="hidden" name="pay_date" value="<?php echo $date; ?>">
                    <div class="col-6">
                        <span>Payment Method</span>
                        <div class="form-group">                                   
                            <input type="text" name="pay_by" class="form-control" autocomplete="off" placeholder="Enter Payment method" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Pay</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<div class="modal fade" id="addcontact_2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Payment Form</h6>
            </div>
            <?php echo form_open("admin/create_order_payment/{$supplier_detail->order_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-6">
                        <span>Amount</span>
                        <div class="form-group">                                    
                            <input type="number" name="pay_amount" autocomplete="off" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id;  ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <?php $date = date("Y-m-d"); ?>
                    <input type="hidden" name="pay_date" value="<?php echo $date; ?>">
                    <div class="col-6">
                        <span>Payment Method</span>
                        <div class="form-group">                                   
                            <input type="text" name="pay_by" class="form-control" autocomplete="off" placeholder="Enter Payment method" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Pay</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>





<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                   
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($payment_history as $payment_historys): ?>
            <tr>
            <td><?php echo number_format($payment_historys->pay_amount); ?></td>
            <td><?php echo $payment_historys->pay_by; ?></td>
            <td><?php echo $payment_historys->pay_date; ?> </td> 
            <td><a href="<?php echo base_url("admin/delete_purchase_history/{$payment_historys->pay_id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></a></td> 
                
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
</div>


<?php include 'incs/footer.php'; ?>
<script>
    $('.select2').select2();
</script>

     <script>
   function calCulate_datas(data,target) {
        const quntity = target.parentElement.parentElement.querySelector("#quantity")
        const subtotal = target.parentElement.parentElement.querySelector("#subtotal")

        subtotal.value = data * quntity.value

        const total = document.querySelectorAll("#subtotal")
       _total = []
       total.forEach (d=>{
        _total.push(d.value)
       }) 
        
        const myTotal = _total.reduce(function(a,b) {
            return +a + +b;
        },0)

        const all_total = document.querySelector("#myTotal")
        all_total.value = myTotal

    }

    </script>











