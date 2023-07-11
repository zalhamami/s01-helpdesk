<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Yajra\DataTables\DataTables;

class LocationController extends Controller
{
    public function index()
    {
        return view('location-setting');
    }

    public function get(Location $location)
    {
        return response()->json($location);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location' => 'required|string',
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

    public function update(Request $request)
    {
        $data = $request->validate([
            'location' => 'required|string',
        ]);

        $location = Location::find($request->id);
        $location->name = $data['location'];
        $location->save();

        return back()->with('success', 'Data berhasil diubah');
    }

    public function delete(Location $location)
    {
        try {
            $location->delete();
        } catch (QueryException $e) {
            return back()->withErrors(['This data has relation and cannot be deleted.']);
        }

        return back()->with('success', 'Data berhasil dihapus');
    }
}
