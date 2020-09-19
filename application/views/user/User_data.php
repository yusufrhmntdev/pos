 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
              User
              <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">User</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>

        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('user/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data user</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th class="text-center">Photo</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->username?></td>
                            <td><?php echo $data->name?></td>
                            <td><?php echo $data->address?></td>
                        <td><?php echo $data->level == 1? "admin" :"user"?></td>
                        <td class="text-center"><?php if($data->photo != null)  {?>
                                <img src="<?php echo base_url('uploads/user/'.$data->photo); ?>" class="img-circle" width="100px">
                              <?php  }?></td>
                            <td class="text-center" width="160px">
                            <form action ="<?php echo site_url('user/del')?>" method="post">    
                            <a href="<?php echo site_url('user/edit/'.$data->user_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <input type="hidden" name="user_id" value="<?php echo $data->user_id?>">
                            <button onclick ="return confirm ('apakah anda yaki menghapus')"
                            class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash">
                            </i>deleted</button>
                            </form>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            

            </div>


    
    </section>
    <!-- /.content -->