<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActionList;
use App\Models\Location;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket', [
            'actions' => ActionList::all(),
            'locations' => Location::all(),
            'technicians' => User::whereHas('user_setting', function ($query) {
                $query->where('name', 'Teknisi');
            })->get()
        ]);
    }

    public function show(Ticket $ticket)
    {
        return view('ticket-detail', compact('ticket'));
    }

    public function get(Ticket $ticket)
    {
        return response()->json($ticket);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
            'check_link_1' => 'required|string',
            'check_link_2' => 'required|string',
            'actions' => 'required|array',
            'actions.*' => 'required|exists:action_lists,id',
            'location' => 'required|exists:locations,id',
        ]);

        $ticket = Ticket::create([
            'location_id' => $data['location'],
            'description' => $data['description'],
            'check_link_1' => $data['check_link_1'],
            'check_link_2' => $data['check_link_2'],
            'helpdesk_id' => auth()->id(),
            'code' => Str::uuid()
        ]);

        foreach ($data['actions'] as $action) {
            $ticket->actions()->create([
                'action_list_id' => $action
            ]);
        }

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'description' => 'nullable|string',
            'check_link_1' => 'nullable|string',
            'check_link_2' => 'nullable|string',
            'location' => 'nullable|exists:locations,id',
            'solution' => 'nullable|string',
        ]);

        $ticket = Ticket::find($request->ticket_id);

        if ($request->has('description')) {
            $ticket->description = $data['description'];
        }

        if ($request->has('check_link_1')) {
            $ticket->check_link_1 = $data['check_link_1'];
        }

        if ($request->has('check_link_2')) {
            $ticket->check_link_2 = $data['check_link_2'];
        }

        if ($request->has('location')) {
            $ticket->location_id = $data['location'];
        }

        if ($request->has('solution')) {
            $ticket->solution = $data['solution'];
        }

        $ticket->save();

        return back()->with('success', 'Data berhasil diubah');
    }

    public function getFilteredTickets(Request $request, $tickets)
    {
        if ($request->status) {
            $tickets = $tickets->where('status', $request->status);
        }
    
        if ($request->date) {
            $date = Carbon::parse($request->date)->format('Y-m-d');
            $tickets = $tickets->whereDate('created_at', '<=', $date);
        }
    
        $tickets = $tickets->get();
    
        if ($request->ajax()) {
            return DataTables::of($tickets)->make(true);
        }

        return $tickets;
    }

    public function getTickets(Request $request)
    {
        $tickets = Ticket::with(['actions', 'helpdesk', 'technician', 'location']);
        
        return $this->getFilteredTickets($request, $tickets);
    }

    public function getHelpdeskTickets(Request $request)
    {
        $tickets = Ticket::where('helpdesk_id', auth()->id())
            ->with(['actions', 'helpdesk', 'technician', 'location']);

        return $this->getFilteredTickets($request, $tickets);
    }

    public function getTechnicianTickets(Request $request)
    {
        $tickets = Ticket::where('technician_id', auth()->id())
            ->with(['actions', 'helpdesk', 'technician', 'location']);

        return $this->getFilteredTickets($request, $tickets);
    }

    public function assignTechnician(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'technician_id' => 'required|exists:users,id',
        ]);

        $ticket = Ticket::find($data['ticket_id']);
        $ticket->update([
            'technician_id' => $data['technician_id'],
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function solve(Ticket $ticket)
    {
        $ticket->update([
            'status' => 'solved',
            'solved_at' => now()
        ]);

        return back()->with('success', 'Ticket berhasil diselesaikan');
    }

    public function close(Ticket $ticket)
    {
        $ticket->update([
            'status' => 'closed',
            'closed_at' => now()
        ]);

        return back()->with('success', 'Ticket berhasil ditutup');
    }
}
