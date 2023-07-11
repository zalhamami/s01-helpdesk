<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use Illuminate\Database\QueryException;
use Yajra\DataTables\DataTables;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('user-setting');
    }

    public function get(UserSetting $userSetting)
    {
        return response()->json($userSetting);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_setting' => 'required|unique:user_settings,name',
        ]);

        UserSetting::create([
            'name' => $data['user_setting'],
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'user_setting' => 'required|string',
        ]);

        $userSetting = UserSetting::find($request->id);
        $userSetting->name = $data['user_setting'];
        $userSetting->save();

        return back()->with('success', 'Data berhasil diubah');
    }

    public function delete(UserSetting $userSetting)
    {
        try {
            $userSetting->delete();
        } catch (QueryException $e) {
            return back()->withErrors(['This data has relation and cannot be deleted.']);
        }

        return back()->with('success', 'Data berhasil dihapus');
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
