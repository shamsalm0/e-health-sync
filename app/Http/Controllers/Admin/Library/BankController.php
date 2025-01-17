<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\BankCreateRequest;
use App\Http\Requests\Library\BankUpdateRequest;
use App\Models\Admin\Library\Bank;

class BankController extends Controller
{
    public function __construct()
    {
        $name = 'Bank';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.library.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['bank'] = new Bank;

        return view('admin.library.bank.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankCreateRequest $request)
    {
        $validated = $request->validated();

        Bank::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Bank created successfully',
        ];

        return redirect()->route('bank.index')
            ->with($alert);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $data['bank'] = Bank::findOrFail($id);

        return view('admin.library.bank.show', $data);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
        $data['bank'] = Bank::findOrFail($id);

        return view('admin.library.bank.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $bank = Bank::find($id);
        $bank->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Bank updated successfully',
        ];

        return redirect()->route('bank.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
