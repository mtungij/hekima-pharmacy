
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>STORE REPORT</title>
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
        <br>
         Email: <?php echo $shop->email; ?>
        <br>
        <b style="font-size:12px;"> 
        
      
         STORE REPORT  <b> 
        </p>  
        
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
  background-color: #dddddd;
}

</style>
</head>
<body>



<table>
  <tr>
    <th style="font-size:12px;">Product</th>
    <th style="font-size:12px;">Brand</th>
    <th style="font-size:12px;">All Product</th>
    <th style="font-size:12px;">Unit</th>
    <th style="font-size:12px;">Transifor Product</th>
    <th style="font-size:12px;">Remaining Product</th>
    <th style="font-size:12px;">Buy Price</th>
    <th style="font-size:12px;">Total Buy</th>
    <th style="font-size:12px;">Retail Sell Price</th>
    <th style="font-size:12px;">Total Retail Sell</th>
    <th style="font-size:12px;">Wholesell price</th>
    <th style="font-size:12px;">Total Wholesell price</th>
  </tr>
  
  <?php foreach ($store_product as $store_products): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $store_products->name; ?></td>
    <td style="font-size:12px;"><?php echo $store_products->bland; ?></td>
    <td style="font-size:12px;"><?php echo $store_products->quantity_product + $store_products->moved_qnty ; ?> </td>
    <td style="font-size:12px;"><?php echo $store_products->unit; ?></td>
    <td style="font-size:12px;"><?php echo $store_products->moved_qnty; ?></td>
    <td style="font-size:12px;"> <?php echo $store_products->quantity_product ; ?></td>
    <td style="font-size:12px;">
       <?php echo number_format($store_products->buy_price) ; ?>
    </td>
    <td style="font-size:12px;"><?php echo number_format($store_products->total_buy_price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($store_products->price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($store_products->total_sell_price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($store_products->ju_price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($store_products->total_sellju_price); ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border: none">TOTAL</th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"><?php echo number_format($buy_price->total_buy); ?></th>
   <th style="border: none"></th>
   <th style="border: none"><?php echo number_format($sell_price->total_sell); ?></th>
   <th style="border: none"><?php echo number_format($sell_price->total_sell); ?></th>
   <th style="border: none"><?php echo number_format($whole_sale->total_wholesale); ?></th>
 </tr>

 <tr>
   <th style="border: none">PROFIT</th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"><?php echo number_format($sell_price->total_sell - $buy_price->total_buy); ?></th>
   <th style="border: none"></th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




