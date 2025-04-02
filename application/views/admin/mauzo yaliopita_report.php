
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Last salls Report</title>
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
        <p style="font-size:12px;">SAMWEL SHOP <br>
        P.O. BOX 2021, MBEYA - TANZANIA <br>
        Mob: (0) 753 - 871 - 034 <br>
        TIN: 128-640-355 
        </p> 
         <p style="font-size:12px;"><b>Last Salles Report</b></p>
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
    <th style="font-size: 12px;">Seller</th>
    <th style="font-size: 12px;">Product Name</th>
    <th style="font-size: 12px;">Quantinty</th>
    <th style="font-size: 12px;">Sell Price</th>
    <th style="font-size: 12px;">Total Price</th>
    <th style="font-size: 12px;">Time</th>
  </tr>
  
  <?php //foreach ($all_salles as $all_sallesdata): ?>
    
 
 <tr>
    <td><?php //echo $all_sallesdata->full_name; ?></td>
    <td><?php //echo $all_sallesdata->name; ?></td>
    <td><?php //echo $all_sallesdata->quanty; ?> <?php echo $all_sallesdata->unit; ?></td>
    <td><?php //echo  number_format($all_sallesdata->price) ; ?></td>
    <td><?php //echo  number_format($all_sallesdata->total_sell_price) ; ?></td>
    <td><?php //echo $all_sallesdata->created_at; ?></td>
  </tr>
 <?php //endforeach; ?>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none">Sells:</th>
   <th style="border: none"><?php //echo number_format($total_sell->TotalItemsOrdered); ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none">Profit:</th>
   <th style="border: none"><?php //echo number_format($total_profit->Totalprofit);  ?>/=</th>
   <th style="border: none"></th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




