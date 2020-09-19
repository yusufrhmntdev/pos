<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barcode Product <?php echo $row->barcode?></title>
</head>
<body>
<?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';?>
            <br>
            <?php echo $row->barcode?>
            <br> <br>
            <?php
               $qrCode = new  Endroid\QrCode\QrCode($row->barcode.'-'.$row->name);
                $qrCode->writeFile('uploads/qrcode/item-'.$row->barcode.'.png');
              ?>
              <img src="<?php echo base_url('uploads/qrcode/item-'.$row->barcode.'.png')?>">
              <br>
              <?php echo $row->barcode?>
</body>
</html>