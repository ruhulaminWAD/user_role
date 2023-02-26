
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'Role Edit')

{{-- Additional CSS --}}
@push('Backend_style')

@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Role Edit</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('role.index') }}" class="btn btn-sm btn-primary" title=""> <i class="fa fa-long-arrow-left"></i><span> </span> Back Role List</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Role</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('role.update', $role->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="role_name" class="form-label">Role Name</label>
                                <input class="form-control @error('role_name') is-invalid @enderror" type="text" name="role_name" id="role_name" value="{{ $role->role_name }}">
                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role_note" class="form-label">Role Note <samp class="bdage badge-info">(optional)</samp></label>

                                <textarea class="form-control @error('role_note') is-invalid @enderror" name="role_note" id="role_note" cols="30" rows="3">{{ $role->role_note }}</textarea>
                                @error('role_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Permission section --}}
                            <div class="mb-2">
                                <strong class="@error('permissions') is-invalid @enderror">Manage Permissions For Role</strong>
                                {{-- Notifacation --}}
                                @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="">
                                <input type="checkbox" name="select_all" id="select_all">
                                <label for="select_all">Select All</label>
                            </div>
                            <div class="mb-3">
                                @foreach ($modules->chunk(2) as $key => $chunks)
                                <div class="row">
                                    @foreach ($chunks as $modules)
                                    <div class="col-md-6 col-sm-12" style="">
                                        <h5 class="pt-3">{{ $modules->module_name }}</h5>
                                        {{-- permissions --}}

                                        @forelse ($modules->permissions as $permission)
                                        <div class="">
                                            <input type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->id }}"
                                            @if (isset($role))
                                                @foreach ($role->permissions as $rPermission)
                                                {{ $rPermission->id ==  $permission->id ? 'checked' : ''}}
                                                @endforeach
                                            @endif
                                            >

                                            <label class="text-primary form-label" for="permission{{ $permission->id }}">{{ $permission->permission_name }}</label>
                                        </div>

                                        @empty
                                        <p class="text-danger">No Role Found</p>
                                        @endforelse
                                    </div>

                                    @endforeach
                                </div>
                                @endforeach
                            </div><hr>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
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
{{-- select all checkbox --}}
<script>
$('#select_all').click(function(event){
    if (this.checked) {
        // loop each checkbox
        $(':checkbox').each(function(){
            this.checked = true;
        });
    } else {
        // loop each checkbox
        $(':checkbox').each(function(){
            this.checked = false;
        });
    }
});
</script>
@endpush
