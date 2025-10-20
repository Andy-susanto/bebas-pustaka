<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.index');
        }
        return view('adm.login.formlogin');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password])) {
            return redirect()->route('dashboard.index')->with('success',"<strong>Anda berhasil login</strong>");
        } else {
            return redirect()->back()->with('danger',"<strong>Maaf, Anda Gagal Login</strong>");
        }
       
        return redirect()->back()->with('danger',"<strong>Maaf, Anda Gagal Login</strong>");
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect()->route('adm.form.login');
    }
}
