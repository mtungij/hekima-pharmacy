
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>All product</title>
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
         <p style="font-size:12px;"><b>ALL PRODUCT</b></p>
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
    <th style="font-size:12px;">S/No.</th>
    <th style="font-size:12px;">Product name</th>
    <th style="font-size:12px;">Quantity</th>
    <th style="font-size:12px;">Buying price</th>
    <th style="font-size:12px;">Buy - Total</th>
    <th style="font-size:12px;">Retail Sale Price</th>
    <th style="font-size:12px;">Retail Sale-Total</th>
    <th style="font-size:12px;">Whole Sale Price</th>
    <th style="font-size:12px;">Whole Sale Total</th>
  </tr>
  <?php echo $no = 1; ?>
  <?php foreach ($data as $datas): ?>
 <tr>
    <td style="font-size:12px;"><?php echo $no++; ?></td>
    <td style="font-size:12px;"><?php echo $datas->name; ?></td>
    <td style="font-size:12px;"><?php echo $datas->balance; ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->buy_price); ?></td>
    <td style="font-size:12px;"> 
    <?php echo number_format($datas->buy_price * $datas->balance) ; ?>
      </td>
    <td style="font-size:12px;"><?php echo number_format($datas->price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->price * $datas->balance); ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->ju_price); ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->ju_price * $datas->balance); ?></td>
   
  </tr>
 <?php endforeach; ?>
  <tr>
   <th></th>
   <th style="font-size:12px;">Gross Total:</th>
   <th style="font-size:12px;"><?php echo $balance->bala; ?></th>
   <th style="font-size:12px;"><?php echo number_format($total_buyprice->buy_prc); ?>/=</th>
   <th style="font-size:12px;"><?php echo number_format($total_buyprice_data->total_buyPrice); ?>/=</th>
   <th style="font-size:12px;"><?php echo number_format($total_sell_price->sell_price);  ?>/=</th>
   <th style="font-size:12px;"><?php echo number_format($totalAll_sellprice->Total_sell_price); ?>/=</th>
   <th style="font-size:12px;"><?php echo number_format($bei_jumla->jumlaPrice); ?>/=</th>
   <th style="font-size:12px;"><?php echo number_format($total_jumla->totalju) ?>/=</th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




