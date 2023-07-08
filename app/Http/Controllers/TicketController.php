<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActionList;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        return view('helpdesk-ticket-helpdesk', compact('ticket'));
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
        ]);

        foreach ($data['actions'] as $action) {
            $ticket->actions()->create([
                'action_list_id' => $action
            ]);
        }

        return back()->with('success', 'Data berhasil disimpan');
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

    public function delete(Ticket $ticket)
    {
        $ticket->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
