<?php

namespace App\Http\Controllers;


use App\RolesAndPermissions\Models\Role;
use App\RolesAndPermissions\Models\Permission;
use App\Http\Requests\StoreRoleRequest;
use App\Actions\Roles\StoreOrUpdateRole;
use App\Actions\Roles\ShowOrEditRole;
use App\Http\Requests\UpRoleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class RoleController extends Controller
{
    public function index(): View
    {
        $this->authorize('haveAccess', 'role.index');

        $roles = Role::orderBy('id', 'Desc')->paginate(5);
        return view('role.index', compact('roles'));
    }

    public function create(): View
    {
        $this->authorize('haveAccess', 'role.create');
        $permissions = Permission::get();
        return view('role.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request, Role $role): RedirectResponse
    {
        $this->authorize('haveAccess', 'role.create');
        $role = Role::create($request->validated());
        StoreOrUpdateRole::execute($request, $role);
        return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado correctamente');
    }

    public function show(Role $role): View
    {
        $this->authorize('haveAccess', 'role.show');
        $permissions_role = ShowOrEditRole::execute($role);
        $permissions = Permission::get();
        return view('role.show', compact('permissions', 'role', 'permissions_role'));
    }

    public function edit(Role $role): View
    {
        $this->authorize('haveAccess', 'role.edit');
        $permissions_role = ShowOrEditRole::execute($role);
        $permissions = Permission::get();
        return view('role.edit', compact('permissions', 'role', 'permissions_role'));
    }

    public function update(UpRoleRequest $request, Role $role)
    {
        $this->authorize('haveAccess', 'role.edit');
        $role->fill($request->validated());
        StoreOrUpdateRole::execute($request, $role);
        return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado correctamente');
    }

    public function destroy(Role $role)
    {
        $this->authorize('haveAccess', 'role.destroy');
        $role->delete();
        return redirect()->route('role.index')
            ->with('status_success', 'Rol eliminado correctamente');
    }
}
