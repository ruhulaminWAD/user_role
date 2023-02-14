
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'module')


{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Module Edit</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('module.index') }}" class="btn btn-sm btn-primary" title=""> <i class="fa fa-long-arrow-left"></i><span> </span> Back Module List</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Module</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('module.update', $module->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="module_name" class="form-label">Module Name</label>
                                <input class="form-control" type="text" name="module_name" id="module_name" value="{{ $module->module_name }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            {{-- <input type="submit" value="Submit"> --}}
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
