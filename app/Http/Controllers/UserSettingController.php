<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use Yajra\DataTables\DataTables;

class UserSettingController extends Controller
{
    public function index (){
        return view('user-setting');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_setting' => 'required',
        ]);

        UserSetting::create($data);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function getUsersetting(Request $request){
        if ($request->ajax()) {
            $user_settings = UserSetting::select('id', 'user_setting')->get();
            return Datatables::of($user_settings)
                ->make(true);

        }
    }

    public function updateUsersetting(Request $request) {
        $userSetting = UserSetting::find($request->id);
        if ($userSetting) {
            $userSetting->user_setting = $request->user_setting;
            $userSetting->save();
            // Respon sukses jika diperlukan
            return response()->json(['success' => true]);
        }
        // Tangani kesalahan jika data tidak ditemukan
        return response()->json(['success' => false, 'message' => 'User setting not found.']);
    }
}
