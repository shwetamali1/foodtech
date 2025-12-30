@extends('layouts.master')
  <style>
        .summary-card {
            color: #fff;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }

        .card-title-sm {
            font-size: 14px;
            color: #6c757d;
        }

        .highlight-text {
            font-size: 18px;
            font-weight: bold;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-pending {
            background-color: #ffcc00;
            color: #000;
        }

        .note-warning {
            color: red;
            font-weight: bold;
            font-size: 14px;
        }

        .info-icon {
            color: red;
            margin-left: 5px;
        }

        .action-buttons button {
            margin-right: 10px;
        }
        .user-card {
          border: 1px solid #dee2e6;
          border-radius: 8px;
          background-color: #fff;
          padding: 1.5rem;
          position: relative;
        }
    
        .user-card-header {
          font-weight: 600;
          color: #00b386;
          font-size: 16px;
          margin-bottom: 1rem;
        }
    
        .edit-icon {
          position: absolute;
          top: 1rem;
          right: 1rem;
          color: #00b386;
          cursor: pointer;
        }
    
        .verify-badge {
          font-size: 12px;
          padding: 2px 8px;
          border-radius: 4px;
          color: white;
          background-color: #28a745;
          margin-left: 10px;
        }
    
        .icon-success {
          color: #28a745;
        }
    
        .icon-error {
          color: red;
        }
    
        .action-buttons {
          display: flex;
          gap: 10px;
          margin-top: 1.5rem;
        }
    
        .btn-soft-success {
          background-color: #d4f4e4;
          color: #000;
        }
    
        .btn-soft-danger {
          background-color: #f8d7da;
          color: #000;
        }
    
        .user-info-item {
          margin-bottom: 0.6rem;
        }
    
        .user-info-label {
          font-weight: 500;
        }
    </style>
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Welcome to {{ $userData->email }}</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
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
              <div class="row">
            <!-- Info boxes -->
            <?php if($role_id == 8) { ?>
                
                
                <div class="row g-3 mb-4">
                    <!-- User Information -->
                    <div class="col-md-4">
                        <div class="user-card shadow-sm">
                            <div class="user-card-header">
                              Your Information
                              <i class="bi bi-pencil-square edit-icon"></i>
                            </div>
                        
                            <div class="user-info-item"><span class="user-info-label">{{ $userData->first_name }} {{ $userData->last_name }}</span></div>
                        
                            <div class="user-info-item d-flex align-items-center">
                              <span class="user-info-label">Phone:</span>
                              <span class="ms-1">{{ $userData->mobile }}</span>
                            </div>
                        
                            <div class="user-info-item d-flex align-items-center">
                              <span class="user-info-label">Email:</span>
                              <span class="ms-1">{{ $userData->email }}</span>
                              <i class="bi bi-check-circle ms-auto icon-success"></i>
                            </div>
                        
                            
                        
                            
                          </div>
                    </div>
            
                    <!-- Receiver Information -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title-sm">Your Subscription</h6>
                                <?php
                                    foreach($records as $record) {
                                        if($record->payment_plan == 'subcribe'){ 
                                ?>
                                <div class="mb-2">
                                    <p><strong>Active Plan:</strong> {{ $record->subscription_name }} </p>
                                    {{-- <p><strong>Payment ID:</strong> {{ $record->r_payment_id }}</p> --}}
                                    <p><strong>Payment Amount:</strong> {{ $record->amount }}</p>
                                    <p><strong>Payment Date:</strong> {{ $record->payment_date }}</p>
                                    <div class="user-info-item d-flex align-items-center">
                                      <span class="user-info-label">Invoice:</span>
                                      <a href="{{URL::to('/subscriptions/invoice/'.$record->r_payment_id.'/'.$record->id)}}" class=" ms-auto icon-success"><i class="bi bi-download" style="font-size: 18px;"></i></a>
                                    </div>
                                    
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
            
                    <!-- Receiver Address -->
                    <?php
                        foreach($records as $record) {
                            if($record->payment_plan == 'report'){ 
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="mb-2">
                                    <p><strong>Active Plan:</strong> {{ $record->report_title }} </p>
                                    {{-- <p><strong>Payment ID:</strong> {{ $record->r_payment_id }}</p> --}}
                                    <p><strong>Payment Amount:</strong> {{ $record->amount }}</p>
                                    <p><strong>Payment Date:</strong> {{ $record->payment_date }}</p>
                                    <div class="user-info-item d-flex align-items-center">
                                      <span class="user-info-label">Invoice:</span>
                                      <a href="{{URL::to('/subscriptions/invoice/'.$record->r_payment_id.'/'.$record->id)}}" class=" ms-auto icon-success"><i class="bi bi-download" style="font-size: 18px;"></i></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            
                
            
                <!-- Orders & Earnings -->
                <div class="card">
                    <div class="card-body">
                        <h5>Orders</h5>
            
                        <h6 class="mt-4">Rent</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="liecense_table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Payment Plan</th>
                                        <th>Liecense Title</th>
                                        {{-- <th>Payment Id</th> --}}
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        
                                        <th>Payment Date</th>
                                        <th>Invoice</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    <?php
                                          foreach($records as $record) {
                                           
                                        ?>
                                  <tr>
                                    <td>{{ $record->payment_plan }}</td>
                                    <?php if(!empty($record->subscription_name)){
                                        $title = $record->subscription_name;
                                    }else{
                                        $title = $record->report_title;
                                    }
                                    ?>
                                    <td>{{ $title }}</td>
                                    {{-- <td>{{ $record->r_payment_id }}</td> --}}
                                   	<td>{{ $record->payment_method }}/{{ $record->method }}</td>
                                    <td><?php 
                                      $price = str_replace('RS', '',  $record->amount);
                                      echo number_format($price).' RS';
                                      ?></td>
                                     
                                      <td>{{ $record->payment_date }}</td>
                                      <td>
                                        <a href="{{URL::to('/subscriptions/invoice/'.$record->r_payment_id.'/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-receipt" style="font-size: 18px;"></i></a>
                                      </td>
                                  </tr>
                                  <?php
                                          }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            <?php } else{ ?>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon text-bg-primary shadow-sm">
                        <i class="bi bi-people-fill"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">
                          <?php echo count($userList); ?>
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
                        <span class="info-box-number"><?php echo count($adminList); ?></span>
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
                        <span class="info-box-number"><?php echo count($reportList); ?></span>
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
                        <span class="info-box-number">0</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                </div>
            
            
            <hr>
            
                <table id="subscribe_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         <th>User</th>
                         <th>Email</th>
                         <th>Mobile</th>
                        <th>Plan</th>
                        <th>Liecense</th>
                        <th>Payment Id</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              foreach($subscriberecords as $record) {
                               
                            ?>
                      <tr>
                         <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                         <td>{{ $record->user_email }}</td>
                         <td>{{ $record->user_phone }}</td>
                        <td>{{ $record->payment_plan }}</td>
                        <?php if(!empty($record->subscription_name)){
                            $title = $record->subscription_name;
                        }else{
                            $title = $record->report_title;
                        }
                        ?>
                        <td>{{ $title }}</td>
                        <td>{{ $record->r_payment_id }}</td>
                       	<td>{{ $record->payment_method }}/{{ $record->method }}</td>
                        <td><?php 
                          $price = str_replace('RS', '',  $record->amount);
                          echo number_format($price).' RS';
                          ?></td>
                          <td>{{ $record->p_status }}</td>
                          <td>{{ $record->payment_date }}</td>
                      </tr>
                      <?php
                              }
                            ?>
                    </tbody>
                  </table>
            <?php } ?>
            </div>
            <!--end::Row-->
           
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
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script> -->
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <script>
      
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      /* apexcharts
       * -------
       * Here we will create a few charts using apexcharts
       */

      //-----------------------
      // - MONTHLY SALES CHART -
      //-----------------------

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 180,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#sales-chart'),
        sales_chart_options,
      );
      sales_chart.render();

      //---------------------------
      // - END MONTHLY SALES CHART -
      //---------------------------

      function createSparklineChart(selector, data) {
        const options = {
          series: [{ data }],
          chart: {
            type: 'line',
            width: 150,
            height: 30,
            sparkline: {
              enabled: true,
            },
          },
          colors: ['var(--bs-primary)'],
          stroke: {
            width: 2,
          },
          tooltip: {
            fixed: {
              enabled: false,
            },
            x: {
              show: false,
            },
            y: {
              title: {
                formatter: function (seriesName) {
                  return '';
                },
              },
            },
            marker: {
              show: false,
            },
          },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
      }

      const table_sparkline_1_data = [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54];
      const table_sparkline_2_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44];
      const table_sparkline_3_data = [15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64];
      const table_sparkline_4_data = [30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64];
      const table_sparkline_5_data = [20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64];
      const table_sparkline_6_data = [5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44];
      const table_sparkline_7_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74];

      createSparklineChart('#table-sparkline-1', table_sparkline_1_data);
      createSparklineChart('#table-sparkline-2', table_sparkline_2_data);
      createSparklineChart('#table-sparkline-3', table_sparkline_3_data);
      createSparklineChart('#table-sparkline-4', table_sparkline_4_data);
      createSparklineChart('#table-sparkline-5', table_sparkline_5_data);
      createSparklineChart('#table-sparkline-6', table_sparkline_6_data);
      createSparklineChart('#table-sparkline-7', table_sparkline_7_data);

      //-------------
      // - PIE CHART -
      //-------------

      const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
          type: 'donut',
        },
        labels: ['Chrome', 'Edge', 'FireFox', 'Safari', 'Opera', 'IE'],
        dataLabels: {
          enabled: false,
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#d63384', '#6f42c1', '#adb5bd'],
      };

      const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
      pie_chart.render();

      //-----------------
      // - END PIE CHART -
      //-----------------
    </script>
    <script>
    $(function () {
		
        $("#new_button").addClass('cssforchuji1');
        
        $('#liecense_table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
        $('#subscribe_table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      
    });
    </script>
   
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
