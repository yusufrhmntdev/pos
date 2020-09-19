 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              Add item
              <small>item</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">item</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>

        <div class ="box">
            <div class="box-header">
            <h1 class="box-title"> </h1>
                <div class="pull-right">
                    <a href="<?php echo site_url('item');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    <!-- //form action//--> <?php echo form_open_multipart('item/proses')?>
                        <div class="form-group"> 
                            <label> barcode*</label>
                            <input type="hidden" name="item_id" value="<?php echo $row->item_id?>">
                                <input class="form-control" type="text" name="barcode" value="<?php echo $kode;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Product name*</label>
                                <input class="form-control" type="text" name="product_name"  value="<?php echo $row->name;?>"  placeholder="fullname" required="">
                        </div>
                        <div class="form-group">
                            <label>Category *</label>
                            <select name="category" class="form-control" required="" id="category">
                                <option value="">- Pilih -</option>
                                <?php foreach($category->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->category_id?>"<?php echo $data->category_id == $row->category_id ? "selected" : null?>><?php echo $data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>unit *</label>
                                <?php echo form_dropdown('unit',$unit,$selectedunit,['class'=> 'form-control unit','required'=>'required'])?>
                        </div>
                        <div class="form-group">
                            <label> price*</label>
                                <input class="form-control" type="number" name="price" value="<?php echo $row->price;?>"  placeholder="price" required="">
                        </div>
                        <div class="form-group">
                            <label> image*</label>
                            <?php if($page =='edit'){
                                if($row->image != null) {?> 
                            <div style="margin-bottom: 4px">
                            <img src="<?php echo base_url('uploads/product/'.$row->image); ?>" class="img-circle" width="100px">
                            </div>
                                <?php } 
                                }?>
                                <input class="form-control" type="file" name="image" value="<?=$kode;?>"  placeholder="image">
                                <small style="color:red"> (biarkan kosong jika tidak <?php echo $page =='edit' ? 'diganti' :'ada'?>)</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit" name="<?php echo $page?>">
                                <i class="fa fa-paper-plane">
                                Save</i></button>
                            <button class="btn btn-danger btn-flat" type="reset">
                            <i class="fa fa-trash">
                                Reset</i></button>
                         </div>
                         <?php echo form_close()?>
                </div>
            </div>
            </div>
    </section>
    <script>
            $(document).ready(function () {
                $("#category").select2({
                    placeholder: "Pilih category",
                    allowClear: true
                    
                });
                
                
            });
            $(document).ready(function () {
                $(".unit").select2({
                    placeholder: "Pilih unit",
                    allowClear: true
                    
                });
                
                
            });
                </script>
    <!-- /.content -->