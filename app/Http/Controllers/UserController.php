<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Location;
use App\Models\UserSetting;
use Yajra\DataTables\DataTables;
use App\Models\Ticket;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User';
        $location = Location::all();
        $user_setting = UserSetting::all();
        return view('user', ['title' => $title], compact('location', 'user_setting'));
    }

    public function profile()
    {
        return view('profile', [
            'userSettings' => UserSetting::all(),
            'locations' => Location::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|alpha_num',
            'email' => 'required|email',
            'phone' => 'required|string',
            'location' => 'required|integer|exists:locations,id',
            'user_setting' => 'required|integer|exists:user_settings,id',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => '0' . $request->no_telp,
            'location_id' => $request->location,
            'user_setting_id' => $request->user_setting,
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|alpha_num',
            'email' => 'required|email',
            'phone' => 'required|string',
            'location_id' => 'nullable|integer|exists:locations,id',
            'user_setting_id' => 'nullable|integer|exists:user_settings,id',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = '0' . $request->phone;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('location_id')) {
            $user->location_id = $request->location_id;
        }

        if ($request->has('user_setting_id')) {
            $user->user_setting_id = $request->user_setting_id;
        }

        $user->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function getUsers(Request $request)
    {
        $registers = User::with(['location', 'user_setting'])->get();

        if ($request->ajax()) {
            return Datatables::of($registers)
                ->addColumn('no_telp', function ($register) {
                    return '0' . $register->no_telp;
                })
                ->make(true);
        }

        return $registers;
    }

}
