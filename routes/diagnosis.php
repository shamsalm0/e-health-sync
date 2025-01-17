<?php

use App\Http\Controllers\Admin\Diagnosis\DiagnosisMoneyReceiveController;
use App\Http\Controllers\Admin\Diagnosis\MachineController;
use App\Http\Controllers\Admin\Diagnosis\ReportTypeController;
use App\Http\Controllers\Admin\Diagnosis\TestAttributeController;
use App\Http\Controllers\Admin\Diagnosis\TestGroupController;
use App\Http\Controllers\Admin\Diagnosis\TestMachineController;
use App\Http\Controllers\Admin\Diagnosis\TestNameController;
use App\Http\Controllers\Admin\Diagnosis\TestPackageController;
use App\Http\Controllers\Admin\Diagnosis\TestProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::resource('machine', MachineController::class);
    Route::resource('test-group', TestGroupController::class);
    Route::resource('test-attribute', TestAttributeController::class);
    Route::resource('report-type', ReportTypeController::class);
    Route::resource('test-name', TestNameController::class);
    Route::resource('test-product', TestProductController::class);
    Route::resource('test-machine', TestMachineController::class);
    Route::resource('test-package', TestPackageController::class);
    Route::resource('diagnosis-money-receive', DiagnosisMoneyReceiveController::class);
    Route::get('diagnosis-money-receive-list', [DiagnosisMoneyReceiveController::class, 'moneyReceiveList'])->name('diagnosis-money-receive.list');
    Route::get('diagnosis-barcode-print', [DiagnosisMoneyReceiveController::class, 'barcodePrint'])->name('diagnosis-money-receive.barcode-print');
    Route::get('diagnosis-due-paid', [DiagnosisMoneyReceiveController::class, 'previousDuePaid'])->name('diagnosis-money-receive.due-paid');

    Route::get('package-details/{package_id}', [TestPackageController::class, 'packageDetails'])->name('package-details');
});
