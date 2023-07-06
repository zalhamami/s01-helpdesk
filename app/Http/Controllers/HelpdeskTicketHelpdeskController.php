<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpdeskTicketHelpdesk;


class HelpdeskTicketHelpdeskController extends Controller
{
    public function index (){
        return view('helpdesk-ticket-helpdesk');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pengecekan_link' => 'required',
            'pengecekan_link2' => 'required',
            'text' => 'required',
            'myCheckbox' => 'required|array',
        ]);

        $user = new HelpdeskTicketHelpdesk();
        $user->pengecekan_link = $request->pengecekan_link;
        $user->pengecekan_link2 = $request->pengecekan_link2;
        $user->text = $request->text;
        $user->myCheckbox = implode(',', $request->myCheckbox);

        $user->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

}
