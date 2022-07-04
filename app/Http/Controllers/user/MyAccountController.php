<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class MyAccountController extends Controller
{
    function index(){
        $total_ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->count();
        $active_ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->where('status', '=', 1)->count();
        $pending_ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->where('status', '=', 0)->where('reject', '=', 0)->count();
        $rejected_ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->where('reject', '=', 1)->count();
        return view('user/my_account',[
            'total_ads' => $total_ads,
            'active_ads' => $active_ads,
            'pending_ads' => $pending_ads,
            'rejected_ads' => $rejected_ads,
        ]);
    }
    public function getUserAd(Request $request){
        switch ($request->filter){
            case 'all':
                $ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->get();
                break;
            case 'Active':
                $ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)
                    ->where('status', '=', 1)
                    ->get();
                break;
            case 'pending':
                $ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)
                    ->where('status', '=', 0)
                    ->where('reject', '=', 0)
                    ->get();
                break;
            case 'reject':
                $ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)
                    ->where('reject', '=', 1)
                    ->get();
                break;
            default:
                $ads = Ad::where('user_id', '=', session()->get('auth_user')->user_id)->get();
                break;
        }
        return view('user.my_ad',[ 'ads' => $ads]);
    }

    public function accountInfo(){
        $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
        return view('user.account_info',['user' => $user]);
    }

    public function updateAccountInfo(Request $request){
        $validator = validator::make($request->all(),[
            'contact_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
        if ($validator->fails()){
            if($validator->errors()->has('email')){
                return view('user.account_info',['user' => $user])->withErrors( ['contact_name' => 'Contact name is required']);
            }elseif($validator->errors()->has('address')){
                return view('user.account_info',['user' => $user])->withErrors( ['address' => 'Address is required']);
            }elseif($validator->errors()->has('phone')){
                return view('user.account_info',['user' => $user])->withErrors( ['phone' => 'Phone is required']);
            }
        }
        $validated = $validator->validated();
        try{
            $user = User::where('user_id', '=', session()->get('auth_user')->user_id)
                ->update([
                    'contact_name' => $validated['contact_name'],
                    'address' => $validated['address'],
                    'phone' => $validated['phone'],
                ]);
            $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
            return view('user.account_info',['user' => $user , 'success' => 'Your details updated successfully...!']);
        }catch(Exception $e){
            $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
            return view('user.account_info',['user' => $user, 'error' => 'Some thing went wrong please try again...!']);

        }

    }

    public function updateAccountPassword(Request $request){
        $validator = validator::make($request->all(),[
            'password' => 'required',
            'password_conform' => 'required'
        ]);
        $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
        if ($validator->fails()){
            if($validator->errors()->has('password')){
                return view('user.account_info',['user' => $user])->withErrors( ['password' => 'Password is required']);
            }elseif($validator->errors()->has('password_conform')){
                return view('user.account_info',['user' => $user])->withErrors( ['password_conform' => 'Password conform is required']);
            }
        }
        $validated = $validator->validated();
        try {
            if ($validated['password'] == $validated['password_conform']){
                $user = User::where('user_id', '=', session()->get('auth_user')->user_id)
                    ->update([
                        'password' => Hash::make($validated['password']),
                    ]);
            }else{
                $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
                return view('user.account_info',['user' => $user,'error' => 'Password conform Does not matched']);
            }
            $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
            return view('user.account_info',['user' => $user, 'success' => "Password Updated successfully...!" ]);
        }catch(Exception $e){
            return view('user.account_info',['user' => $user, 'error' => "Some thing went wrong please try again...!" ]);
        }

    }

    public function removeAccount(){
        $remove_state = User::select('remove_state')
            ->where('user_id', '=', session()->get('auth_user')->user_id)
            ->first();
        if ($remove_state->remove_state == 0){
            User::where('user_id', '=', session()->get('auth_user')->user_id)
                ->update([
                    'remove_state' => 1
                ]);
            $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
            return view('user.account_info',['user' => $user, 'success' => 'Requested to cancel your account successfully...!']);
        }else{
            User::where('user_id', '=', session()->get('auth_user')->user_id)
                ->update([
                    'remove_state' => 0
                ]);
            $user = User::where('user_id', '=' , session()->get('auth_user')->user_id)->first();
            return view('user.account_info',['user' => $user, 'success' => 'Account Cancel Request destroyed successfully...!']);
        }

    }
}
