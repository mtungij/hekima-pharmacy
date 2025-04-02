<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Receipt</title>
        <style>
              *{
     font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    /*word-break: break-all;*/
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 200px;
    max-width: 200px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;


    }
    @page{margin-bottom: 0;}
    body{margin-bottom: 0;}
    #footer { display: none; }

    @page{
        size: auto;
        margin-top: 0;
        margin-bottom: 0;
    }
}
        </style>
    </head>
    <body>
        <div class="ticket">
          <!--   <img src="./logo.png" alt="Logo"> -->
            <p class="centered"><?php echo $shop->shop_name; ?>
                <br><?php echo $shop->po_box; ?>
                <br><?php echo $shop->location; ?>
                <br><?php echo $shop->phone; ?> <br> <?php echo $shop->email; ?></p>
                 <?php $day = date("d, M Y"); ?>
                
                <p>For : <?php echo  $customer; ?><br> Date: <?php echo $day ; ?></p>
              
            <table>
                <thead>

                    <tr>
                        <th class="quantity">Qnty</th>
                        <th class="description">Item</th>
                        <th class="price">Amount</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if($this->cart->total_items() > 0): ?>          
            <?php foreach ($cartItems as $item):
                 
                ?>
                    <tr>
                        <td class="quantity"><?php echo $item['qty']; ?></td>
                        <td class="description"><?php echo $item['name']; ?></td>
                        <td class="price"><?php echo number_format($item["sub"]); ?></td>
                    </tr>
                 
                   <?php endforeach; ?>
               <?php endif; ?> 
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price"><?php if($this->cart->total_items() > 0){ ?>
                          <?php echo 'Tsh.'.number_format($this->cart->tota()); ?>
                          <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
             <p class="centered"><i><b>God will heal you!</b></i></p>
        </div>
       
     
    </body>
</html>