<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\BankBranchCreateRequest;
use App\Http\Requests\Library\BankBranchUpdateRequest;
use App\Models\Admin\Library\Bank;
use App\Models\Admin\Library\BankBranch;

class BankBranchController extends Controller
{
    public function __construct()
    {
        $name = 'Bank Branch';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.bank-branch.index');
    }

    public function create()
    {
        $data['bankBranch'] = new BankBranch;
        $data['banks'] = Bank::selectMenu();

        return view('admin.library.bank-branch.create', $data);
    }

    public function store(BankBranchCreateRequest $request)
    {
        $validated = $request->validated();

        BankBranch::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Bank Branch created successfully',
        ];

        return redirect()->route('bank-branch.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['bankBranch'] = BankBranch::findOrFail($id);

        return view('admin.library.bank-branch.show', $data);
    }

    public function edit(string $id)
    {
        $data['bankBranch'] = BankBranch::findOrFail($id);
        $data['banks'] = Bank::selectMenu();

        return view('admin.library.bank-branch.edit', $data);
    }

    public function update(BankBranchUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $bankBranch = BankBranch::find($id);
        $bankBranch->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Bank Branch updated successfully',
        ];

        return redirect()->route('bank-branch.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
