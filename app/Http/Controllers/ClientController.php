<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Actions\Clients\UpdateClientState;

use App\RolesAndPermissions\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;


class ClientController extends Controller
{

    public function index(): View
    {
        return view('client.index', ['clients' => User::with('roles')->orderBy('id', 'Desc')->paginate(5)]);
    }

    public function show(int $id)
    {

        $client = User::findorFail($id);
        //$this->authorize('view', $client);
        return view('client.show', ['client' => $client]);
    }

    public function edit(int $id)
    {
        $client = User::findorFail($id);
        if ($client['enabled'] == true) {
            $enabledButton = 'Deshabilitar usuario';
        } else {
            $enabledButton = 'Habilitar usuario';
        }

        $roles = Role::orderBy('name')->get();
        return view('client.edit', ['client' => $client, 'roles' => $roles, 'enabledButton' => $enabledButton]);
    }


    public function update(int $id, Request $request)
    {
        $client = User::findorFail($id);
        $client->roles()->sync($request->get('roles'));
        return redirect()->route('client.index')
            ->with('status_success', 'Usuario actualizado correctamente');
    }


    public function destroy(int $id)
    {
        //
    }

    public function disable(): View
    {
        $this->authorize('haveAccess', 'client.edit');
        $clients = User::orderBy('id', 'Desc')->paginate(5);
        return view('client.disable', compact('clients'))
            ->with('status_success', 'Accesibilidad cambiada correctamente');
    }
    public function changeState(int $id): View
    {
        $this->authorize('haveAccess', 'client.edit');
        $client = User::findOrFail($id);
        return view('client.confirmChangeStatus', ['client' => $client]);
    }
    public function updateState(int $id): RedirectResponse
    {
        $this->authorize('haveAccess', 'client.edit');
        $user = User::findOrFail($id);
        $route = UpdateClientState::execute($user);
        return redirect()->route($route);
    }
}
