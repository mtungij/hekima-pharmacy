
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Salles Today</title>
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
        <?php $day = date('F-j-Y'); ?>
        <p style="font-size:12px;"> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        </p> 
         <p style="font-size:12px;"><b>WHOLESALES TODAY REPORT / <?php echo $day; ?></b></p>
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
    <th style="font-size:12px;">No.</th>
    <th style="font-size:12px;">Seller</th>
    <th style="font-size:12px;">Product</th>
    <th style="font-size:12px;">Qty</th>
    <th style="font-size:12px;">Sell Price</th>
    <th style="font-size:12px;">Total Price</th>
    <th style="font-size:12px;">Profit</th>
    <th style="font-size:12px;">Status</th>
    <th style="font-size:12px;">Time</th>
  </tr>
    <?php $no =1; ?>
  <?php foreach ($whole_sale as $all_sallesdata): ?>
    
 
 <tr>
  <td style="font-size:12px;"><?php echo $no++; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->full_name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->quanty; ?> <?php echo $all_sallesdata->unit; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->new_sell_price) ; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->total_sell_price) ; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->profit) ; ?></td>
    <td style="font-size:12px;">
      <?php 
               $da = $all_sallesdata->ju_price - $all_sallesdata->new_sell_price;
                 if ($da == 0) {
                   echo "wholesale";
                 }else{
                  echo "retailsale";
                 }
               ?>
    </td>
    <td style="font-size:12px;">
      <?php //echo $all_sallesdata->created_at; ?>
         <?php echo  date('F, j, Y, g:j a', strtotime($all_sallesdata->created_at)) ?>
      </td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Sales:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($total_whole->Totalwhole); ?>/=</th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Profit:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($whole_profit->whole_profit);  ?>/=</th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




