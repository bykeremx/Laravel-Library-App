<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function IndexPage(){

        $data = [
          'books' => Books::all(),
        ];
        return view('customer.index')->with($data);
    }
}
