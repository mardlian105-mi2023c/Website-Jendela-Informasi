<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view (for web).
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * Supports both web form and API JSON requests.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Event Laravel default
        event(new Registered($user));

        // Login otomatis
        Auth::login($user);

        // 🔁 Jika request dari Postman / API
        if ($request->expectsJson()) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'token' => $token,
            ], 201);
        }

        // 🌐 Jika request dari form web
        return redirect(RouteServiceProvider::HOME);
    }
}