<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return '/students'; // Student Management Page ka route
    }

    /**
     * Logout the user and redirect to login page.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Logout ke baad login page par bhejna
    }

    /**
     * Custom login logic.
     */
    public function login(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/students'); // Redirect to student management page
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
