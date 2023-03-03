<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('index-page');
        $pages = Page::all();
        return view('backend.pages.page-builder.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-page');
       return view('backend.pages.page-builder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        Gate::authorize('create-page');
        $page = Page::updateOrCreate([
                'page_title' => $request->page_title,
                'page_slug' => $request->page_slug ?? Str::slug($request->page_title),
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'page_short' => $request->page_short,
                'page_long' => $request->page_long,
            ]);
        $this->image_upload($request, $page->id);

        Toastr::success('Page Create Successfull');
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit-page');
        $page = Page::find($id);
        return view('backend.pages.page-builder.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        Gate::authorize('edit-page');
        $page = Page::find($id);
        $page->update([
            'page_title' => $request->page_title,
            'page_slug' => $request->page_slug ?? Str::slug($request->page_title),
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'page_short' => $request->page_short,
            'page_long' => $request->page_long,
        ]);
        $this->image_upload($request, $page->id);

        Toastr::success('Page Update Successfull');
        return redirect()->route('page.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-page');
        $page = Page::find($id);
        if ($page->page_image != NULL) {
            // delete old photo
            unlink($page->page_image);
        }
        $page->delete();
        Toastr::warning('Page Delete Successfull');
        return redirect()->back();
    }

    // check Is_active status with ajax
    public function check_is_active($page_id)
    {
        // dd($page_id);
        Gate::authorize('edit-page');
        $page = Page::find($page_id);

        if ($page->is_active == 1) {
            $page->is_active == 0;
        } else {
            $page->is_active == 1;
        }
        $page->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Update',
        ]);
    }

    // image uploaded method
    public function image_upload($request, $page_id )
    {
        $page = Page::find($page_id);

        if ($request->hasFile('page_image')) {
            // cheek it image uploaded
            if ($page->page_image != NULL) {
                // delete old photo
                unlink($page->page_image);
            }

            $uploadimage = $request->file('page_image');
            $name_gen = Str::slug($request->page_title).hexdec(uniqid()).'.'.$uploadimage->getClientOriginalExtension(); // add name
            // $name_gen = hexdec(uniqid()).'.'.$uploadimage->getClientOriginalExtension();
            Image::make($uploadimage)->resize(1200,300)->save('upload/page-builder/'.$name_gen);
            $save_img_url = 'upload/page-builder/'.$name_gen;

            $page->update([
                'page_image' => $save_img_url,
            ]);
        }
    }
}
