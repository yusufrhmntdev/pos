 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              Add user
              <small>Control Panel</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">User</li>
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
                    <a href="<?php echo site_url('user');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo form_error('fullname') ? 'has-error' : null?>">
                            <label> name*</label>
                                <input class="form-control" type="text" name="fullname" value="<?php echo set_value('fullname');?>" placeholder="fullname">
                               <?php echo form_error('fullname');?></span>
                        </div>
                        <div class="form-group <?php echo form_error('username') ? 'has-error' : null?>">
                            <label> username*</label>
                                <input class="form-control" type="text" name="username" value="<?php echo set_value('username');?>" placeholder="username">
                                <?php echo form_error('username');?>
                        </div>
                        <div class="form-group <?php echo form_error('password') ? 'has-error' : null?>">
                            <label> Password*</label>
                                <input class="form-control" type="password" name="password"  value="<?php echo set_value('password');?>" placeholder="password">
                                <?php echo form_error('password');?>
                        </div>
                        <div class="form-group <?php echo form_error('password2') ? 'has-error' : null?>">
                            <label> Password Confirm*</label>
                                <input class="form-control" type="password" name="password2" value="<?php echo set_value('password2');?>" placeholder="password confirm">
                                <?php echo form_error('password2');?>
                        </div>
                        <div class="form-group">
                            <label> Photo</label>
                                <input class="form-control" type="file" name="photo" value="">
                              
                        </div>
                        <div class="form-group <?php echo form_error('address') ? 'has-error' : null?>">
                            <label> address *</label>
                                <textarea name="address" value="<?php echo set_value('address');?>"class="form-control" placeholder="address"></textarea>
                                <?php echo form_error('address');?>
                        </div>
                        <div class="form-group <?php echo form_error('level') ? 'has-error' : null?>">
                            <label> Level *</label>
                                <select name="level" class="form-control">
                                    <option value="">Pilih Level</option>
                                    <option value="1" <?php echo set_value('level') == 1 ? "selected" : null?>>Admin</option>
                                    <option value="2" <?php echo set_value('level') == 2 ? "selected" : null?>>Kasir</option>
                                </select>
                                <?php echo form_error('level');?>
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