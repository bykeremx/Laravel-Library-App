<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminKitapController;
use App\Http\Controllers\Customer\IndexController;
use App\Http\Controllers\Customer\LoginController;
use App\Http\Controllers\Customer\RegisterController;
use App\Http\Middleware\AuthCheckMiddle;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// --- customer pages --------------------------------
Route::get("/",[IndexController::class,"IndexPage"])->name("customer-index");
//customer login page --------------------------------
Route::get("/login",[LoginController::class,"LoginPage"])->name("customer-login");
//register Page --------------------------------
Route::get("/register",[RegisterController::class,"RegisterPage"])->name("customer-register");
//register Post 
Route::post("/register",[RegisterController::class,"RegisterPost"])->name("customer-register-post");
//login Post --------------------------------
Route::post("/login",[LoginController::class,"LoginPost"])->name("customer-login-post");
//logout --------------------------------
Route::get("/logout",[LoginController::class,"Logout"])->name("customer-logout");
//kitabi Talep et 
Route::post("/kitabi-talep-et/",[IndexController::class,"borrowBook"])->name("customer-kitabi-talep-et");
//kitaplarim 
Route::get("/kitaplarim/",[IndexController::class,"myBooksPage"])->name("customer-kitaplarim");


// --- admin pages --------------------------------
Route::prefix("/admin")->middleware(AuthCheckMiddle::class)->middleware(IsAdmin::class)->group(function () {

    Route::get("/",[AdminIndexController::class,"IndexPageAdmin"])->name("admin-index-page");

    //kitap sil rotası
    Route::get("/kitap/sil/{id}",[AdminKitapController::class,"DeleteBookId"])->name("sil-kitap-admin");
    //admin kitap ekleme kısmı 
    Route::get("/kitapekle",[AdminKitapController::class,"AddBookPage"])->name("admin-kitap-ekle");
    //burda kitap ekleme kısmı rotası 
    Route::post("/kitapekle",[AdminKitapController::class,"AddBookPost"])->name("admin-kitap-ekle-post");
    //onay beykleyen kitaplar 
    Route::get("/onay-bekleyen-kitaplar",[AdminKitapController::class,"OnayBekleyenKitaplarPage"])->name("onay-bekleyen-kitaplar");
    //onaylanmış kitapları gör 
    Route::get("/onaylanmis-kitaplar",[AdminKitapController::class,"OnaylanmisKitaplar"])->name("onaylanmis-kitaplar-admin");
    Route::get("/onay-bekleyen-kitaplar/{id}",[AdminKitapController::class,"OnaylaKitap"])->name("onayla-kitap-admin");
    Route::get("/kullanici-listesi",[AdminIndexController::class,"UserListPage"])->name("userList-page");
    //kitap duzenle 
    Route::get("/kitap-duzenle/{id}",[AdminKitapController::class,"KitapDuzenlePage"])->name("kitap-duzenle-admin");
    Route::post("/kitap-duzenle/{id}",[AdminKitapController::class,"KitapDuzenlePost"])->name("kitap-duzenle-post");
    //kullanıcı sil
    Route::get("/kullanici-sil/{id}",[AdminIndexController::class,"DeleteUser"])->name("kullanici-sil-admin");
    //kullınıcı düzenle 
    // Route::get("/kullanici-duzenle/{id}",[AdminIndexController::class,"UserEditPage"])->name("kullanici-duzenle-admin");
    // Route::post("/kullanici-duzenle/{id}",[AdminIndexController::class,"UserEditPost"])->name("kullanici-duzenle-post");
});