<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosisMoneyReceiveController extends Controller
{
    public function __construct()
    {
        $name = 'Diag Money Receive';
        $this->middleware("can:$name View")->only('index', 'show', 'moneyReceiveList', 'barcodePrint', 'previousDuePaid');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        //        $data['genders'] = Gender::pluck('name', 'id');
        //        $data['doctors'] = Reference::pluck('name', 'id');
        //        $data['tests'] = TestName::pluck('name', 'id');

        return view('admin.diagnosis.money-receive.index');
    }

    public function barcodePrint()
    {
        return view('admin.diagnosis.money-receive.barcode-list');
    }

    public function moneyReceiveList()
    {
        return view('admin.diagnosis.money-receive.list');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
