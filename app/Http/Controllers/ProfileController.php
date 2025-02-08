<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            'password' => ['sometimes', 'nullable', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Perfil actualizado con éxito.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return redirect('/')->with('status', 'Cuenta eliminada con éxito.');
    }
}
