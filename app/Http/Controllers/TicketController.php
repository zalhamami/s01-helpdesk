<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TicketController extends Controller
{
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
        $tickets = Ticket::all();

        if ($request->ajax()) {
            return DataTables::of($tickets)->make(true);
        }

        return $tickets;
    }
}
