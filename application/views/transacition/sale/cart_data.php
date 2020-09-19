<?php 
  $no = 1;
 if($cartt->num_rows() > 0) {
    foreach ($cartt->result() as $c => $data) {?>
        <tr>
        <td> <?php echo $no++ ?>.</td>
        <td> <?php echo $data->barcode?></td>
        <td><?php echo $data->item_name?></td>
        <td class="text-right"><?php echo $data->price?></td>
        <td class="text-right"><?php echo $data->qty?></td>
        <td class="text-right"><?php echo $data->discount?></td>
        <td class="text-right total" totall="<?=$data->total?>"> 
          <?php echo indo_currency($data->total)?> 
            
          </td>
        <td class="text-center" width="160px">

            <button id ="update_cart" data-toggle="modal" data-target="#modal-item-edit"

            data-cartid="<?php echo $data->cart_id?>"
            data-barcode="<?php echo $data->barcode?>"
            data-product="<?php echo $data->item_name?>"
            data-price="<?php echo $data->price?>"
            data-qty="<?php echo $data->qty?>"
            data-discount="<?php echo $data->discount?>"
            data-total="<?php echo $data->total?>"
            class="btn btn-xs btn-primary">
            <i class="fa fa-pencil"></i>update
            </button>
         <button id="del_cart" data-cartid="<?php echo $data->cart_id?>" class="btn btn-xs btn-danger">
             <i class="fa fa-trash"></i> delete
         </button>
        </td>

        </tr>
        <?php
    }
 } else{
            echo '<tr>
                  <td colspan="8" class="text-center"> Tidak Ada Item</td>
                  </tr>';
 }?>

 
