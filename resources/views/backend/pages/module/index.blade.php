
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'module')


{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>All Module</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('module.create') }}" class="btn btn-sm btn-primary" title="">Create Module</a>
            </div>
        </div>
    </div>

    {{-- ============= Main content ============= --}}
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Module List</h2>
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
                                        <th>Module Name</th>
                                        <th>MOdule Slug</th>
                                        <th>Last Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forelse ($modules as $module)
                                        <tr>
                                            <td style="width: 50px;"><strong>{{ $loop->index+1 }}</strong></td>
                                            <td>
                                                {{ $module->module_name }}
                                            </td>
                                            <td>
                                                <span class="phone">{{ $module->module_slug }}</span>
                                            </td>
                                            <td>
                                                <address><i class="zmdi zmdi-pin"> {{ $module->updated_at->format('d-M-Y') }}</address>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" title="Edit" href="{{ route('module.edit', $module->id) }}"><i class="fa fa-edit"></i></a>

                                                <form class="d-inline" action="{{ route('module.destroy', $module->id) }}" method="post">
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
