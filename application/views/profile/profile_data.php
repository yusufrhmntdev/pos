 <!-- Main content -->
 <section class="content">

 <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $this->fungsi->user_login()->name?></h3>
              <h5 class="widget-user-desc"><?php echo $this->fungsi->user_login()->level  == 1? "admin" :"user" ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url('uploads/user/'.$this->session->userdata('photo')); ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Username</h5>
                    <span class="description-text"><?php echo $this->fungsi->user_login()->username?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Address</h5>
                    <span class="description-text"><?php echo $this->fungsi->user_login()->address?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Phone Number</h5>
                    <span class="description-text">+62</span>
                  </div>
                  
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          <!-- <div class="row">
          <div class="col-sm-4">
          <a href="" class="btn btn-primary btn-block"><b>Change Photo</b></a>
          </div>
          <div class="form-group col-sm-8">
            <input type="file" class="form-control" name="edit_photo">
          </div>
          </div> -->
        </div>
 </section>
    <!-- /.box -->