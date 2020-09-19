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
                  <!-- Small boxes (Stat box) -->

        <div class ="box">
            <div class="box-header">
            <h1 class="box-title">  Add Stock In</h1>
            <small> (Tambah barang masuk)</small>
                <div class="pull-right">
                    <a href="<?php echo site_url('stock/in');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('stock/proses')?>" method="post">
                        <div class="form-group">
                            <label> Date*</label>
                                <input class="form-control" type="date"  value ="<?php echo date('Y-m-d')?>" name="date" placeholder="date" required="">
                        </div>
                        <div>
                            <label for="barcode">*Barcode</label>
                        </div>
                        <div class="form-group input-group">     
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" required="" autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label> *Item Name</label>
                                <input class="form-control" type="text"  name="item_name" id="item_name" placeholder="Item name" readonly>
                        </div>
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-8">
                                  <label for="item_unit"> *Item Unit</label>
                                  <input type="text" name="unit_name" id="unit_name"  placeholder=" Item iunit " class="form-control" readonly>
                              </div>
                              <div class="col-md-4">
                                  <label for="stock"> *Initial Stock</label>
                                  <input type="text" name="stock" id="stock"  placeholder=" Stock " class="form-control" readonly>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="detail"> *detail</label>
                            <textarea name="detail"  id="detail"class="form-control" placeholder="detail" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Supplier *</label>
                            <select name="supplier" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php foreach($supplier->result() as $i =>$data){
                                    echo '<option value ="'.$data->supplier_id.'">'.$data->name.'</option>';
                                }?>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=" Qty"> *Qty </label>
                            <small style="color:red"> (jumlah)</small>
                                <input class="form-control" type="text"  value ="" name="qty" id="qty " placeholder="Kuantitas " required>
                        </div>
                        
                    <br>

                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit" name="in_add">
                                <i class="fa fa-paper-plane">
                                Save</i></button>
                            <button class="btn btn-danger btn-flat" type="reset">
                            <i class="fa fa-trash">
                                Reset</i></button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
         </div>
    </section>
    <div class="modal fade" id="modal-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Select Product Item</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th> Barcode</th>
                                <th> Name </th>
                                <th> Unit </th>
                                <th> Price </th>
                                <th> Stock </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($item->result() as $i => $data) { ?>
                        <tr>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->unit_name?></td>
                            <td><?=indo_currency($data->price)?>.</td>
                            <td class="text-center"><?=$data->stock?></td>
                            <td>
                                <button class="btn btn-xs btn-info" id="select" 
                                        data-item_id="<?=$data->item_id?>"
                                        data-barcode="<?=$data->barcode?>"
                                        data-name="<?=$data->name?>"
                                        data-unit_name="<?=$data->unit_name?>"
                                        data-stock="<?=$data->stock?>" >
                                    <i class="fa fa-check"></i>Select
                                </button>
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function() {
            var item_id= $(this).data('item_id');
            var barcode= $(this).data('barcode');
            var name= $(this).data('name');
            var unit_name= $(this).data('unit_name');
            var stock= $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');

        })
    })
</script>
    
   