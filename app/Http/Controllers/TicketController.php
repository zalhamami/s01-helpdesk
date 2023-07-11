<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActionList;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket', [
            'actions' => ActionList::all(),
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
            'name' => 'required|unique:tickets',
            'description' => 'required',
            'check_link_1' => 'required|string',
            'check_link_2' => 'required|string',
            'actions' => 'required|array',
            'actions.*' => 'required|exists:action_lists,id',
        ]);

        $ticket = Ticket::create([
            'name' => $data['name'],
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
            'solution' => 'required|string',
        ]);

        $ticket = Ticket::find($request->ticket_id);

        $ticket->update([
            'solution' => $data['solution'],
            'status' => 'solved',
            'solved_at' => now(),
        ]);

        return back()->with('success', 'Data berhasil diubah');
    }

    public function getTickets(Request $request)
    {
        $tickets = Ticket::with(['actions', 'helpdesk', 'technician'])->get();

        if ($request->ajax()) {
            return DataTables::of($tickets)->make(true);
        }

        return $tickets;
    }

    public function getHelpdeskTickets(Request $request)
    {
        $tickets = Ticket::where('helpdesk_id', auth()->id())
            ->with(['actions', 'helpdesk', 'technician'])
            ->get();

        if ($request->ajax()) {
            return DataTables::of($tickets)->make(true);
        }

        return $tickets;
    }

    public function getTechnicianTickets(Request $request)
    {
        $tickets = Ticket::where('technician_id', auth()->id())
            ->with(['actions', 'helpdesk', 'technician'])
            ->get();

        if ($request->ajax()) {
            return DataTables::of($tickets)->make(true);
        }

        return $tickets;
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

    public function close(Ticket $ticket)
    {
        $ticket->update([
            'status' => 'closed',
            'closed_at' => now()
        ]);

        return back()->with('success', 'Data berhasil dihapus');
    }
}
