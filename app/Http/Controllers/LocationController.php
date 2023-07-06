<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Yajra\DataTables\DataTables;

class LocationController extends Controller
{
    public function index (){
        return view('location-setting');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location' => 'required',
            
        ]);

        Location::create($data);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function getLocation(Request $request){
        if ($request->ajax()) {
            $locations = Location::select('id', 'location')->get();
            return Datatables::of($locations)
                ->make(true);

        }
    }

}
