
@extends('backend.layouts.master')

{{-- Page Title --}}
@section('page_title', 'Page Edit')

{{-- Additional CSS --}}
@push('Backend_style')
<style>
    .margin{
        margin-right: 0px; !important
    }
</style>
{{-- ckeditor start --}}
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
{{-- ckeditor end --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

{{-- Main Content --}}
@section('admin_content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Page Edit</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary" title=""> <i class="fa fa-long-arrow-left"></i><span> </span> Back Page List</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Page Edit Form</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                           <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row margin" >
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="page_image" class="form-label">Page Image</label>
                                        <input type="file" name="page_image" id="page_image" class="dropify" data-default-file="{{ asset($page->page_image) }}" />
                                        @error('page_image')
                                                <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="page_title" class="form-label">Page Title</label>
                                        <input class="form-control @error('page_title') is-invalid @enderror" type="text" name="page_title" id="page_title" value="{{ $page->page_title }}" >
                                        @error('page_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="page_slug" class="form-label">Page Slug <span class=" text-danger"> (Optional) <small> example {about-us}</small></span> </label>
                                        <input class="form-control @error('page_slug') is-invalid @enderror" type="text" name="page_slug" id="page_slug" value="{{ $page->page_slug }}" >
                                        @error('page_slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_title" class="form-label">Meta Title <span class=" text-danger"> (Optional)</span></label>
                                        <input class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" id="meta_title"  value="{{ $page->meta_title }}">
                                        @error('meta_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row margin" >

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_keyword" class="form-label">Meta Keyword <span class=" text-danger"> (Optional)</span></label>
                                        <input class="form-control @error('meta_keyword') is-invalid @enderror" type="text" name="meta_keyword" id="meta_keyword" value="{{ $page->meta_keyword }}">
                                        @error('meta_keyword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description <span class=" text-danger"> (Optional)</span></label>
                                        <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" id="meta_description" cols="30" rows="1" >{{ $page->meta_description }}</textarea>
                                        @error('meta_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row margin" >
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="page_short" class="form-label">Page short description <span class=" text-danger"> (Optional)</span></label>
                                        <textarea class="form-control @error('page_short') is-invalid @enderror" name="page_short" id="page_short" cols="30" rows="3" >{{ $page->page_short }}</textarea>
                                        @error('page_short')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row margin" >
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="page_long" class="form-label">Page Long description <span class=" text-danger"> (Optional)</span></label>
                                        <textarea class="form-control @error('page_long') is-invalid @enderror" name="page_long" id="page_long" cols="30" rows="6" >{{ $page->page_long }}</textarea>
                                        @error('page_long')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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

{{-- ckeditor start --}}
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#page_short' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#page_long' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
{{-- ckeditor end --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
@endpush
