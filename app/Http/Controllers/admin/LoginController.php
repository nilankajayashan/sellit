<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('email')){
                return view('admin/login')->with(['notify_error' => 'Email address is required to login']);
            }
            if ($validator->errors()->has('password')){
                return view('admin/login')->with(['notify_error' => 'Password is required to login']);
            }
        }
        $validated = $validator->validated();
        try{
            $admin = AdminUser::where('email','=',$validated['email'])->first();
            if ($admin != null){
                if(Hash::check($validated['password'], $admin->password)){
                    session()->put('auth_admin', $admin);
                    return redirect()->route('dashboard', ['state' => 'dashboard']);
                }else{
                    return view('admin/login')->with(['notify_error' => 'You entered password is wrong...!']);
                }
            }else{
                return view('admin/login')->with(['notify_error' => 'No any Administrator Account with this email...!']);
            }

        }catch (Exception $e){
            return view('admin/login')->with(['notify_error' => 'Something went wrong...!']);
        }
    }
    public function logout(Request $request){
        $request->session()->forget(['auth_admin']);
        $request->session()->flush();
        return view('admin/login')->with(['success' => 'you are log out successfully']);
    }

    public function adminLoginView(){
        return view('admin/login');
    }
}
