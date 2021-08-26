<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role,Permission};
use App\Http\Controllers\Controller;

class AssignController extends Controller
{
    public function create()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('permission.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success',"Permission has been Assigned to the role  {$role->name}");
    }
}
 