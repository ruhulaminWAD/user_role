
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'General Setting')

{{-- Additional CSS --}}
@push('Backend_style')
<style>
    .margin{
        margin-right: 0px; !important
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Apperance Setting</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('home') }}" class="btn btn-sm btn-primary" title=""> <i class="fa fa-long-arrow-left"></i><span> </span> Back To Dashboard</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Apperance Setting Create Form</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('settings.apperance.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <label for="bg_color" class="form-label">Site Background Color</label>
                                <input class="form-control @error('bg_color') is-invalid @enderror" type="text" name="bg_color" id="bg_color" value="{{ setting('bg_color') }}">
                                @error('bg_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row margin">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="logo_image" class="form-label">Upload Logo</label>
                                        <input type="file" name="logo_image" id="logo_image" class="dropify" data-default-file="{{ setting('logo_image') !=null ? Storage::url(setting('logo_image')) : ''  }}" />
                                        @error('logo_image')
                                                <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="favicon_image" class="form-label">Upload Favicon ( 33 X 33 )</label>
                                        <input type="file" name="favicon_image" id="favicon_image" class="dropify" data-default-file="{{ setting('favicon_image') !=null ? Storage::url(setting('favicon_image')) : ''  }}" />
                                        @error('favicon_image')
                                                <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Save</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
@endpush
