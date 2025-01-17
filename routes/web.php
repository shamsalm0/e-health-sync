<?php

use App\Http\Controllers\Admin\Diagnosis\AgentCommissionController;
use App\Http\Controllers\Admin\Doctor\ReportDoctorCommissionController;
use App\Http\Controllers\Admin\Employee\EmployeeTypeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Library\AgentController;
use App\Http\Controllers\Admin\Library\BankBranchController;
use App\Http\Controllers\Admin\Library\BankController;
use App\Http\Controllers\Admin\Library\BloodGroupController;
use App\Http\Controllers\Admin\Library\DepartmentController;
use App\Http\Controllers\Admin\Library\DesignationController;
use App\Http\Controllers\Admin\Library\DiscountServiceSetupController;
use App\Http\Controllers\Admin\Library\DistrictController;
use App\Http\Controllers\Admin\Library\DivisionController;
use App\Http\Controllers\Admin\Library\GenderController;
use App\Http\Controllers\Admin\Library\GradeController;
use App\Http\Controllers\Admin\Library\HospitalBranchController;
use App\Http\Controllers\Admin\Library\HospitalBuildingController;
use App\Http\Controllers\Admin\Library\HospitalController;
use App\Http\Controllers\Admin\Library\HospitalCounterController;
use App\Http\Controllers\Admin\Library\HospitalFloorController;
use App\Http\Controllers\Admin\Library\HospitalRoomController;
use App\Http\Controllers\Admin\Library\MaritalStatusController;
use App\Http\Controllers\Admin\Library\OccupationController;
use App\Http\Controllers\Admin\Library\OtherServiceController;
use App\Http\Controllers\Admin\Library\ReligionController;
use App\Http\Controllers\Admin\Library\RoomTypeController;
use App\Http\Controllers\Admin\Library\ShiftController;
use App\Http\Controllers\Admin\Library\SpecializationController;
use App\Http\Controllers\Admin\Library\SymptomController;
use App\Http\Controllers\Admin\Library\TicketFeeController;
use App\Http\Controllers\Admin\Library\UnionController;
use App\Http\Controllers\Admin\Library\UomController;
use App\Http\Controllers\Admin\Library\UpazilaController;
use App\Http\Controllers\Admin\ThemeSettingController;
use App\Http\Controllers\Authentication\LoginHistoryController;
use App\Http\Controllers\Authentication\MessageListController;
use App\Http\Controllers\Authentication\PermissionController;
use App\Http\Controllers\Authentication\RoleController;
use App\Http\Controllers\Authentication\UserController;
use App\Http\Controllers\TestController;
use App\Livewire\Select2Dropdown;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/diagnosis.php';
require __DIR__.'/store.php';
require __DIR__.'/employee.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/migrate-fresh', function () {
    if (app()->environment('local')) {
        Artisan::call('migrate:fresh', ['--seed' => true]);

        return redirect('/login');
    }

    return abort(403, 'Unauthorized.');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'root'])->name('root');
    Route::get('/home', [HomeController::class, 'root'])->name('home');

    //Language Translation
    Route::get('index/{locale}', [HomeController::class, 'lang']);

    Route::resources([
        'user' => UserController::class,
        'roles' => RoleController::class,
        'permission' => PermissionController::class,

        'grades' => GradeController::class,
        'uom' => UomController::class,
        'theme-setting' => ThemeSettingController::class,
        'job' => TestController::class,
        'designation' => DesignationController::class,
        'shift' => ShiftController::class,

        'hospital' => HospitalController::class,
        'hospital-branch' => HospitalBranchController::class,
        'hospital-building' => HospitalBuildingController::class,
        'hospital-counter' => HospitalCounterController::class,
        'hospital-room' => HospitalRoomController::class,
        'hospital-floor' => HospitalFloorController::class,

        'division' => DivisionController::class,
        'district' => DistrictController::class,
        'upazila' => UpazilaController::class,
        'union' => UnionController::class,
        'bank' => BankController::class,
        'bank-branch' => BankBranchController::class,

        'occupation' => OccupationController::class,
        'symptom' => SymptomController::class,
        'specialization' => SpecializationController::class,
        'employee-type' => EmployeeTypeController::class,
        'room-type' => RoomTypeController::class,
        'department' => DepartmentController::class,

        'gender' => GenderController::class,
        'marital-status' => MaritalStatusController::class,
        'blood-group' => BloodGroupController::class,
        'religion' => ReligionController::class,

        'discount-service-setup' => DiscountServiceSetupController::class,
        'other-service' => OtherServiceController::class,
        'ticket-fee' => TicketFeeController::class,
        'agent' => AgentController::class,
        'agent-commission' => AgentCommissionController::class,
    ]);

    Route::get('/login-history-list', [LoginHistoryController::class, 'index'])->name('login.history.list');
    Route::get('/message-log-list', [MessageListController::class, 'index'])->name('message.log.list');
    Route::get('/report-doctor-commission', [ReportDoctorCommissionController::class, 'index'])->name('report-doctor-commission.index');

    Route::get('/search/{model}', [Select2Dropdown::class, 'selectSearch'])->name('select.search');
    Route::get('{any}', [HomeController::class, 'index'])->name('index');
});
