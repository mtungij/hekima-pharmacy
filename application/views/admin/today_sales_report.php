
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sales Today</title>
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
         <p style="font-size:12px;"><b>SALES / <?php echo $user_data->full_name; ?> / From: <?php echo $from; ?> - To: <?php echo $to; ?></b></p>
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
    <th style="font-size:12px;">Seller</th>
    <th style="font-size:12px;">Customer</th>
    <th style="font-size:12px;">Product</th>
    <th style="font-size:12px;">Quantinty</th>
    <th style="font-size:12px;">Sale Price</th>
    <th style="font-size:12px;">Total Price</th>
    <th style="font-size:12px;">Status</th>
    <th style="font-size:12px;">Time</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($data as $all_sallesdata): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $no++; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->full_name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->customer; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->qnty; ?> <?php echo $all_sallesdata->unit; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->new_sell_price) ; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->total_sell_price) ; ?></td>
    <td style="font-size:12px;">
       <?php 
               $da = $all_sallesdata->ju_price - $all_sallesdata->new_sell_price;
                 if ($da == 0) {
                   echo "whole sale";
                 }else{
                  echo "retail sale";
                 }
               ?>
    </td>
    <td style="font-size:12px;">
      <?php //echo $all_sallesdata->created_at; ?>
     <?php  echo  $all_sallesdata->created_at;?>
    </td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Total Sales:</th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none"><?php echo number_format($total_sell->total_mauzo); ?>/=</th>
 </tr>

</table>
  </div>

</div>

</body>
</html>




