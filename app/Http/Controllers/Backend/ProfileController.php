<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();
        // return $user;
        return view('backend.pages.profile.profile', compact('user'));
    }
}
