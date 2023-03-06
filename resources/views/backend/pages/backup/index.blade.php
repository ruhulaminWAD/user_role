
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'Backup Index')

{{-- Additional CSS --}}
@push('Backend_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>All User</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button type="button" class="btn btn-sm btn-primary" title="" onclick="event.preventDefault(); document.getElementById('new-backup-form').submit();">Backup Create</button>
                <form action="{{ route('backup.store') }}" method="post" id="new-backup-form"> @csrf </form>
            </div>
        </div>
    </div>

    {{-- ============= Main content ============= --}}
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Backup List</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Last Update</th>
                                        <th>File Name</th>
                                        <th>File Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forelse ($backups as $backup)
                                        <tr>
                                            <td style="width: 50px;"><strong>{{ $loop->index + 1 }}</strong></td>
                                            <td>
                                                <address><i class="zmdi zmdi-pin"> {{ $backup['created_at'] }}</address>
                                            </td>
                                            <td>
                                                {{ $backup['file_name'] }}
                                            </td>
                                            <td>
                                                <span class="phone">{{ $backup['file_size'] }}</span>
                                            </td>

                                            <td>
                                                <a class="btn btn-info" title="Edit" href="{{ route('backup_download', $backup['file_name']) }}"><i class="fa fa-download"></i></a>

                                                <form class="d-inline" action="{{ route('backup.destroy', $backup['file_name']) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="" type="submit" data-type="confirm" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                        @empty

                                        @endforelse


                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

{{-- Additional JS --}}
@push('Backend_javaScript')
<script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    // start data filter
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
    // end data filter

</script>
@endpush


{{-- url: "{{  url('/subsubcategory/getsubcategory/ajax') }}/"+category_id, --}}
