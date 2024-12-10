<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function IndexPageAdmin(){

        $data = [
            'books' => Books::all(),
        ];
        return view("Admin.index")->with($data);
    }
}
