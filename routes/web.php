<?php

use App\Http\Controllers\Customer\IndexController;
use Illuminate\Support\Facades\Route;

// --- customer pages --------------------------------
Route::get("/",[IndexController::class,"IndexPage"])->name("customer-index");