<?php

use App\Http\Controllers\Customer\IndexController;
use App\Http\Controllers\Customer\LoginController;
use App\Http\Controllers\Customer\RegisterController;
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