<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Loginpage(){
        return view('customer.login');
    }
    //login page post 
    public function LoginPost(Request $request){
        // dd($request->all());
        $login_user_now = User::where("email",$request->email)->where("password",$request->password)->first();
        if($login_user_now){
            //login olduktan sonra 
            Auth::login($login_user_now);
            return redirect()->route('customer-index')->with('success', 'Giriş Başarılı!'."Hoşgeldin ! ".ucwords($login_user_now->name));

        }
        else{
            return redirect()->route('customer-login')->with('error', 'Kullanıcı Adı veya Şifre Yanlış!');
        }
    }
    //logout 

    public function Logout(){
        Auth::logout();
        return redirect()->route('customer-login')->with('success', 'Çıkış Yapıldı!');
    }
   
}
