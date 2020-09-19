 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <?=ucfirst($page)?> supplier </h3>
              <small>Pemasok barang</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">Supplier</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
                  <!-- Small boxes (Stat box) -->

        <div class ="box">
            <div class="box-header">
            <h1 class="box-title"> </h1>
                <div class="pull-right">
                    <a href="<?php echo site_url('supplier');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('supplier/proses')?>" method="post">
                        <div class="form-group">
                            <label> Supplier name*</label>
                            <input type="hidden" name="supplier_id" value="<?=$row->supplier_id?>">
                                <input class="form-control" type="text" name="name" value="<?php echo $row->name;?>" placeholder="fullname" required="">
                        </div>
                        <div class="form-group">
                            <label> phone*</label>
                                <input class="form-control" type="number" name="phone" value="<?php echo $row->phone;?>" placeholder="phone" required="">
                               
                      
                        <div class="form-group">
                            <label> address *</label>
                                <textarea name="address" class="form-control" placeholder="address" required=""><?php echo $row->address?></textarea>
                                
                        </div>
                        
                        <div class="form-group">
                        <label> description *</label>
                                <textarea name="description" class="form-control" placeholder="description" required=""><?php echo $row->description?></textarea>
                               
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit" name="<?php echo $page?>">
                                <i class="fa fa-paper-plane">
                                Save</i></button>
                            <button class="btn btn-danger btn-flat" type="reset">
                            <i class="fa fa-trash">
                                Reset</i></button>

                    </div>
                </div>
            </div>
            </div>
    </section>
    <!-- /.content -->