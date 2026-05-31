<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMfaController extends Controller
{
    public function show(){
        return view('admin.mfa');
    }

    public function verify(Request $request){
        
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $adminId = session('mfa_admin_id');

        if(!$adminId){
          return redirect()->route('admin.login');
        }
        $admin = Admin::find($adminId);

        if(!$admin){
            return redirect()->route('admin.login');
        }
        //now to check otp expiry
        if(now()->greaterThan($admin->otp_expires_at)){
            return back()->withErrors(['otp'=>'OTP Expired']);
        }

        //to cg=check otp matching
        if($admin->otp_code != $request->otp){
            return back()->withErrors(['otp'=>'Invalid OTP']);
        }

        Auth::guard('admin')->login($admin);

        $admin->update([
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        session()->forget('mfa_admin_id');
        session(['admin_mfa_verified' => true]);
        return redirect()->route('admin.dashboardi');
    }
}
