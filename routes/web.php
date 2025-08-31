<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/sections', action: function () {
    return view('pages.sections');
})->name('sections');


Route::get('/connect_us', action: function () {
    return view('pages.connect_us');
})->name('connect_us');


Route::get('/first_aid', action: function () {
    return view('pages.first_aid');
})->name('first_aid');

Route::get('/register', action: function () {
    return view('Auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', action: function () {
    return view('Auth.login');
})->name('login');

Route::post('/login', [AuthenticatedController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedController::class, 'destroy'])->name('logout');

Route::get('/forgot-password', action: function () {
    return view('auth.forgot-password');
})->name('forgot-password');


Route::get('/doctor', function () {
    return view('doctor.index');
})->middleware(['auth','doctor'])->name('doctor');


// Route::get('/sick', function () {
//     return view('sick.index');
// })->middleware(['auth','sick'])->name('sick');

Route::get('/sick', [App\Http\Controllers\SickController::class, 'index'])->middleware(['auth','sick'])->name('sick');

Route::get('/pharmaceutical', function () {
    return view('pharmaceutical.index');
})->middleware(['auth','pharmaceutical'])->name('pharmaceutical');


Route::resource('medicines', MedicineController::class)->middleware(['auth','pharmaceutical']);
// create name => medicines.create | method : Get | url => /medicines/create
// edit name => medicines.edit | method : Get | url => /medicines/{medicine}/edit
// index name => medicines.index  | method : Get | url => /medicines
// show name => medicines.show | method : Get | url => /medicines/{medicine}
// store name => medicines.store | method : post | url => /medicines
// update name => medicines.update | method : put |  url => /medicines/{medicine}
// destroy name => medicines.destroy | method : Delete | url => /medicines/{medicine}

Route::get('/medications', [MedicineController::class, 'medications'])->middleware(['auth','pharmaceutical'])->name('medications');


Route::get('/doctor/medications', [DoctorController::class, 'medications'])->middleware(['auth','doctor'])->name('doctor.medications');
Route::get('/patients', [DoctorController::class, 'patients'])->middleware(['auth','doctor'])->name('doctor.patients');
Route::get('/patients/create', [DoctorController::class, 'create'])->middleware(['auth','doctor'])->name('doctor.patients.create');
Route::get('/patients/{patient}', [DoctorController::class, 'patientShow'])->name('doctor.patients.show');
Route::post('/doctor/patients', [DoctorController::class, 'storePatient'])
    ->name('doctor.patients.store');
Route::get('/doctor/patients/{patient}/create-visit', [DoctorController::class, 'createVisit'])->name('doctor.visit.create');
Route::post('/doctor/patients/{patient}/create-visit', [DoctorController::class, 'storeVisit'])->name('doctor.visit.store');

Route::get('/doctor/patients/{patient}/prescribe', [DoctorController::class, 'createPrescribe'])->name('doctor.prescribe.create');

Route::post('/doctor/patients/{patient}/prescribe', [DoctorController::class, 'prescribe'])->name('doctor.prescribe');


Route::resource('doctor', DoctorController::class)->middleware(['auth','doctor']);