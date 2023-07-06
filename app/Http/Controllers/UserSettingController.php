<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use Yajra\DataTables\DataTables;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('user-setting');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_setting' => 'required|unique:user_settings',
        ]);

        UserSetting::create($data);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function getUsersetting(Request $request)
    {
        $userSettings = UserSetting::all();

        if ($request->ajax()) {
            return Datatables::of($userSettings)->make(true);
        }

        return $userSettings;
    }

    public function updateUsersetting(Request $request) {
        $userSetting = UserSetting::find($request->id);
        if ($userSetting) {
            $userSetting->user_setting = $request->user_setting;
            $userSetting->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'User setting not found.']);
    }
}
