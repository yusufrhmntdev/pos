 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             items/
              <span> Data Barang</span>/
              <small>(Pemasok Barang)</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">items</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('item/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data item</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table-serverside">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Product_name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->barcode?><br>
                             <a href="<?php echo site_url('item/barcode_qrcode/'.$data->item_id)?>" 
                            class="btn btn-primary btn-primary btn-xs"><i class="fa fa-barcode">
                            </i>Generate</a></td>
                            <td><?php echo $data->name?></td>
                            <td><?php echo $data->category_name?></td>
                            <td><?php echo $data->unit_name?></td>
                            <td><?php echo $data->price?></td>
                            <td><?php echo $data->stock?></td>
                            <td class="text-center">
                                <?php if($data->image != null)  {?>
                                <img src="<?php echo base_url('uploads/product/'.$data->image); ?>" class="img-circle" width="100px">
                              <?php  }?>
                           </td>
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('item/edit/'.$data->item_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('item/del/'.$data->item_id)?>" class="btn btn-danger btn-xs tombol-hapus">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                            <?php } ?> -->
                    </tbody>
                </table>
            </div>
            

            </div>
    </section>
    <!-- /.content -->
    <script>$(document).ready(function() {
    $('#table-serverside').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url" : "<?php echo site_url('item/get_ajax');?>",
            "type": "POST"
        },
        "columnDefs":[{
                        "targets": [5,6],
                        "className": 'text-right'
        },{
                         "targets": [2,3,4,7,8],
                        "className": 'text-center'
        },
        {
                        
                        "targets": [0,7,-1],
                       "orderable": false
        }
    ]
    } );
} );</script>