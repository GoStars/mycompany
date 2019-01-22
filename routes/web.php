<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');

Auth::routes(['verify' => true]);

// User routes
Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('verified', 'role:client');

Route::middleware(['auth', 'verified'])->group(function() {
    // Director routes
    Route::group([
        'prefix' => 'director', 
        'middleware' => 'role:director',
    ], function() {
        //Dashboard
        Route::view('/dashboard', 'director.dashboard')
            ->name('director.dashboard');
        // Users
        Route::resource('/users', 'UsersController', [
            'names' => [
                'index' => 'users',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.destroy',
            ],
            'only' => ['index', 'edit', 'update', 'destroy'],
        ]);
        // Employees
        Route::resource('/employees', 'EmployeesController', [
            'names' => [
                'index' => 'employees',
                'create' => 'employees.create',
                'show' => 'employees.show',
            ],
            'only' => ['index', 'create', 'store', 'show'],
        ]);
    });

    // Employee routes
    Route::group([
        'prefix' => 'employee', 
        'middleware' => 'role:employee',
    ], function() {
        //Dashboard
        Route::view('/dashboard', 'employee.dashboard')
            ->name('employee.dashboard');
        // Payments
        Route::resource('/payments', 'PaymentsController', [
            'names' => [
                'index' => 'payments',
                'create' => 'payments.create',
            ],
            'only' => ['index', 'create', 'store'],
        ]);
    });
});


