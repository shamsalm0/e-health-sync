<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgentCreateRequest;
use App\Models\Admin\Library\Agent;

class AgentController extends Controller
{
    public function __construct()
    {
        $name = 'Agent';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.agent.index');
    }

    public function create()
    {
        $data['agent'] = new Agent;

        return view('admin.agent.create', $data);
    }

    public function store(AgentCreateRequest $request)
    {
        Agent::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Agent created successfully.',
        ];

        return redirect()->route('agent.index')
            ->with($alert);
    }

    public function show(Agent $agent)
    {
        return view('admin.agent.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return view('admin.agent.edit', compact('agent'));
    }

    public function update(AgentCreateRequest $request, Agent $agent)
    {
        $agent->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Agent updated successfully.',
        ];

        return redirect()->route('agent.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $agent = Agent::findOrFail($id);
            $agent->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Agent deleted successfully.',
            ];

            return redirect()->route('agent.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('agent.index')
                ->with($alert);
        }
    }
}
