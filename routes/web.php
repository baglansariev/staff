<?php

    // Main Page
    Route::get('/', 'GridController@index');
    // Employee list page
    Route::get('/employee', 'Employee\Employee@index');
    // Employee adding page
    Route::get('/employee/add', 'Employee\Employee@form')->name('employee.add.page');
    // Employee updating page
    Route::get('/employee/{id}', 'Employee\Employee@form')->where(['id' => '[0-9]+']);
    // Departments list page
    Route::get('/departments', 'Departments\Departments@index');
    // Departments adding page
    Route::get('/departments/add', 'Departments\Departments@form')->name('departments.add.page');
    // Departments updating page
    Route::get('/department/{id}', 'Departments\Departments@form')->where(['id' => '[0-9]+']);

    // Ajax Routes
    Route::post('/department/add/new', 'Departments\AjaxController@create');
    Route::post('/department/update', 'Departments\AjaxController@update');
    Route::post('/department/delete', 'Departments\AjaxController@delete');

    Route::post('/employee/add/new', 'Employee\AjaxController@create');
    Route::post('/employee/update', 'Employee\AjaxController@update');
    Route::post('/employee/delete', 'Employee\AjaxController@delete');


