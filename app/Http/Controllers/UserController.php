<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function register()
    {
        return view('User.register');
    }

    public function storedata(Request $request)
    {
        $request->validate(
            ['name'=>"required",
            'email'=>"required|email|unique:user_data",
            'password'=>"required|min:6|confirmed"],
            ['name.required'=>"Name is required",
            'email.required'=>"Email is required",
            'email.email'=>"Enter a valid email",
            'email.unique'=>"Email is already registered",
             'password.required'=>"Password is required",
             'password.min'=>"Password should be minimum 6",
             'password.confirmed'=>"Incorrect Password"]
        );

      $userdata=  UserData::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

      
          return redirect()->route('login')->with('success', "Welcome {$request->name}");


    }

    public function login()
    {
        return view('User.login');
    }

    
 public function loginValidate(Request $request)
{
  
   $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], [
        'email.required' => 'Email is required',
        'email.email' => 'Invalid email format',
        'password.required' => 'Password is required'
    ]);

    if(Auth::attempt($credentials))
    {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

   
    // $user = UserData::where('email', $credentials['email'])->first();

  
    // if ($user && Hash::check($credentials['password'], $user->password))
    //  {
    //     return redirect()->route('all.dashboard');
    // }

   
    return back()->withErrors([
        'login_error' => 'Invalid email or password'
    ]);
    }

    public function dashboard()
    {
        return view('User.dashboard');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
 

   
}

