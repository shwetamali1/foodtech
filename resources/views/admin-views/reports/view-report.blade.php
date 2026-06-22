@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Business Plans</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Business Plans</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
             <div class="card">
              <!--<div class="card-header">-->
              <!--    <div class="card-title w-50"></div>-->
                  
              <!--</div>-->
              
              <div class="card-body">
                <div class="container py-5">
                  <div class="row card-box align-items-center">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" class="pdf-img">
                    </div>
                    <div class="col-md-8">
                      <div class="text-muted mb-2">Business Plan > {{$report->reports_title}} </div>
                      <h3>{{$report->reports_title}}</h3>
                      <p class="text-secondary">
                        {{ Str::limit(strip_tags($report->description), 150, '...') }}
                      </p>
                      <div class="d-flex align-items-center mb-3">
                        <div class="product-price">
                           <?php $price = str_replace('RS', '', $report->price);
                              echo number_format($price). ' RS'; ?>
                           </div>
                        <!--<div class="product-mrp">₹7500</div>-->
                      </div>
                      <!--<a href="/reports/payout/{{$report->id}}" class="btn btn-buy">Buy Now</button>-->
                      <a href="/reports/payout/{{$report->id}}" class="checkout-btn">Buy Now →</a>
                    </div>
                  </div>
                
                  <div class="card-box">
                    <div class="section-title">{{$report->reports_title}}</div>
                    <div class="content">
                      <?php echo $report->description ?>
                    </div>
                  </div>
                </div>
              </div></div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>     
     
    </div>
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

  
    @endsection
    