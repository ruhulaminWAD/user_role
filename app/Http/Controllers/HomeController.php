<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permissions = Permission::select('permission_slug')->get();

        $permission = 'access-dashboard';
        // Gate::authorize('access-dashboard'); // authorize this user access/give access to admin dashboard
        // return view('home');

        $users = User::with('role:id,role_name,role_slug')
        ->select('id', 'role_id', 'name', 'email', 'is_active', 'updated_at')
        ->latest()->get();

        return view('backend.pages.dashboard', compact('users'));
    }
}
