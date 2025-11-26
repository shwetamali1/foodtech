@extends('layouts.master')
<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">User View</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User View</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->
    </div>
    <!--end::Container-->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ URL::asset('assets/img/avatar5.png') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $editRec->first_name }} {{ $editRec->last_name }}
                            </h3>

                            <p class="text-muted text-center">{{ $editRec->email }}</p>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">User Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="bi bi-phone mr-1"></i> Contact</strong>

                            <p class="text-muted">
                                {{ $editRec->email }}
                            </p>
                            <p class="text-muted">
                                {{ $editRec->mobile }}
                            </p>

                            <hr>

                            <strong><i class="bi bi-map mr-1"></i> Location</strong>

                            <p class="text-muted">
                                {{ $editRec->country }}
                            </p>
                            <p class="text-muted">
                                {{ $editRec->state }}
                            </p>
                            <p class="text-muted">
                                {{ $editRec->city }}
                            </p>

                            <hr>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">

                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="active nav-link" href="#subscription"
                                        data-bs-toggle="tab">Subscriptions</a></li>
                                <li class="nav-item"><a class="nav-link" href="#udocument" data-bs-toggle="tab">User
                                        Uploaded Document</a></li>
                                <li class="nav-item"><a class="nav-link" href="#adocument" data-bs-toggle="tab">Admin
                                        Uploaded Document</a></li>
                                <li class="nav-item"><a class="nav-link" href="#fdocument" data-bs-toggle="tab">Final
                                        Documents</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">


                                <!-- /.tab-pane -->
                                <div class="active tab-pane" id="subscription">
                                    <table id="notification_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Liecense</th>
                                                <th>Plan</th>
                                                <th>Method</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                  foreach($subscriptions as $record) {
                                   
                                ?>
                                            <tr>
                                                <?php if (!empty($record->subscription_name)) {
                                                    $title = $record->subscription_name;
                                                } else {
                                                    $title = $record->report_title;
                                                }
                                                ?>
                                                <td>{{ $title }}</td>
                                                <td>{{ $record->payment_plan }}</td>
                                                <td>{{ $record->payment_method }}/{{ $record->method }}</td>
                                                <td><?php
                                                $price = str_replace('RS', '', $record->amount);
                                                echo number_format($price) . ' RS';
                                                ?></td>
                                                <td>{{ $record->payment_date }}</td>
                                            </tr>
                                            <?php
                                  }
                                ?>
                                        </tbody>
                                    </table>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="udocument">
                                    <div class="container mt-4">
                                        <div class="row">
                                            <!-- Image Card 1 -->
                                            <?php if(!empty($documents)){ 
                            foreach ($documents as $document) { 
                            if($document->uploaded_by !=1) { ?>
                                            <div class="col-md-3 col-sm-6 mb-4">
                                                <div class="card">
                                                    <?php if(!empty($document->uploaded_file)) {
                          
                                  $filenames = json_decode($document->uploaded_file, true);
                                  if ($filenames && is_array($filenames)) {
                                  foreach($filenames as $file){
                                  ?>
                                                    <img src="{{ asset('images/' . $file) }}"
                                                        class="card-img-top img-fluid" alt="{{ $file }}">
                                                    <hr>
                                                    <div class="card-body">
                                                        <p class="card-text text-center">{{ $document->document }}</p>
                                                        <a href="{{ route('documents.download-file', ['filename' => $file]) }}"
                                                            class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                                            <i class="bi bi-download"></i> Download
                                                        </a>

                                                    </div>
                                                    <?php }  } } ?>
                                                </div>
                                            </div>
                                            <?php } } } ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="adocument">
                                    <div class="container mt-4">
                                        <div class="row">
                                            <!-- Image Card 1 -->
                                            <?php if(!empty($documents)){ 
                            foreach ($documents as $document) { 
                            if($document->uploaded_by == '1') { ?>
                                            <div class="col-md-3 col-sm-6 mb-4">
                                                <div class="card">
                                                    <?php if(!empty($document->uploaded_file)) {
                          
                                  $filenames = json_decode($document->uploaded_file, true);
                                  if ($filenames && is_array($filenames)) {
                                  foreach($filenames as $file){
                                  ?>
                                                    <img src="{{ asset('images/' . $file) }}"
                                                        class="card-img-top img-fluid" alt="{{ $file }}">
                                                    <hr>
                                                    <div class="card-body">
                                                        <p class="card-text text-center">{{ $document->document }}</p>
                                                        <a href="{{ route('documents.download-file', ['filename' => $file]) }}"
                                                            class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                    <?php } } } ?>
                                                </div>
                                            </div>
                                            <?php } } } ?>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="fdocument">

                                    {{-- Success message --}}
                                    @if (session('success'))
                                        <div class="alert alert-success" style="margin-bottom:10px;">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:60px;">#</th>
                                                <th>Feature</th>
                                                <th style="width:280px;">Upload / Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $printedSignatures = [];
                                                $globalIndex = 1;
                                            @endphp


                                            @if (empty($subscriptions) || !is_iterable($subscriptions))
                                                <tr>
                                                    <td colspan="3">No feature records found.</td>
                                                </tr>
                                            @else
                                                @forelse ($subscriptions as $record)
                                                    @php
                                                        // Handle both array and object
                                                        $rawFeatures = is_array($record)
                                                            ? $record['features'] ?? ''
                                                            : $record->features ?? '';

                                                        $subName = is_array($record)
                                                            ? $record['subscription_name'] ?? ''
                                                            : $record->subscription_name ?? '';

                                                        $subId = is_array($record)
                                                            ? $record['subscription_id'] ?? ($record['id'] ?? '')
                                                            : $record->subscription_id ?? ($record->id ?? '');

                                                        $userId = is_array($record)
                                                            ? $record['user_id'] ?? ''
                                                            : $record->user_id ?? '';
                                                    @endphp

                                                    @continue(empty($rawFeatures))


                                                    {{-- Parse feature lines --}}
                                                    @php
                                                        $decoded = json_decode($rawFeatures, true);
                                                        $lines = [];

                                                        if (
                                                            json_last_error() === JSON_ERROR_NONE &&
                                                            is_array($decoded)
                                                        ) {
                                                            foreach ($decoded as $item) {
                                                                if (is_array($item)) {
                                                                    $item = implode("\n", $item);
                                                                }
                                                                $parts = preg_split("/\r\n|\r|\n/", (string) $item);
                                                                foreach ($parts as $p) {
                                                                    $p = trim($p);
                                                                    if ($p !== '') {
                                                                        $lines[] = $p;
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            $parts = preg_split("/\r\n|\r|\n/", (string) $rawFeatures);
                                                            foreach ($parts as $p) {
                                                                $p = trim($p);
                                                                if ($p !== '') {
                                                                    $lines[] = $p;
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    @continue(empty($lines))


                                                    {{-- Avoid printing duplicate feature bundles --}}
                                                    @php
                                                        $bundleSignature = md5(implode("\n", $lines));
                                                    @endphp

                                                    @if (in_array($bundleSignature, $printedSignatures, true))
                                                        @continue
                                                    @endif

                                                    @php
                                                        $printedSignatures[] = $bundleSignature;
                                                    @endphp


                                                    {{-- Subscription name row --}}
                                                    @if (!empty($subName))
                                                        <tr>
                                                            <td colspan="3"><strong>{{ $subName }}</strong></td>
                                                        </tr>
                                                    @endif


                                                    {{-- Feature loop --}}
                                                    @foreach ($lines as $line)
                                                        @php
                                                            // NORMALIZE feature text consistently
                                                            $normalizedFeature = preg_replace(
                                                                '/\s+/',
                                                                ' ',
                                                                strtolower(trim($line)),
                                                            );
                                                            $featureSignature = md5($normalizedFeature);

                                                            // Query existing document
                                                            $docQuery = \App\Models\FeatureDocument::where(
                                                                'subscription_id',
                                                                $subId,
                                                            )->where('feature_signature', $featureSignature);

                                                            if (!empty($userId)) {
                                                                $docQuery->where('user_id', $userId);
                                                            } else {
                                                                $docQuery->whereNull('user_id');
                                                            }

                                                            $existingDoc = $docQuery->first();

                                                            $rowId = 'feature_' . $globalIndex;
                                                        @endphp

                                                        <tr>
                                                            <td>{{ $globalIndex }}</td>
                                                            <td>{{ $line }}</td>

                                                            <td>
                                                                <form class="upload-form" method="POST"
                                                                    action="{{ route('feature-documents.upload') }}"
                                                                    enctype="multipart/form-data"
                                                                    data-rowid="{{ $rowId }}">
                                                                    @csrf

                                                                    <input type="hidden" name="subscription_id"
                                                                        value="{{ $subId }}">
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $userId }}">
                                                                    <input type="hidden" name="feature_signature"
                                                                        value="{{ $featureSignature }}">
                                                                    <input type="hidden" name="feature_text"
                                                                        value="{{ $normalizedFeature }}">

                                                                    <div
                                                                        style="display:flex; gap:6px; align-items:center;">

                                                                        <input type="file" name="document"
                                                                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                                                            style="flex:1;">

                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-primary">
                                                                            {{ $existingDoc ? 'Update' : 'Upload' }}
                                                                        </button>

                                                                        @if ($existingDoc)
                                                                            <a href="{{ asset('storage/' . $existingDoc->file_path) }}"
                                                                                target="_blank"
                                                                                style="white-space:nowrap; font-size:12px;">
                                                                                View / Preview
                                                                            </a>
                                                                        @endif
                                                                    </div>

                                                                    <div class="upload-status"
                                                                        id="{{ $rowId }}_status"
                                                                        style="margin-top:4px; font-size:12px;"></div>

                                                                </form>
                                                            </td>
                                                        </tr>

                                                        @php $globalIndex++; @endphp
                                                    @endforeach

                                                @empty
                                                    <tr>
                                                        <td colspan="3">No feature records found.</td>
                                                    </tr>
                                                @endforelse


                                                @if ($globalIndex === 1)
                                                    <tr>
                                                        <td colspan="3">No feature records found after parsing.</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        </tbody>
                                    </table>

                                </div>



                                <!-- /.tab-pane -->
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <div class="modal fade" id="notification_model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Notification Details</h4>

                </div>
                <div class="modal-body">
                    <p id="notification_detils"></p>
                    <p id="notification_date"></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    < <script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
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
    <script>
        $(function() {

            $("#new_button").addClass('cssforchuji1');

            $('#notification_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });

        function click_new(url) {
            window.location.href = url;
        }

        function notification(id) {
            $.ajax({
                url: 'getNotification',
                method: 'post',
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#notification_detils").html(response.notification);
                    $("#notification_date").html(response.sent_date);
                    //	$("#notification_model").modal();
                    var myModal = new bootstrap.Modal(document.getElementById('notification_model'));
                    myModal.show();
                }
            });
        }
    </script>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
@endsection
