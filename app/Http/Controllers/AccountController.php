<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // Utilisateur connecté : tableau de bord "Mi cuenta" avec ses commandes.
        if ($user = $request->user()) {
            $orders = Order::with('items')
                ->where('customer_email', $user->email)
                ->latest()
                ->get();

            return view('wp.mi-cuenta', compact('orders'));
        }

        // Recherche de commandes par email (?email=) sans compte.
        if ($email = $request->string('email')->toString()) {
            $orders = Order::with('items')->where('customer_email', $email)->latest()->get();

            return view('account', compact('orders', 'email'));
        }

        // Sinon : formulaires Acceder / Registrarse.
        return view('wp.mi-cuenta', ['orders' => collect()]);
    }

    /** Traite les formulaires de connexion et d'inscription du thème. */
    public function handle(Request $request)
    {
        return $request->has('register')
            ? $this->register($request)
            : $this->login($request);
    }

    private function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [], [
            'username' => 'nombre de usuario o correo electrónico',
            'password' => 'contraseña',
        ]);

        $remember = $request->boolean('rememberme');

        // Le champ "username" accepte l'email ou le nom.
        $ok = Auth::attempt(['email' => $data['username'], 'password' => $data['password']], $remember)
            || Auth::attempt(['name' => $data['username'], 'password' => $data['password']], $remember);

        if (! $ok) {
            throw ValidationException::withMessages([
                'username' => 'Dirección de correo electrónico o contraseña desconocidos.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('account')->with('status', 'Has iniciado sesión correctamente.');
    }

    private function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            'email'    => ['required', 'email', 'max:190', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:6', 'max:120'],
        ], [], [
            'name'     => 'nombre',
            'email'    => 'dirección de correo electrónico',
            'password' => 'contraseña',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'], // haché automatiquement par le cast 'hashed'
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('account')->with('status', 'Tu cuenta ha sido creada. ¡Bienvenido!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'Has cerrado la sesión.');
    }
}
