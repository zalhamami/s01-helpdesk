<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Yajra\DataTables\DataTables;

class LocationController extends Controller
{
    public function index()
    {
        return view('location-setting');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location' => 'required|unique:locations,name',
        ]);

        Location::create([
            'name' => $data['location'],
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function getLocation(Request $request)
    {
        $locations = Location::all();

        if ($request->ajax()) {
            return Datatables::of($locations)->make(true);
        }

        return $locations;
    }
}
