<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Middleware para la autenticación de administrador
    public function __construct()
    {
        $this->middleware('admin');
    }

    // Mostrar la página de administrador
    public function index()
    {
        return view('admin.index');
    }

    // Mostrar citas de usuarios
    public function showUserQuotes()
    {
        $quotes = Quote::all(); // Obtener todas las citas
        return view('admin.quotes', compact('quotes'));
    }

    // Prohibir usuario
    public function banUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->ban(); // Suponiendo que tienes un método "ban" en tu modelo de usuario
        return redirect()->back()->with('success', 'User banned successfully');
    }
}

