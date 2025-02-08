<?php
namespace App\Http\Controllers;
use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminPasswordController extends Controller
{
    /**
     * Mostrar la lista de usuarios.
     */
    public function index()
    {
        $users = CustomUser::all();
        return view('admin_password.index', compact('users'));
    }

    /**
     * Mostrar el formulario para cambiar la contraseña de un usuario.
     */
    public function edit($id)
    {
        $user = CustomUser::findOrFail($id);
        return view('admin_password.edit', compact('user'));
    }

    /**
     * Actualizar la contraseña de un usuario.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = CustomUser::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('admin_passwords.index') // <- Asegúrate de usar el nombre correcto
            ->with('success', 'Contraseña actualizada con éxito.');
    }
    
}
