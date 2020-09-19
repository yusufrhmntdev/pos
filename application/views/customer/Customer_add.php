 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              Add Customer
              <small>Customer</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">customer</li>
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
                    <a href="<?php echo site_url('customer');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="" method="post">
                        <div class="form-group <?php echo form_error('name') ? 'has-error' : null?>">
                            <label> name*</label>
                                <input class="form-control" type="text" name="name" value="<?php echo set_value('name');?>" placeholder="fullname">
                               <?php echo form_error('name');?></span>
                        </div>
                        <div class="form-group <?php echo form_error('gender') ? 'has-error' : null?>">
                            <label> Gender *</label>
                                <select name="gender" class="form-control">
                                    <option value="">Gender Choice</option>
                                    <option value="Boy" <?php echo set_value('gender')?> >Boy</option>
                                    <option value="Girl" <?php echo set_value('gender')?> >Girl</option>
                                </select>
                                <?php echo form_error('gender');?>
                        </div>
                        <div class="form-group <?php echo form_error('phone') ? 'has-error' : null?>">
                            <label> phone*</label>
                                <input class="form-control" type="number" name="phone" value="<?php echo set_value('phone');?>" placeholder="phone">
                                <?php echo form_error('phone');?>
                        </div>
                      
                        <div class="form-group <?php echo form_error('address') ? 'has-error' : null?>">
                            <label> address *</label>
                                <textarea name="address" value="<?php echo set_value('address');?>"class="form-control" placeholder="address"></textarea>
                                <?php echo form_error('address');?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit">
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