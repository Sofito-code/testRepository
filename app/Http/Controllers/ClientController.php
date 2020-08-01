<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Actions\Clients\UpdateClientState;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


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
        $clients = User::orderBy('id', 'Desc')->paginate(5);
        return view('client.disable', compact('clients'))
            ->with('status_success', 'Accesibilidad cambiada correctamente');
    }
    public function changeState(int $id): View
    {
        $user = User::findOrFail($id);
        return view('client.confirmChangeStatus', ['client' => $user]);
    }
    public function updateState(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $route = UpdateClientState::execute($user);
        return redirect()->route($route);
    }
}
