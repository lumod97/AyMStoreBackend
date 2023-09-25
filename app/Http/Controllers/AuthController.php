<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        public function login(Request $request)
    {
        // VALIDAR CAMPOS
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // INTENTO DE LOGIN
        if (Auth::attempt($credentials)) {
            // LOGIN SUCCESSFULLY
            return response()->json(['message' => 'Autenticación exitosa'], 200);
        } else {
            // LOGIN FAIL
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }
}
