 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              Barcode & Qrcode
             
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-qrcode"></i> </a></li>
              <li class="active"> Barcode & Qrcode</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
            <h1 class="box-title">Barcode Generator </h1>
                <div class="pull-right">
                    <a href="<?php echo site_url('item');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
            <div class="box-body">
              <?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';?>
            <br>
            <?php echo $row->barcode?>
            <br><br>
            <a href="<?php echo site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" 
                            class="btn btn-primary btn-flat btn-sm"><i class="fa fa-print">
                            </i>print</a>
            </div>
            <br>
            <div class ="box">
            <div class="box-header">
            <h1 class="box-title">Qr-Code Generator <i class="fa fa-qrcode"></i></h1>
            </div>
            <div class="box-body">
              <?php
               $qrCode = new  Endroid\QrCode\QrCode($row->barcode.'-'.$row->name);
                $qrCode->writeFile('uploads/qrcode/item-'.$row->barcode.'.png');
              ?>
              <img src="<?php echo base_url('uploads/qrcode/item-'.$row->barcode.'.png')?>">
              <br>
              <?php echo $row->barcode?>
              <br> <br>
              <a href="<?php echo site_url('item/qrcode_print/'.$row->item_id)?>" target="_blank" 
                            class="btn btn-primary btn-flat btn-sm"><i class="fa fa-print">
                            </i>print</a>
            </div>


              
            </div>
    </section>
    <!-- /.content -->