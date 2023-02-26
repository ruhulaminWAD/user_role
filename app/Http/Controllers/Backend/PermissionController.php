<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('index-role'); // authorize this user access/give access to permission
        $permissions = Permission::with('module:id,module_name,module_slug')->select('id', 'module_id', 'permission_name', 'permission_slug', 'updated_at')->latest()->get();
        // return $permissions;
        return view('backend.pages.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-role'); // authorize this user access/give access to permission
        $modules = Module::select('id', 'module_name')->get();
        return view('backend.pages.permission.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        Gate::authorize('create-role'); // authorize this user access/give access to permission
        Permission::updateOrCreate([
            'module_id' => $request->module_id,
            'permission_name' => $request->permission_name,
            'permission_slug' => Str::slug($request->permission_name),
        ]);
        Toastr::success('Permission Create  Successfull');
        return redirect()->route('permission.index');
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
    {Gate::authorize('edit-role'); // authorize this user access/give access to permission
        $modules = Module::select('id', 'module_name')->get();
        $permission = Permission::find($id);
        return view('backend.pages.permission.edit', compact('modules', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionStoreRequest $request, $id)
    {
        Gate::authorize('edit-role'); // authorize this user access/give access to permission
        Permission::find($id)->update([
            'module_id' => $request->module_id,
            'permission_name' => $request->permission_name,
            'permission_slug' => Str::slug($request->permission_name),
        ]);
        Toastr::success('Permission Update Successfull');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-role'); // authorize this user access/give access to permission
        Permission::find($id)->delete();
        Toastr::warning('Permission Delete Successfull');
        return redirect()->back();
    }
}
