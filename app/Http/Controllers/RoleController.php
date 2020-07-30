<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolesAndPermissions\Models\Role;
use App\RolesAndPermissions\Models\Permission;
use App\Http\Requests\StoreRoleRequest;
use App\Actions\StoreOrUpdateRole;
use App\Actions\ShowOrEditRole;
use App\Http\Requests\UpRoleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::orderBy('id', 'Desc')->paginate(5);
        return view('role.index', compact('roles'));
    }

    public function create(): View
    {
        $permissions = Permission::get();
        return view('role.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request, Role $role)
    {
        $role = Role::create($request->validated());
        StoreOrUpdateRole::execute($request, $role);
        return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado correctamente');
    }

    public function show(Role $role): View
    {
        $permissions_role = ShowOrEditRole::execute($role);
        $permissions = Permission::get();
        return view('role.show', compact('permissions', 'role', 'permissions_role'));
    }

    public function edit(Role $role): View
    {
        $permissions_role = ShowOrEditRole::execute($role);
        $permissions = Permission::get();
        return view('role.edit', compact('permissions', 'role', 'permissions_role'));
    }

    public function update(UpRoleRequest $request, Role $role)
    {
        $role->fill($request->validated());
        StoreOrUpdateRole::execute($request, $role);
        return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')
            ->with('status_success', 'Rol eliminado correctamente');
    }
}
