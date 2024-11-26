<?php

namespace App\Http\Controllers;

//use App\Http\Requests\RegisterUserRequest;
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
    public function authorize()
    {
        return true;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:50'],
            'lastname' => ['required', 'max:50'],
            'email' => ['required', 'email', 'regex:/(.+)@(.+)\.com$/i', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
                /*->letters()*/
        ]);
        try {
            $user = User::create($validated);
    
            return redirect()
                ->route('users')
                ->withSuccess("The user with email: {$user->email} has been successfully registered.");
    
        } catch (\Exception $e) {
           return back()
                ->withInput()
                ->withError('There was an error registering user.' . $e->getMessage());
        }
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
            return response()->json([
                'success' => true
            ], 200);
               
        } catch (\Exception $e) {
            return redirect()
                ->route('users')
                ->with('error', 'Error al eliminar el usuario');
        }
    }
}
