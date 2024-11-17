<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with([
            'users' => User::all(),
        ]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        try {
            $user = User::create([
                'name' => request()->name,
                'lastname' => request()->lastname,
                'email' => request()->email,
                'password' => Hash::make(request()->password),
            ]);

            //$user = User::create(request()->all());

            return redirect()
                ->route('users')
                ->withSuccess("Your new user with email {$user->email} has already stored.");
        } catch (\Exception $e) {
            return redirect()
                ->route('users')
                ->with('error', 'Error al eliminar el usuario');
        }
    }
    public function show($id)
    {
        return view('users.show')->with([
            'user' => User::findOrFail($id),
        ]);
    }
    public function edit($id)
    {
        return view('users.edit')->with([
            'user' => User::findOrFail($id),
        ]);
    }
    public function update($id)
    {
        $user = USer::findOrFail($id);

        $user->update(request()->all());
        return redirect()
            ->route('users')
            ->withSuccess("The user {$user->email} has been updated.");
    }
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()
                ->route('users')
                ->withSuccess("The user with email {$user->email} has been deleted.");
        } catch (\Exception $e) {
            return redirect()
                ->route('users')
                ->with('error', 'Error al eliminar el usuario');
        }
    }
}
