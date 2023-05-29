<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentCarController;

Route::resource("/rent-cars", RentCarController::class);


