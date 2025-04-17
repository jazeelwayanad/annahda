<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{
            DB::beginTransaction();

            $user = User::create([
                'type' => 'user',
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
            
            // login the user
            Auth::login($user);

            if($request->query('redirect') && $request->query('redirect') !== ""){
                return redirect($request->query('redirect'));
            }

            return redirect()->route('dashboard');
        }catch(\Exception $error){
            DB::rollBack();
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    public function login(Request $request)
    {
        try{
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                if($request->query('redirect') && $request->query('redirect') !== ""){
                    return redirect($request->query('redirect'));
                }

                return redirect()->intended('dashboard');
            }
            
            throw new \Exception('The provided credentials do not match our records.');
        }catch(\Exception $error){
            return back()->onlyInput('email')->with('error', $error->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
