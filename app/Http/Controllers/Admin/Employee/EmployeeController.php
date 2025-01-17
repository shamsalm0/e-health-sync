<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\BankInfoRequest;
use App\Http\Requests\Employee\BasicInfoRequest;
use App\Http\Requests\Employee\ContactInfoRequest;
use App\Http\Requests\Employee\CurricullamInfoRequest;
use App\Http\Requests\Employee\FamilyInfoRequest;
use App\Http\Requests\Employee\WeekendInfoRequest;
use App\Models\Admin\Employee\EmpAddress;
use App\Models\Admin\Employee\EmpBankInfo;
use App\Models\Admin\Employee\EmpBoard;
use App\Models\Admin\Employee\EmpEducation;
use App\Models\Admin\Employee\EmpExam;
use App\Models\Admin\Employee\EmpFamily;
use App\Models\Admin\Employee\EmpInfo;
use App\Models\Admin\Employee\EmployeeType;
use App\Models\Admin\Employee\EmpWeekend;
use App\Models\Admin\Library\BloodGroup;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\Designation;
use App\Models\Admin\Library\Gender;
use App\Models\Admin\Library\Grade;
use App\Models\Admin\Library\MaritalStatus;
use App\Models\Admin\Library\Occupation;
use App\Models\Admin\Library\Religion;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function getBasicForm()
    {
        $data['employee'] = new EmpInfo;
        $data['genders'] = Gender::selectMenu();
        $data['religions'] = Religion::selectMenu();
        $data['bloodGroups'] = BloodGroup::selectMenu();
        $data['maritalStatus'] = MaritalStatus::selectMenu();
        $data['grades'] = Grade::selectMenu();
        $data['empTypes'] = EmployeeType::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['designations'] = Designation::selectMenu();
        $data['jobNatures'] = ['Full Time' => 'Full Time', 'Part Time' => 'Part Time', 'Contructual' => 'Contructual'];

        return view('admin.employee.basic', $data);
    }

    public function saveBasicInfo(BasicInfoRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'_'.$photo->getClientOriginalName();
            $filePath = $photo->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filePath;
        }

        $employee = EmpInfo::create($validated);

        $alert = [
            'type' => 'success',
            'message' => 'Employee created successfully',
        ];

        return redirect()->route('employee.family', $employee->id)->with('alert', $alert);
    }

    public function getfamilyForm($id)
    {
        $data['emp_family'] = new EmpFamily;
        $data['employee'] = EmpInfo::findOrFail($id);
        $data['relations'] = ['0' => 'father', '1' => 'mother', '2' => 'brother', '3' => 'sister', '4' => 'husband', '5' => 'wife', '6' => 'son', '7' => 'daughter', '8' => 'other'];
        $data['occupations'] = Occupation::selectMenu();

        return view('admin.employee.family', $data);
    }

    public function saveFamilyInfo(FamilyInfoRequest $request, string $id)
    {
        $validated = $request->validated();

        $data = $validated;
        $data['emp_id'] = $id;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'_'.$photo->getClientOriginalName();
            $filePath = $photo->storeAs('photos', $filename, 'public');
            $data['photo'] = $filePath;
        }

        $family = EmpFamily::create($data);

        $alert = [
            'type' => 'success',
            'message' => 'Employee family created successfully',
        ];

        return redirect()->route('employee.contact', $id)->with('alert', $alert);
    }

    public function getContactForm($id)
    {
        $data['emp_address'] = new EmpAddress;
        $data['employee'] = EmpInfo::findOrFail($id);
        $data['mailing_addresses'] = ['Present_address' => 'Present Address', 'Permanent_address' => 'Permanent Address'];

        return view('admin.employee.contact', $data);
    }

    public function saveContactInfo(ContactInfoRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $validated;
        $data['emp_id'] = $id;
        $data['c_division_id'] = $data['division_id'];
        $data['c_district_id'] = $data['district_id'];
        $data['c_upazila_id'] = $data['upazila_id'];

        if ($request->input('same_as_present') == 'on') {
            $data['p_division_id'] = $data['c_division_id'];
            $data['p_district_id'] = $data['c_district_id'];
            $data['p_upazila_id'] = $data['c_upazila_id'];
            $data['p_post_office'] = $data['c_post_office'];
            $data['p_post_code'] = $data['c_post_code'];
            $data['p_address'] = $data['c_address'];
            $data['p_mobile'] = $data['c_mobile'];
        }

        $address = EmpAddress::create($data);

        $alert = [
            'type' => 'success',
            'message' => 'Employee address created successfully',
        ];

        //  return $validated;
        return redirect()->route('employee.curriculum', $id)->with('alert', $alert);
    }

    public function getCurriculumForm($id)
    {
        $data['emp_education'] = new EmpEducation;
        $data['exams'] = EmpExam::selectMenu();
        $data['boards'] = EmpBoard::selectMenu();
        $data['employee'] = EmpInfo::findOrFail($id);

        return view('admin.employee.education', $data);
    }

    public function saveCurriculumInfo(CurricullamInfoRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $validated;
        $data['emp_id'] = $id;
        $education = EmpEducation::create($data);

        $alert = [
            'type' => 'success',
            'message' => 'Employee educatiuon created successfully',
        ];

        return redirect()->route('employee.bank', $id)->with('alert', $alert);
    }

    public function getBankForm($id)
    {
        $data['emp_bank_info'] = new EmpBankInfo;
        $data['employee'] = EmpInfo::findOrFail($id);

        return view('admin.employee.bank', $data);
    }

    public function saveBankInfo(BankInfoRequest $request, $id)
    {
        $validated = $request->validated();
        $data = $validated;
        $data['emp_id'] = $id;
        $bankInfo = EmpBankInfo::create($data);

        $alert = [
            'type' => 'success',
            'message' => 'Employee bank info created successfully',
        ];

        return redirect()->route('employee.weekend', $id)->with('alert', $alert);
    }

    public function getWeekendForm($id)
    {
        $data['emp_weekend'] = new EmpWeekend;
        $data['employee'] = EmpInfo::findOrFail($id);

        return view('admin.employee.weekend', $data);
    }

    public function saveWeekendInfo(WeekendInfoRequest $request, $id)
    {
        $validated = $request->validated();

        $employee = EmpInfo::findOrFail($id);

        $existingWeekends = EmpWeekend::where('emp_id', $id)->pluck('day')->toArray();

        $selectedDays = $validated['days'];

        $daysToAdd = array_diff($selectedDays, $existingWeekends);
        $daysToRemove = array_diff($existingWeekends, $selectedDays);

        // Remove entries for the days that are unchecked
        EmpWeekend::where('emp_id', $id)->whereIn('day', $daysToRemove)->delete();

        // Add new weekend entries for the employee
        foreach ($daysToAdd as $day) {
            EmpWeekend::create([
                'emp_id' => $id,
                'day' => $day,
            ]);
        }

        $alert = [
            'type' => 'success',
            'message' => 'Employee weekend updated successfully',
        ];

        return redirect()->back()->with('alert', $alert);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['employeeInfo'] = EmpInfo::findOrFail($id);
        $data['address'] = EmpAddress::findOrFail($id);
        $data['weekend'] = EmpWeekend::findOrFail($id);
        $data['family'] = EmpFamily::findOrFail($id);
        $data['education'] = EmpEducation::findOrFail($id);
        $data['bankInfo'] = EmpBankInfo::findOrFail($id);

        return view('admin.employee.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
