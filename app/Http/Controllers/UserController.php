<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Exception\ValidationException as ExceptionValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login()
    {
        return inertia('User/Login');
    }

    public function verifyLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $encryptedPassword = $user->password;
            $checkPassword = Hash::check($request->password, $encryptedPassword);
            if ($checkPassword) {
                Auth::login($user, $request->remember);
                $request->session()->regenerate();

                return redirect()->to('/');
            } else {

                // return back()->withErrors([
                //     'email' => 'The provided credentials do not match our records.',
                // ]);
                throw ExceptionValidationException::withMessages([
                    'email' => "Invalid Email or Password"
                ]);
            }
        }
    }
}
