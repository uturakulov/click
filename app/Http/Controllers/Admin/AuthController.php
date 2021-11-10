<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => 'required'
        ])->validate();

        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin-home')->with('message', 'Welcome ' . auth()->guard('admin')->user()->name);
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function changePass()
    {
        return view('change');
    }

    public function storePass(Request $request)
    {
        $hashedPass = auth()->guard('admin')->user()->password;

        $id = auth()->guard('admin')->user()->id;

        if ($request->newpass == $request->confirmpass) {
            if (Hash::check($request->currentpass, $hashedPass)) {
                $user = Admin::findOrFail($id);
                $user->password = Hash::make($request->newpass);
                $user->save();

                return redirect()->route('admin-home')->with('message', 'Password changed successfully!');
            }
        }
    }
}
