<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmpBoardCreateRequest;
use App\Models\EmpBoard;
use Exception;

class EmpBoardController extends Controller
{
    public function __construct()
    {
        $name = 'Employee Board';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        $data['empBoards'] = EmpBoard::paginate();

        return view('admin.employee.emp-board.index', $data);
    }

    public function create()
    {
        $data['empBoard'] = new EmpBoard;
        $data['statuses'] = $this->common_status;

        return view('admin.employee.emp-board.create', $data);
    }

    public function store(EmpBoardCreateRequest $request)
    {
        EmpBoard::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Emp Board created successfully.',
        ];

        return redirect()->route('emp-board.index')
            ->with($alert);
    }

    public function show(EmpBoard $empBoard)
    {
        return view('admin.employee.emp-board.show', compact('empBoard'));
    }

    public function edit(EmpBoard $empBoard)
    {
        $data['statuses'] = $this->common_status;
        $data['empBoard'] = $empBoard;

        return view('admin.employee.emp-board.edit', $data);
    }

    public function update(EmpBoardCreateRequest $request, EmpBoard $empBoard)
    {
        $empBoard->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Emp Board updated successfully.',
        ];

        return redirect()->route('emp-board.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $empBoard = EmpBoard::findOrFail($id);
            $empBoard->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Emp Board deleted successfully.',
            ];

            return redirect()->route('emp-board.index')
                ->with($alert);
        } catch (Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('emp-board.index')
                ->with($alert);
        }
    }
}
