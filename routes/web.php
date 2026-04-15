<?php

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// --- ROTAS PÚBLICAS ---
Route::get('/', function () {
    return view('index', ['chirps' => Chirp::with('user')->latest()->get()]);
})->name('home');

// --- AUTENTICAÇÃO (LOGIN E CADASTRO) ---
Route::middleware('guest')->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    })->name('login.post');

    Route::view('/register', 'register')->name('register.view');
    Route::post('/register', function (Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::login($user);
        return redirect('/');
    })->name('register');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// --- ÁREA DO USUÁRIO ---
Route::middleware('auth')->group(function () {
    Route::post('/chirps', function (Request $request) {
        $validated = $request->validate(['message' => 'required|string|max:255']);
        $request->user()->chirps()->create($validated);
        return redirect('/');
    })->name('chirps.store');

    Route::delete('/chirps/{chirp}', function (Chirp $chirp) {
        if (Auth::id() !== $chirp->user_id && Auth::user()->email !== env('ADMIN_EMAIL')) {
            abort(403);
        }
        $chirp->delete();
        return redirect('/');
    })->name('chirps.destroy');

    // --- PAINEL ADMIN ---
    Route::get('/admin', function () {
        if (Auth::user()->email !== env('ADMIN_EMAIL')) abort(403);
        return view('admin', [
            'users' => User::withCount('chirps')->get(),
            'totalChirps' => Chirp::count()
        ]);
    })->name('admin.dashboard');
});