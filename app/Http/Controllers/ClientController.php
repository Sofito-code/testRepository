<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
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

    public function disable()
    {
        $clients = User::orderBy('id', 'Desc')->paginate(5);
        return view('client.disable', compact('clients'))
            ->with('status_success', 'Accesibilidad cambiada correctamente');
    }
    public function changeState(int $id)
    {
        $user = User::findOrFail($id);
        return view('client.confirmChangeStatus', ['client' => $user]);
    }
    public function updateState(int $id)
    {
        $user = User::findOrFail($id);
        if ($user->enabled == true) {
            $user->enabled = false;
            $user->save();
            return redirect()->route('client.disable');
        } else {
            $user->enabled = true;
            $user->save();
            return redirect()->route('client.index');
        }
    }
}
