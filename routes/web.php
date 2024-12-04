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