<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Loginpage(){
        return view('customer.login');
    }
    //üye ol post sayfası 
   
}
