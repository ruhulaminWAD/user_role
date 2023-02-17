
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'Permission Create')

{{-- Additional CSS --}}
@push('Backend_style')

@endpush


{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Permission Create</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('permission.index') }}" class="btn btn-sm btn-primary" title=""> <i class="fa fa-long-arrow-left"></i><span> </span> Back Permission List</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Create Permission</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('permission.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="module_id" class="form-label">Module Section</label>
                                    <select class="form-select form-control @error('module_id') is-invalid @enderror" name="module_id" id="module_id">
                                        <option selected disabled >Please Select Module</option>
                                        @foreach ($modules as $module )
                                            <option class="form-control" value="{{ $module->id }}">{{ $module->module_name }}</option>
                                        @endforeach

                                    </select>
                                    @error('module_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="permission_name" class="form-label">Permission Name</label>
                                    <input class="form-control @error('permission_name') is-invalid @enderror" type="text" name="permission_name" id="permission_name">
                                    @error('permission_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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

{{-- Additional JS --}}
@push('Backend_javaScript')

@endpush
