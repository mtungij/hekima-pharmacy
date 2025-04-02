
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

<div class="col-lg-12 col-md-12">
<div class="card">


<div class="body">

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
    <div  class="row">
        <div class="col-md-6">
            <?php $date = date("Y-m-d"); ?>
<h2>Today Order Confirmed - <?php echo $date; ?></h2>
</div>


<div class="col-md-6">
   <!--  <a href="" class="btn btn-info"><i class="icon-printer"></i>Print</a> -->
</div>
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>s/no.</th>
                    <th>Seller</th>
                    <th>Customer Name</th>
                    <th>Total price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
              
            </thead>
            <tbody>
                <?php $no = 1; ?>
            <?php foreach ($recept as $cashires): ?>
                <tr>
            <td><?php echo $no++; ?>.</td>
            <td><?php echo $cashires->full_name; ?></td>
            <td><a href="" data-toggle="modal" data-target="#addcontact2<?php echo $cashires->order_id; ?>"><?php echo $cashires->customer; ?></a></td>
            <td><?php echo number_format($cashires->total_sell); ?></td>
            <td>
                <?php if ($cashires->order_status == 'pending') {
                 ?>
                <span class="badge badge-danger">Pending</span>
            <?php }elseif ($cashires->order_status == 'aproved') {
             ?>
             <span class="badge badge-success">Aproved</span>
             <?php } ?>
            </td>
            <td><?php echo $cashires->date_receipt; ?></td>
            <td><a href="" data-toggle="modal" data-target="#addcontact2<?php echo $cashires->order_id; ?>" class="btn btn-info btn-sm" title="view"><i class="icon-eye"></i></a></td>
           
                </tr>
            <?php endforeach; ?>
            <tr>
            <td><b>TOTAL</b></td>
            <td></td>
            <td><?php //echo number_format($today_total->total); ?></td>
            <td><b><?php echo number_format($total_recept->total_sell_recept); ?></b></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
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

<?php include('incs/footer.php'); ?>


 <?php foreach ($recept as $cashires): ?>

<?php 
$order_list = $this->queries->get_order_listitem($cashires->order_id);
$total_order = $this->queries->get_order_listitem_total($cashires->order_id);

  // print_r($total_order);
  //       exit();
 ?>
<div class="modal fade" id="addcontact2<?php echo $cashires->order_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Recept No.#<?php echo $cashires->order_id; ?> <br>
                Customer name: <?php echo $cashires->customer; ?>
                <br>
                Seller: <?php echo $cashires->full_name; ?>
            </h6>
               
                <h6><a href="" class="btn btn-info"><i class="icon-printer"></i></a></h6>
            </div>
            <div class="modal-body">
              
     <div class="table-responsive">
    <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                                <th>S/no.</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                              
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                              <?php $no = 1; ?>
                                    <?php foreach ($order_list as $order_lists): ?>
                                              <tr>
                                    <td class="c"><?php echo $no++; ?>.</td>
                                    <td><?php echo $order_lists->name; ?></td>
                                    <td><?php echo $order_lists->quantity; ?> <?php echo $order_lists->unit; ?></td>
                                    <td><?php echo number_format($order_lists->new_sell_price); ?></td>                                                                             
                                    <td><?php echo number_format($order_lists->total_sell_price); ?></td>                                                                             
                             </tr>

                                         <?php endforeach; ?>
                                        
                                    </tbody>
                                     <tr>
                                     <td><b>TOTAL</b></td>
                                     <td></td>
                                     <td><b><?php //echo number_format($tota_exp->total_expences); ?></b></td>
                                     <td><b><?php //echo number_format($tota_exp->total_expences); ?></b></td>
                                     <td><b><?php echo number_format($total_order->total_bill); ?></b></td>
                                           
                                         </tr>
                                </table>
                                </div>  
                              </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Confirm</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            
        </div>
    </div>
</div>
<?php endforeach; ?>










