<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function IndexPageAdmin(){

        $data = [
            'books' => Books::all(),
        ];
        return view("Admin.index")->with($data);
    }
    //butun Kullanıcı listesi 
    public function UserListPage(){
        $data = [
            'users' => User::all(),
        ];
        return view("Admin.kullaniciListesi")->with($data);
    }
    //admin kullanıcı sil 
    public function DeleteUser($id){
        $user = User::where("id",$id)->first();
        if($user){
            $user->delete();
            return redirect()->route("userList-page")->with('success', 'Kullanıcı başarıyla silindi.');
        }else{
            return redirect()->route("userList-page")->with('error', 'Böyle bir kullanıcı bulunamadı.');
        }
    }
}
