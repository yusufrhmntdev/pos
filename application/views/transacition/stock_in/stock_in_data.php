 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
            Stock in
              <small>Barang Masuk / Pembelian </small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
              <li> Transacition</li>
              <li class="active">Stock</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('stock/in/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> add data</a>
                </div>
                <h3 class="box-title"> data stock in</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Product Item</th>
                            <th>Qty</th>
                            <th>Supplier Name</th>
                            <th>Date</th>
                            <th class="text-right">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->barcode?></td>
                            <td><?php echo $data->item_name?></td>
                            <td><?php echo $data->qty?></td>
                            <td><?php echo $data->supplier_name?></td>
                            <td><?php echo indo_date($data->date)?></td>
                            <td class="text-center" width="160px">
                            <a class=" btn btn-default btn-xs" id="set_detail" data-toggle="modal" data-target="#modal-detail"
                                        data-barcode="<?=$data->barcode?>"
                                        data-item_name="<?=$data->item_name?>"
                                        data-supplier_name="<?=$data->supplier_name?>"
                                        data-detail="<?=$data->detail?>"
                                        data-qty="<?=$data->qty?>"
                                        data-date="<?=indo_date($data->date)?>"
                            >
                                <i class="fa fa-eye"></i> detail
                            <a href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id)?>" class="btn btn-danger btn-xs tombol-hapus">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>    
    </section>
    <!-- /.content -->
    <!-- <pop up modal> -->
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Stock in Detail</h4>
                </div>
                <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                <tbody>
                    <tr>
                    <th style="width:35%"> Barcode </th>
                   <td><span id="barcode"></span></td>
                    </tr>
                    <tr>
                    <th> item_name </th>
                   <td><span id="item_name"></span></td>
                    </tr>
                    <tr>
                    <th> supplier_name </th>
                   <td><span id="supplier_name"></span></td>
                    </tr>
                    <tr>
                    <th> detail </th>
                   <td><span id="detail"></span></td>
                    </tr>
                    <tr>
                    <th> qty </th>
                   <td><span id="qty"></span></td>
                    </tr>
                    <tr>
                    <th> date </th>
                   <td><span id="date"></span></td>
                    </tr>

                </tbody>
                </table>
                   
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '#set_detail', function() {
            var barcode= $(this).data('barcode');
            var item_name= $(this).data('item_name');
            var supplier_name= $(this).data('supplier_name');
            var detail= $(this).data('detail');
            var qty= $(this).data('qty');
            var date= $(this).data('date');
            $('#barcode').text(barcode);
            $('#item_name').text(item_name);
            $('#supplier_name').text(supplier_name);
            $('#detail').text(detail);
            $('#qty').text(qty);
            $('#date').text(date);

        })
    })
</script>