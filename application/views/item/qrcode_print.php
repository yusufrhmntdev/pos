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
                    $qrCode = new  Endroid\QrCode\QrCode($row->barcode.'-'.$row->name);
                    $qrCode->writeFile('uploads/qrcode/item-'.$row->barcode.'.png');
                    ?>
                    <img src="uploads/qrcode/item-<?=$row->barcode?>.png" width="100px">
                    <br>
                    <?php echo $row->barcode?>
</body>
</html>