 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
              Dashboard
              <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
              <li class="active">Dashboard</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $this->fungsi->count_item();?></h3>

                          <p>Items</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="<?php echo site_url('item')?>" class="small-box-footer">Items <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $this->fungsi->count_supplier();?><sup style="font-size: 20px"></sup></h3>

                          <p>Suppliers</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-truck"></i>
                        </div>
                        <a href="<?php echo site_url('supplier')?>" class="small-box-footer">Suppliers <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?php echo $this->fungsi->count_user();?></h3>

                          <p>User</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user-plus"></i>
                        </div>
                        <a href="<?php echo site_url('user')?>" class="small-box-footer">User <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><?php echo $this->fungsi->count_customer();?></h3>

                          <p>Customers</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo site_url('customer')?>" class="small-box-footer">Customer <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
    </section>
    <!-- /.content -->