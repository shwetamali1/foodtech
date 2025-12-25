@extends('layouts.master')

@section('content')

<!-- Page Header -->
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">My Feature Documents</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">My Feature Documents</li>
        </ol>
    </div>
</div>

<!-- Main content -->
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Downloaded Features</h3>
                    </div>

                    <div class="card-body">
                        <table id="feature_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subscription</th>
                                    <th>Feature Text</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $key => $doc)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $doc->subscription_name ?? 'N/A' }}</td>
                                        <td>{{ $doc->feature_text }}</td>
                                        <td>{{ $doc->original_name }}</td>
                                        <td>
                                            <a href="{{ route('feature.documents.download', $doc->id) }}"
                                               class="btn btn-sm btn-success">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No feature documents found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ URL::asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>

<script>
    $(function () {
        $('#feature_table').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>

@endsection
