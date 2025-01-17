<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketFeeCreateRequest;
use App\Models\TicketFee;

class TicketFeeController extends Controller
{
    public function __construct()
    {
        $name = 'Ticket Fee';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.library.ticket-fee.index');
    }

    public function create()
    {
        $data['ticketFee'] = new TicketFee;
        $data['statuses'] = $this->common_status;
        $data['ticket_types'] = ['' => 'Select', '1' => 'General Physician', '2' => 'Emergency', '3' => 'Registration', '4' => 'Serial'];

        return view('admin.library.ticket-fee.create', $data);
    }

    public function store(TicketFeeCreateRequest $request)
    {
        TicketFee::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Ticket Fee created successfully.',
        ];

        return redirect()->route('ticket-fee.index')
            ->with($alert);
    }

    public function show(TicketFee $ticketFee)
    {
        return view('admin.library.ticket-fee.show', compact('ticketFee'));
    }

    public function edit(TicketFee $ticketFee)
    {
        $data['ticketFee'] = $ticketFee;
        $data['statuses'] = $this->common_status;
        $data['ticket_types'] = ['' => 'Select', '1' => 'General Physician', '2' => 'Emergency', '3' => 'Registration', '4' => 'Serial'];

        return view('admin.library.ticket-fee.edit', $data);
    }

    public function update(TicketFeeCreateRequest $request, TicketFee $ticketFee)
    {
        $ticketFee->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Ticket Fee updated successfully.',
        ];

        return redirect()->route('ticket-fee.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $ticketFee = TicketFee::findOrFail($id);
            $ticketFee->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Ticket Fee deleted successfully.',
            ];

            return redirect()->route('ticket-fee.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('ticket-fee.index')
                ->with($alert);
        }
    }
}
