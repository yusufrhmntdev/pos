 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              Edit user
              <small>Control Panel</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active"> Edit User</li>
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

                    <form action="" method="post">
                        <div class="form-group <?php echo form_error('fullname') ? 'has-error' : null?>">
                            <label> name</label>
                                <input type="hidden" name="user_id" value="<?php echo $row->user_id?>">
                                <input class="form-control" type="text" name="fullname" value="<?php echo $this->input->post('fullname') ?? $row->name?> " placeholder="fullname">
                               <?php echo form_error('fullname');?></span>
                        </div>
                        <div class="form-group <?php echo form_error('username') ? 'has-error' : null?>">
                            <label> username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $this->input->post('username') ?? $row->username?> "  placeholder="username">
                                <?php echo form_error('username');?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                            <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" name="password" value="<?php echo $this->input->post('password')?>" class="form-control">
                            <?php echo form_error('password')?>
                        </div>
                        <div class="form-group <?=form_error('password2') ? 'has-error' : null?>">
                            <label>Password Confirmation</label>
                            <input type="password" name="password2" value="<?php echo $this->input->post('password2')?>" class="form-control">
                            <?php echo form_error('password2')?>
                        </div>
                        <div class="form-group <?=form_error('address') ? 'has-error' : null?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?=$this->input->post('address') ?? $row->address?></textarea>
                            <?=form_error('address')?>
                        </div>
                        <div class="form-group <?php echo form_error('level') ? 'has-error' : null?>">
                            <label> Level *</label>
                                <select name="level" class="form-control">
                                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level?>
                                    <option value="1">Admin</option>
                                    <option value="2" <?php echo $level == 2 ? 'selected' : null ?>>Kasir</option>
                                </select>
                                <?php echo form_error('level');?>
                        </div>
                       
                        <div class="form-group">
                            <label> image*</label>
                            <?php 
                                if($row->photo != null) {?> 
                            <div style="margin-bottom: 4px">
                            <img src="<?php echo base_url('uploads/user/'.$row->photo); ?>" class="img-circle" width="100px">
                            </div>
                                <?php 
                                }?>
                                <input class="form-control" type="file" name="photo" value="<?=$row->photo;?>">
                                <small style="color:red"> (biarkan kosong jika tidak ada)</small>
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