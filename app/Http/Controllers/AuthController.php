<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showRegistrationForm()
     {
         return view('auth.register');
     }

     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'role' => 'required|integer|max:255',
         ]);

         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'role' => $request->role,
             'password' => Hash::make($request->password),
         ]);

        //  dd($request->role);
        //  $user = new User;
        //  $user->name = $request->name;
        //  $user->email = $request->email;
        //  $user->password = Hash::make($request->password);
        //  $user->rolw = $user->role;
        //  $user->save();

         Auth::login($user);

         return redirect('login')->with('status','New Account Created');//redirect()->intended('/dashboard');
     }
    public function showLoginForm()
{
    return view('auth.login');
}

    public function login(Request $request)
{
    // Validate the form data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return view('users.homepage');//redirect()->intended('/dashboard');
    }

    // Authentication failed...
    return redirect()->route('login')->with('error', 'Invalid email or password.');
}

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('status','You have successfully logged out of the system. Have a great day.');;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthController $authController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthController $authController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthController $authController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthController $authController)
    {
        //
    }
}
