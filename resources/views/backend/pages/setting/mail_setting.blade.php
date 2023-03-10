
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', '
Mail Setting')

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
                <h2>Mail Setting</h2>
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
                        <h2>Mail Setting Form</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('settings.mail.update') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="mail_mailer" class="form-label">Mail Mailer</label>
                                <input class="form-control @error('mail_mailer') is-invalid @enderror" type="text" name="mail_mailer" id="mail_mailer" placeholder="Enter Mail Mailer" value="{{ setting('mail_mailer') }}">
                                @error('mail_mailer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_host" class="form-label">Mail Host</label>
                                <input class="form-control @error('mail_host') is-invalid @enderror" type="text" name="mail_host" id="mail_host" placeholder="Enter Mail Host" value="{{ setting('mail_host') }}">
                                @error('mail_host')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_port" class="form-label">Mail Port</label>
                                <input class="form-control @error('mail_port') is-invalid @enderror" type="text" name="mail_port" id="mail_port" placeholder="Enter Mail Port" value="{{ setting('mail_port') }}">
                                @error('mail_port')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_username" class="form-label">Mail Username</label>
                                <input class="form-control @error('mail_Username') is-invalid @enderror" type="text" name="mail_username" id="mail_username" placeholder="Enter Mail Username" value="{{ setting('mail_username') }}">
                                @error('mail_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_password" class="form-label">Mail Password</label>
                                <input class="form-control @error('mail_password') is-invalid @enderror" type="text" name="mail_password" id="mail_password" placeholder="Enter Mail Password" value="{{ setting('mail_password') }}">
                                @error('mail_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_encryption" class="form-label">Mail Encryption</label>
                                <input class="form-control @error('mail_encryption') is-invalid @enderror" type="text" name="mail_encryption" id="mail_encryption" placeholder="Enter Mail Encryption" value="{{ setting('mail_encryption') }}">
                                @error('mail_encryption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail_form_address" class="form-label">Mail Form Address</label>
                                <input class="form-control @error('mail_form_address') is-invalid @enderror" type="text" name="mail_form_address" id="mail_form_address" placeholder="Enter Mail Form Address" value="{{ setting('mail_form_address') }}">
                                @error('mail_form_address')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
@endpush
