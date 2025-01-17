<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgentCommissionCreateRequest;
use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Library\Agent;
use App\Models\Admin\Library\AgentCommission;
use Illuminate\Http\Request;

class AgentCommissionController extends Controller
{
    public function __construct()
    {
        $name = 'Agent Commission';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return view('admin.agent-commission.index');
    }

    public function create()
    {
        $data['agentCommission'] = new AgentCommission;
        $data['agentTypes'] = ['' => 'Select', '1' => 'Person', '2' => 'Organization'];
        $data['agents'] = Agent::selectMenu();
        $data['testNames'] = TestName::selectMenu();
        $data['choice'] = ['' => 'Select', '1' => 'Yes', '0' => 'No'];

        return view('admin.agent-commission.create', $data);
    }

    public function store(AgentCommissionCreateRequest $request)
    {
        AgentCommission::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Agent Commission created successfully.',
        ];

        return redirect()->route('agent-commission.index')
            ->with($alert);
    }

    public function show(AgentCommission $agentCommission)
    {
        return view('admin.agent-commission.show', compact('agentCommission'));
    }

    public function edit(AgentCommission $agentCommission)
    {
        $data['agentCommission'] = $agentCommission;
        $data['agentTypes'] = ['' => 'Select', '1' => 'Person', '2' => 'Organization'];
        $data['agents'] = Agent::selectMenu();
        $data['testNames'] = TestName::selectMenu();
        $data['choice'] = ['' => 'Select', '1' => 'Yes', '0' => 'No'];

        return view('admin.agent-commission.edit', $data);
    }

    public function update(AgentCommissionCreateRequest $request, AgentCommission $agentCommission)
    {
        $agentCommission->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Agent Commission updated successfully.',
        ];

        return redirect()->route('agent-commission.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $agentCommission = AgentCommission::findOrFail($id);
            $agentCommission->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Agent Commission deleted successfully.',
            ];

            return redirect()->route('agent-commission.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('agent-commission.index')
                ->with($alert);
        }
    }
}
