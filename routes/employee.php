<?php

use App\Http\Controllers\Admin\Doctor\ReferenceController;
use App\Http\Controllers\Admin\Employee\EmpBoardController;
use App\Http\Controllers\Admin\Employee\EmpExamController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Employee\ExternalEmpController;
use App\Http\Controllers\Admin\Employee\ResourceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resources([
        'emp-exam' => EmpExamController::class,
        'emp-board' => EmpBoardController::class,
        'resource' => ResourceController::class,
        'external-emp' => ExternalEmpController::class,
        'reference' => ReferenceController::class,
    ]);

    Route::controller(EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
        Route::get('/employee', 'index')->name('index');
        Route::get('/employee/{id}', 'show')->name('show');

        Route::get('/basic-info', 'getBasicForm')->name('basic');
        Route::post('/create/basic-info', 'saveBasicInfo')->name('basic.store');

        Route::get('/family-info/{employee}', 'getFamilyForm')->name('family');
        Route::post('/create/family-info/{employee}', 'saveFamilyInfo')->name('family.store');

        Route::get('/employee/create/step3/{employee}', [EmployeeController::class, 'createStep3'])->name('employee.create.step3');
        Route::post('/employee/create/step3/{employee}', [EmployeeController::class, 'store']);
        Route::get('/contact/{employee}', 'getContactForm')->name('contact');
        Route::post('/create/contact/{employee}', 'saveContactInfo')->name('contact.store');

        Route::get('/curriculum/{employee}', 'getCurriculumForm')->name('curriculum');
        Route::post('/create/curriculum/{employee}', 'saveCurriculumInfo')->name('curriculum.store');

        Route::get('/bank/{employee}', 'getBankForm')->name('bank');
        Route::post('/create/bank/{employee}', 'saveBankInfo')->name('bank.store');

        Route::get('/weekend/{employee}', 'getWeekendForm')->name('weekend');
        Route::post('/create/weekend/{employee}', 'saveWeekendInfo')->name('weekend.store');
    });
});
