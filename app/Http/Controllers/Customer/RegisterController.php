<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function RegisterPage()
    {
        return view('customer.register');
    }
    public function RegisterPost(Request $request)
    {

        if ($request->first_name == null or $request->last_name == null or $request->email or $request->password) {
            return redirect()->back()->with('error', 'Lütfen Gerekli Alanları Doldurun ! ');
        }
        $newUser = [
            'name' => $request->first_name,
            'surname' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(User::create($newUser)){
            return redirect()->route('customer.login')->with('success', 'Kayıt Başarılı! Giriş Yapabilirsiniz.');
        }
    }
}
