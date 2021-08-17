<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "permission";
        $permissions = Permission::all();
        $permission = new Permission();
        $roles = Role::all();
        return view('user.permission.create', compact('permissions', 'title', 'permission', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $permission = Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.create')->with('success_message', 'New permission has been created successfully.');
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
        $title = "permission";
        $permission = Permission::findOrFail($id);
        return view('user.permission.edit',compact('permission', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permissions.create')->with('success_message', 'Permission has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permissionsRole = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->first();
        $permissionsRole->delete();
        $permission->delete();
        return back()->with('success_message', 'Permission has been deleted successfully.');
    }
}
