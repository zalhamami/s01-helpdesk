<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Location;
use App\Models\UserSetting;
use Yajra\DataTables\DataTables;
use App\Models\Ticket;

class RegisterController extends Controller
{
    public function index ()
    {
        $title = 'User';
        $location = Location::all();
        $user_setting = UserSetting::all();
        return view('add-user', ['title' => $title], compact('location', 'user_setting'));
    }


    public function store(Request $request)
    {
        // Validasi data yang diinput oleh pengguna
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'no_telp' => 'required',
            'location' => 'required',
            'user_setting' => 'required|integer|exists:user_settings,id',
        ]);


        // Simpan data pengguna ke dalam tabel users
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_telp' => '0' . $request->no_telp,
            'location' => $request->location,
            'user_setting_id' => $request->user_setting,
        ]);

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
