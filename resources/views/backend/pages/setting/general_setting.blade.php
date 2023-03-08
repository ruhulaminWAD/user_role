
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'General Setting')

{{-- Additional CSS --}}
@push('Backend_style')

@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>General Setting</h2>
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
                        <h2>General Setting Create Form</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('settings.general.update') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="site_title" class="form-label">Site Title</label>
                                <input class="form-control @error('site_title') is-invalid @enderror" type="text" name="site_title" id="site_title" value="{{ setting('site_title') }}">
                                @error('site_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_address" class="form-label">Site Address</label>
                                <textarea class="form-control @error('site_address') is-invalid @enderror" name="site_address" id="site_address" cols="30" rows="2">{{ setting('site_address') }}</textarea>
                                @error('site_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_phone_number" class="form-label">Site Phone Number</label>
                                <input class="form-control @error('site_phone_number') is-invalid @enderror" type="phone" name="site_phone_number" id="site_phone_number" value="{{ setting('site_phone_number') }}">
                                @error('site_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_facebook_link" class="form-label">Site Facebook Link</label>
                                <input class="form-control @error('site_facebook_link') is-invalid @enderror" type="text" name="site_facebook_link" id="site_facebook_link" value="{{ setting('site_facebook_link') }}">
                                @error('site_facebook_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_twitter_link" class="form-label">Site Twitter Link</label>
                                <input class="form-control @error('site_twitter_link') is-invalid @enderror" type="text" name="site_twitter_link" id="site_twitter_link" value="{{ setting('site_twitter_link') }}">
                                @error('site_twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_instagram_link" class="form-label">Site Instagram Link</label>
                                <input class="form-control @error('site_instagram_link') is-invalid @enderror" type="text" name="site_instagram_link" id="site_instagram_link" value="{{ setting('site_instagram_link') }}">
                                @error('site_instagram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="site_description" class="form-label">Site Description</label>
                                <textarea class="form-control @error('site_description') is-invalid @enderror" name="site_description" id="site_description" cols="30" rows="4">{{ setting('site_description') }}</textarea>
                                @error('site_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

@endpush
