
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Customer Recept</title>
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
        <?php $day = date("d, M, Y"); ?>
         <p style="font-size:12px;"> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        <br>
         Date : <?php echo $day; ?>
        </p>
        <table>
          <tr>
            
            <td style="border: none;font-size: 12px;"></td>
            <td style="border: none;font-size: 12px;">Customer Name : <?php echo  urldecode($text); ?></td>
            <td style="border: none;font-size: 12px;">Total : <?php echo 'Tsh.'.number_format($this->cart->tota()).'/='; ?></td>
            
          </tr>
        </table>
        
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
    <th style="font-size:12px;border: none;">S/No.</th>
    <th style="font-size:12px;border: none;">product</th>
    <th style="font-size:12px;border: none;">Quantinty</th>
    <th style="font-size:12px;border: none;">Price</th>
  </tr>
   <?php $no = 1; ?>
     <?php if($this->cart->total_items() > 0): ?>          
            <?php foreach ($cartItems as $item):
                 
                ?>
    
 
 <tr>
    <td style="font-size:12px;border: none;"><?php echo $no++; ?></td>
    <td style="font-size:12px;border: none;"><?php echo $item['name']; ?></td>
    <td style="font-size:12px;border: none;"><?php echo $item['qty']; ?> <?php echo $item['unit']; ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($item["sub"]); ?> </td>
    
   
   
  </tr>
 <?php endforeach; ?>
<?php endif; ?>
 <tr>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;"></th>
   <th style="border: none;font-size:12px;">Total</th>
   <th style="border: none;font-size:12px;"><?php if($this->cart->total_items() > 0){ ?>
                        <span><?php echo 'Tsh.'.number_format($this->cart->tota()).'/='; ?>
                    <?php } ?>
</th>
 </tr>

</table>
  </div>

</div>

</body>
</html>




