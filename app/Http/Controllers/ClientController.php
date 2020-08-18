<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Actions\Clients\UpdateClientState;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;


class ClientController extends Controller
{

    public function index(): View
    {
        $clients = User::orderBy('id', 'Desc')->paginate(5);
        return view('client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
    }


    public function update(int $id)
    {
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
        $user = User::findOrFail($id);
        return view('client.confirmChangeStatus', ['client' => $user]);
    }
    public function updateState(int $id): RedirectResponse
    {
        $this->authorize('haveAccess', 'client.edit');
        $user = User::findOrFail($id);
        $route = UpdateClientState::execute($user);
        return redirect()->route($route);
    }
}
