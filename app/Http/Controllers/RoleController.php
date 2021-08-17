<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
        $title = "role";
        $roles = Role::where('name', '!=', 'Super-Admin')->get();
        $permissions = Permission::all();
        $role = new Role();
        return view('user.role.create', compact('roles', 'title', 'permissions', 'role'));
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
                'name'=>'required|unique:roles|max:30',
                'permissions' =>'required',
            ]
        );

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.create')->with('success_message', 'New Role has been created successfully.');
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
        $title = "role";
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('user.role.edit', compact('role', 'permissions', 'title'));
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
                'name'=>'required|max:30',
                'permissions' =>'required',
            ]
        );
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
        if ($permissions) {
            foreach ($permissions as $permission) {
                $role->revokePermissionTo($permission);
            }
        }

        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('roles.create')->with('success_message', 'Role has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
        //dd($role, $permission);
        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }

        $role->delete();

        return back()->with('success_message', 'Role was deleted successfully.');
    }
}
