@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-people-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">
                      10
                     
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-danger shadow-sm">
                    <i class="bi bi-people-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Admins</span>
                    <span class="info-box-number">10</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <!-- fix for small devices only -->
              <!-- <div class="clearfix hidden-md-up"></div> -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-cart-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Reports</span>
                    <span class="info-box-number">10</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-warning shadow-sm">
                    <i class="bi bi-people-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Licenses</span>
                    <span class="info-box-number">50</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Monthly Recap Report</h5>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <div class="btn-group">
                        <button
                          type="button"
                          class="btn btn-tool dropdown-toggle"
                          data-bs-toggle="dropdown"
                        >
                          <i class="bi bi-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" role="menu">
                          <a href="#" class="dropdown-item">Action</a>
                          <a href="#" class="dropdown-item">Another action</a>
                          <a href="#" class="dropdown-item"> Something else here </a>
                          <a class="dropdown-divider"></a>
                          <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                      <div class="col-md-12">
                        <p class="text-center">
                          <strong>Sales: 1 Jan, 2023 - 30 Jul, 2023</strong>
                        </p>
                        <div id="sales-chart"></div>
                      </div>
                      <!-- /.col -->
                      
                      <!-- /.col -->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!-- ./card-body -->
                  <div class="card-footer">
                    <!--begin::Row-->
                    <div class="row">
                      <div class="col-md-3 col-6">
                        <div class="text-center border-end">
                          <span class="text-success">
                            <i class="bi bi-caret-up-fill"></i> 17%
                          </span>
                          <h5 class="fw-bold mb-0">$35,210.43</h5>
                          <span class="text-uppercase">TOTAL REVENUE</span>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-6">
                        <div class="text-center border-end">
                          <span class="text-info"> <i class="bi bi-caret-left-fill"></i> 0% </span>
                          <h5 class="fw-bold mb-0">$10,390.90</h5>
                          <span class="text-uppercase">TOTAL COST</span>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-6">
                        <div class="text-center border-end">
                          <span class="text-success">
                            <i class="bi bi-caret-up-fill"></i> 20%
                          </span>
                          <h5 class="fw-bold mb-0">$24,813.53</h5>
                          <span class="text-uppercase">TOTAL PROFIT</span>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-6">
                        <div class="text-center">
                          <span class="text-danger">
                            <i class="bi bi-caret-down-fill"></i> 18%
                          </span>
                          <h5 class="fw-bold mb-0">1200</h5>
                          <span class="text-uppercase">GOAL COMPLETIONS</span>
                        </div>
                      </div>
                    </div>
                    <!--end::Row-->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
           
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
