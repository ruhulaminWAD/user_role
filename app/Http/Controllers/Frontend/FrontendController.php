<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function pageShow($page_slug)
    {
        // $page = Page::where('page_slug', $page_slug)->where('is_active', 1)->firstOrFail();
        $page = Page::findBySlug($page_slug);  // Use Static Methods
        return view('page-builder', compact('page'));
    }
}
