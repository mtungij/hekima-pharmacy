
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Daily Purchase Report</title>
</head>
<body>

<div id="container">
 <!--  <div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
 </div> -->
  <style>
    .pull{
    text-align: center;
    margin-top: 100px;
    margin-bottom: 0px;
    margin-right: 150px;
    margin-left: 80px;

    }
  </style>
  <style>
    .display{
      display: flex;
      
    }
  </style>

       <div class="pull">
        <p style="font-size:12px;"> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        </p> 
         <p style="font-size:12px;"><b><?php echo $supplier_detail->supplier_name; ?> / DATE: <?php echo $supplier_detail->date ?> </b></p>
       </div>

  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: ;
}

</style>
</head>
<body>



<table>
  <tr>
    <th style="font-size:12px;">S/NO.</th>
    <th style="font-size:12px;">MEDICINE</th>
    <th style="font-size:12px;">BRAND</th>
    <th style="font-size:12px;">PACK SIZE</th>
    <th style="font-size:12px;">QUANTITY</th>
    <th style="font-size:12px;">PRICE</th>
    <th style="font-size:12px;">TOTAL AMOUNT</th>
    <th style="font-size:12px;">RETURN</th>
  </tr>
       <?php $no = 1; ?>
  <?php foreach ($order_list as $datas): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;"><?php echo $datas->name; ?></td>
    <td style="font-size:12px;"><?php echo $datas->bland; ?></td>
    <td style="font-size:12px;"><?php echo $datas->pack_size; ?></td>
    <td style="font-size:12px;"><?php echo $datas->quantity_pack; ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->buy_price_pack); ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->total_amount); ?></td>
    <td style="font-size:12px;"><?php //echo date('F, j, Y, g:j a', strtotime($datas->created)); ?></td>
  </tr>
 <?php endforeach; ?>
  <tr>
    <td style="font-size:12px;"><b>TOTAL</b></td>
    <td style="font-size:12px;"><?php //echo $datas->name; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->bland; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->pack_size; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->quantity_pack; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($datas->buy_price_pack); ?></td>
    <td style="font-size:12px;"><b><?php echo number_format($total_order_amount->total_order); ?></b></td>
    <td style="font-size:12px;"><?php //echo date('F, j, Y, g:j a', strtotime($datas->created)); ?></td>
  </tr>

   <tr>
    <td style="font-size:12px;"><b>PAID AMOUNT</b></td>
    <td style="font-size:12px;"><?php //echo $datas->name; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->bland; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->pack_size; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->quantity_pack; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($datas->buy_price_pack); ?></td>
    <td style="font-size:12px;"><b><?php echo number_format($total_order_amount->paid_amount); ?></b></td>
    <td style="font-size:12px;"><?php //echo date('F, j, Y, g:j a', strtotime($datas->created)); ?></td>
  </tr>

    <tr>
    <td style="font-size:12px;"><b>REMAIN AMOUNT</b></td>
    <td style="font-size:12px;"><?php //echo $datas->name; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->bland; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->pack_size; ?></td>
    <td style="font-size:12px;"><?php //echo $datas->quantity_pack; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($datas->buy_price_pack); ?></td>
    <td style="font-size:12px;"><b><?php echo number_format($total_order_amount->total_order - $total_order_amount->paid_amount); ?></b></td>
    <td style="font-size:12px;"><?php //echo date('F, j, Y, g:j a', strtotime($datas->created)); ?></td>
  </tr>
 
</table>
  </div>

</div>

</body>
</html>




