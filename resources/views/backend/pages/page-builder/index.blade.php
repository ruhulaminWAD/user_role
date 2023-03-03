
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'Pages Builder')

{{-- Additional CSS --}}
@push('Backend_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>All Pages</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('page.create') }}" class="btn btn-sm btn-primary" title="">Create Page</a>
            </div>
        </div>
    </div>

    {{-- ============= Main content ============= --}}
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Pages List</h2>
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
                            <table class="table table-hover m-b-0 c_list" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Last Update</th>
                                        <th>Page Title</th>
                                        <th>Meta Title</th>
                                        <th>Meta Keywords</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forelse ($pages as $page)
                                        <tr>
                                            <td style="width: 50px;"><strong>{{ $loop->index+1 }}</strong></td>
                                            <td>
                                                <address><i class="zmdi zmdi-pin"> {{ $page->updated_at->format('d-M-Y') }}</address>
                                            </td>
                                            <td>
                                                {{ $page->page_title }}
                                            </td>
                                            <td>
                                                <span class="phone">{{ $page->meta_title }}</span>
                                            </td>
                                            <td>
                                                <span class="phone">{{ $page->meta_keyword }}</span>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input toggle-class" role="switch" data-id="{{ $page->id }}" id="page-{{ $page->id }}" {{ $page->is_active ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="page-{{ $page->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" title="Edit" href="{{ route('page.edit', $page->id) }}"><i class="fa fa-edit"></i></a>

                                                <form class="d-inline" action="{{ route('page.destroy', $page->id) }}" method="post">
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

    // start status ajax
    $(document).ready(function(){
        $('.toggle-class').change(function(){
            var is_active = $(this).prop('checked') == true ? 1 : 0;
            var page_id = $(this).data('id');
            // console.log(is_active, page_id);       //for debug purpose

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/admin/page/is_active/'+page_id,
                success: function(response){
                    console.log(response);
                    Swal.fire(
                        response.message,
                        response.message,
                        response.type,
                    )
                },
                error:function(error){
                    if (error) {
                        console.log(error);
                    }
                }
            });
        });
    });
    // end status ajax
</script>
@endpush


{{-- url: "{{  url('/subsubcategory/getsubcategory/ajax') }}/"+category_id, --}}
