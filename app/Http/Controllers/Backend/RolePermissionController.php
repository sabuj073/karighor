<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->where('id','!=',1)->orderBy('id', 'desc')->paginate(20);
        return view('backend.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('backend.role.create', compact('permissions'));
    }
    // store permission
    public function permissionStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Permission::create([
            'name' => $request->name,
        ]);
        Toastr::success("Permission Create Successful",'Success');
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);
        $roleId = Role::create([
            'name' => $request->name,
        ]);
        $roleId->givePermissionTo($request->permission);
        Toastr::success("Role Create Successful",'Success');
        return back();
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('backend.role.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, $id){
        $role= Role::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        
        $role->permissions()->sync($request->permission);
        Toastr::success("Role Update Successful",'Success');
        return redirect(route('backend.role.index'));
    }

    public function permDelete($id){
        $role = Role::find($id);
        $role->forceDelete();
        Toastr::success("Role Info Deleted", 'Success');
        return back();
    }
}
